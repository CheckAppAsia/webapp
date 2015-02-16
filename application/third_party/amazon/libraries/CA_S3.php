<?php
require_once(APPPATH.'third_party/amazon/sdk/aws-autoloader.php');
use Aws\Common\Aws;
use Aws\S3\Exception\S3Exception;

class CA_S3 {
	private $_client;
	private $_CI;
	
	public function __construct(){
		// Load Amazon custom config
		$this->_CI =& get_instance();
		$this->_CI->config->load('aws_custom');
		
		// Amazon auto-loader
		$this->_client = Aws::factory(APPPATH.'third_party/amazon/config/aws_default.php')->get('s3');
	}
	
	public function objectExists($location){
		
	}
	
	public function listObjects($location){
		try{
			$objects = $this->_client->listObjects(array(
				'Bucket' => $this->_CI->config->item('AWS_bucket'),
				'Marker' => $location,
			));
			
			return array(
				'status' => true,
				'objects' => $objects['Contents'],
			);
		}catch(Exception $e){
			return array(
				'status' => false,
				'message' => $e->getMessage(),
			);
		}
	}
	
	public function uploadObject($source, $destination){
		try{
			if(!file_exists($source)){
				throw new Exception('File to upload to S3 does not exist');
			}
			$result = $this->_client->putObject(array(
				'ACL' => 'public-read',
				'ContentType' => 'image/jpeg',
				'Bucket' => $this->_CI->config->item('AWS_bucket'),
				'Key' => $destination,
				'SourceFile' => $source,
			));
			
			return array(
				'status' => true,
				'result' => $result,
			);
		}catch(Exception $e){
			return array(
				'status' => false,
				'message' => $e->getMessage(),
			);
		}
	}
	
	public function deleteObject($object){
		try{
			$result = $this->_client->deleteObject(array(
				'Bucket' =>  $this->_CI->config->item('AWS_bucket'),
				'Key' => $object,
			));
			
			return array(
				'status' => true,
				'result' => $result,
			);
		}catch(Exception $e){
			return array(
				'status' => false,
				'message' => $e->getMessage(),
			);
		}
	}
	
}