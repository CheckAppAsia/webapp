<?php
class CA_Media {
	public static $base = '';
	
	public static function base(){
		$_CI =& get_instance();
		$_CI->load->add_package_path(APPPATH.'third_party/amazon/');
		$_CI->config->load('aws_custom');
		return 'https://'.$_CI->config->item('AWS_bucket').'.s3.amazonaws.com';
	}
    
    public static function userpic($filename,$size='150'){
		$url;
		switch($size){
			case 'max' :
				$url = self::base().'/userpic/max/'.$filename;
				break;
			case '50' :
				$url = self::base().'/userpic/50/'.$filename;
				break;
			case '150' :
				$url = self::base().'/userpic/150/'.$filename;
				break;
			default :
				$url = self::base().'/userpic/150/'.$filename;
				break;
		}
		return $url;
	}
    public static function attach($filename,$size='thumb'){
		$url;
		switch($size){
			case 'max' :
				$url = self::base().'/attach/max/'.$filename;
				break;
			case 'thumb' :
				$url = self::base().'/attach/450/'.$filename;
				break;
			default :
				$url = self::base().'/attach/450/'.$filename;
				break;
		}
		return $url;
	}
	
	public static function phy_doc($filename,$size='thumb'){
		$url;
		switch($size){
			case 'max' :
				$url = self::base().'/physician_documents/max/'.$filename;
				break;
			case 'thumb' :
				$url = self::base().'/physician_documents/450/'.$filename;
				break;
			default :
				$url = self::base().'/physician_documents/450/'.$filename;
				break;
		}
		return $url;
	}
	
	public static function process($file){
		#settings#
		$thumb_1_size 	= 50;	//small thumb
		$thumb_2_size 	= 150;	//large thumb
		$thumb_3_size	= 450;	//large thumb
		$max_side 		= 960;	//max width or height
		$quality		= 90;	//jpeg quality
		
		$temp_folder	= FCPATH.'media/';
		$temp_folder50	= FCPATH.'media/50_';
		$temp_folder150	= FCPATH.'media/150_';
		$temp_folder450	= FCPATH.'media/450_';
		
		#get image info#
		$orig_size		= $file['size']; //original image size
		$temp_src		= $file['tmp_name']; //Temp name of image file stored in PHP tmp folder
		$img_type		= $file['type']; //file type O_o
		
		#check if image type is allowed#
		switch(strtolower($img_type))
		{
			case 'image/png':
				//Create a new image from file 
				$created_image =  imagecreatefrompng($temp_src);
				break;
			case 'image/gif':
				$created_image =  imagecreatefromgif($temp_src);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				$created_image = imagecreatefromjpeg($temp_src);
				break;
			default:
				throw new Exception("Unsupported type of image");
		}
		
		#get current size and mime type
		$src_data	= getimagesize($temp_src);
		$file_type	= $src_data['mime'];
		$cur_width	= $src_data[0];
		$cur_height	= $src_data[1];
		
		#generate filename
		$file_ext = substr($file_type, strrpos($file_type, '/'));
		$file_ext = str_replace('/','',$file_ext);
		$filename 	= uniqid().'.'.$file_ext;
		
		#destination images
		$resized_destiny	=	$temp_folder.$filename;
		$thumb_1_destiny	=	$temp_folder50.$filename;
		$thumb_2_destiny	=	$temp_folder150.$filename;
		$thumb_3_destiny	=	$temp_folder450.$filename;
		
		$filenames = array();
		
		if(self::resizeImage($cur_width,$cur_height,$max_side,$resized_destiny,$created_image,$quality,$file_type))
		{
			$filenames['name'] = $filename;
			$filenames['resized'] = $resized_destiny;
			if(!self::cropImage($cur_width,$cur_height,$thumb_1_size,$thumb_1_destiny,$created_image,$quality,$file_type))
			{
				$filenames['thumb_50'] = 'error_creating_thumb';
			}else{
				$filenames['thumb_50'] = $thumb_1_destiny;
			}
			if(!self::cropImage($cur_width,$cur_height,$thumb_2_size,$thumb_2_destiny,$created_image,$quality,$file_type))
			{
				$filenames['thumb_150'] = 'error_creating_thumb';
			}else{
				$filenames['thumb_150'] = $thumb_2_destiny;
			}
			if(!self::resizeImage($cur_width,$cur_height,$thumb_3_size,$thumb_3_destiny,$created_image,$quality,$file_type))
			{
				$filenames['thumb_450'] = 'error_creating_thumb';
			}else{
				$filenames['thumb_450'] = $thumb_3_destiny;
			}
			return $filenames;
		}else{
			return array();
		}
	}
	
	#Proportionally resizes image#
	function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
	{
		//Check Image size is not 0
		if($CurWidth <= 0 || $CurHeight <= 0) 
		{
			return false;
		}
		
		//Construct a proportional size of new image
		$ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
		$NewWidth  			= ceil($ImageScale*$CurWidth);
		$NewHeight 			= ceil($ImageScale*$CurHeight);
		$NewCanves 			= imagecreatetruecolor($NewWidth, $NewHeight);
		
		// Resize Image
		if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
		{
			switch(strtolower($ImageType))
			{
				case 'image/png':
					imagepng($NewCanves,$DestFolder);
					break;
				case 'image/gif':
					imagegif($NewCanves,$DestFolder);
					break;			
				case 'image/jpeg':
				case 'image/pjpeg':
					imagejpeg($NewCanves,$DestFolder,$Quality);
					break;
				default:
					return false;
			}
		//Destroy image, frees memory	
		if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
		return true;
		}
	}
	
	#Crops images into square thumbs
	function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType)
	{	 
		//Check Image size is not 0
		if($CurWidth <= 0 || $CurHeight <= 0) 
		{
			return false;
		}
		
		//abeautifulsite.net has excellent article about "Cropping an Image to Make Square bit.ly/1gTwXW9
		if($CurWidth>$CurHeight)
		{
			$y_offset = 0;
			$x_offset = ($CurWidth - $CurHeight) / 2;
			$square_size 	= $CurWidth - ($x_offset * 2);
		}else{
			$x_offset = 0;
			$y_offset = ($CurHeight - $CurWidth) / 2;
			$square_size = $CurHeight - ($y_offset * 2);
		}
		
		$NewCanves 	= imagecreatetruecolor($iSize, $iSize);	
		if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size))
		{
			switch(strtolower($ImageType))
			{
				case 'image/png':
					imagepng($NewCanves,$DestFolder);
					break;
				case 'image/gif':
					imagegif($NewCanves,$DestFolder);
					break;			
				case 'image/jpeg':
				case 'image/pjpeg':
					imagejpeg($NewCanves,$DestFolder,$Quality);
					break;
				default:
					return false;
			}
		//Destroy image, frees memory	
		if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
		return true;

		}
		  
	}
	
}