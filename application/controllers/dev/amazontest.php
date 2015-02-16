<?php
class AmazonTest extends CA_Controller {
	
	public function index() {
		$this->load->add_package_path(APPPATH.'third_party/amazon/');
		$this->load->library('CA_S3', '', 'Amazon');
		$baseUrl = CA_Media::base();
		
		$objects = $this->Amazon->listObjects('');
		
		$cdir = '';
		foreach($objects['objects'] as $file){
			$dir = explode('/', $file['Key']);
			array_pop($dir);
			$dir = implode('/',$dir);
			
			if($dir != $cdir){
				echo '<div style="clear:both;"></div>';
				echo '<div style="margin:20px 0px 5px 0px; font-weight:bold; font-size:20px;">'.$dir.'</div>';
				$cdir = $dir;
			}
			
			echo '
			<div style="width:200px; height:220px; float:left; margin:5px; background:#eee;">
				<div style="width:200px; height:20px; line-height:height:20px;">
					<input type="text" value="'.$file['Key'].'" style="width:200px; border:0px none; background:none;" />
				</div>
				<div style="width:200px; height:200px;">
					<img src="'.$baseUrl.'/'.$file['Key'].'" style="max-width:200px; max-height:200px;" />
				</div>
			</div>';
		}
		
		/* UPLOAD FILE
		---------------------------------------------*/
		// $result = $this->Amazon->uploadObject('assets2/img/system/blank_profile.jpg', 'userpic/default.jpg');
		// debug($result);
		
		/* DELETE FILE
		---------------------------------------------*/
		// $result = $this->Amazon->deleteObject('attach/post_1_539d967393127.jpg');
		// debug($result);
		
	}
	
	public function existingPhotos(){
		$this->load->add_package_path(APPPATH.'third_party/amazon/');
		$this->load->library('CA_S3', '', 'Amazon');
		
		$this->db->select('*')
			->from('user_profile')
			->where(array(
				'profile_pic !=' => 'default.jpg',
			));
			
		$results = $this->db->get()->result();
		
		foreach($results as $result){
			$filename = uniqid().'.jpg';
			
			$amazon = $this->Amazon->uploadObject('media/userpic/'.$result->profile_pic, 'userpic/'.$filename);
			echo 'amazon upload: '.print_r($amazon, TRUE);
			
			$this->db->where('user_id', $result->user_id);
			$dbupd = $this->db->update('user_profile', array(
				'profile_pic' => $filename,
			));
			echo 'db update: '.print_r($dbupd, TRUE);
			echo '<hr />';
		}
	}
	
	public function existingAttachments(){
		$this->load->add_package_path(APPPATH.'third_party/amazon/');
		$this->load->library('CA_S3', '', 'Amazon');
		
		$attachments = glob('media/attach/*');
		
		foreach($attachments as $attachment){
			$filename = array_pop(explode('/', $attachment));
			$amazon = $this->Amazon->uploadObject($attachment, 'attach/'.$filename);
			echo 'amazon upload: '.print_r($amazon, TRUE).'<br />';
		}
	}
	
}