<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
class sqlgen extends CI_Controller {
	
	public function index() {
		if($this->input->post('struc')){
			$schema = $this->generate($_REQUEST['struc']);
			$posted = $_REQUEST['struc'];
		}else{
			$schema = '';
			$posted = '';
		}
		
		echo "<div style='width:900px; margin:10px auto; background:#ddd; border:1px solid #ccc; padding:10px;'>";
		echo "<div style='width:250px; float:left; height:600px;'><form method='POST' style='padding:0px; margin:0px;'><input type='submit' value='Generate' style='width:250px;' /><br /><textarea name='struc' style='width:250px; height:574px;'>".$posted."</textarea></form></div>";
		echo "<div style='width:630px; float:right; min-height:400px; height:600px;'><textarea style='width:630px; height:600px; background:#eee;' READONLY>".$schema."</textarea></div>";
		echo "<div style='clear:both'></div></div>";
	}
	
	private function generate($structure){
		$lines = explode(chr(13), $structure);
		
		$tables = array();
		
		$attrTypes = array(
			'pk' => 'index',
			'ai' => 'auto_increment',
			
			'i'  => 'data_type',
			'bi' => 'data_type',
			'tx' => 'data_type',
			'vc' => 'data_type',
			'db' => 'data_type',
			'ts' => 'data_type',
			'dt' => 'data_type',
			'bo' => 'data_type',
			
			'ct' => 'default_val',
			'd0' => 'default_val',
			
			'us' => 'attribute',
			'uz' => 'attribute',
			'uc' => 'attribute',
		);
		
		$dataTypes = array(
			'i'  => 'int',
			'bi' => 'bigint',
			'tx' => 'text',
			'vc' => 'varchar',
			'db' => 'double',
			'ts' => 'timestamp',
			'dt' => 'datetime',
			'bo' => 'boolean',
		);
		
		$cTable = '';
		foreach($lines as $line){
			$line = trim($line);
			if(strpos($line,'[')===0 && strpos($line,']')===(strlen($line)-1)){
				$table_name = substr($line,1,strlen($line)-2);
				$tables[ $table_name ] = array(
					'fields' => array(),
					'PK' => array(),
				);
				$cTable = $table_name;
			}else if($line!=''){
				$fieldAttrs = explode('=',$line);
				$fieldName = trim($fieldAttrs[0]);
				$tables[$cTable]['fields'][$fieldName] = array();
				
				$fieldAttrs = explode(',', trim($fieldAttrs[1]));
				foreach($fieldAttrs as $fieldAttr){
					if(is_numeric($fieldAttr)){
						$tables[$cTable]['fields'][$fieldName]['length'] = $fieldAttr;
					}else{
						if($fieldAttr=='pk'){
							array_push($tables[$cTable]['PK'], $fieldName);
						}
						$tables[$cTable]['fields'][$fieldName][ $attrTypes[$fieldAttr] ] = $fieldAttr;
					}
				}
			}
		}
		
		$schema = '';
		foreach($tables as $table_name => $table){
			$schema .= 'CREATE TABLE `'.$table_name.'` ('."\n";
			foreach($table['fields'] as $fn => $fa){
				if($fa['data_type']=='i'){
					if($fa['attribute']=='us'){
						$fa['length'] = 10;
					}else{
						$fa['length'] = 11;
					}
				}
				
				if($fa['data_type']=='bi'){
					if($fa['attribute']=='us'){
						$fa['length'] = 20;
					}else{
						$fa['length'] = 21;
					}
				}
				
				$showLength = ($fa['length'])?'('.$fa['length'].')':'';
				$showAI = ($fa['auto_increment'])?' AUTO_INCREMENT':'';
				$showDV = '';
				$showUC = '';
				$showUS = '';
				$showType = $dataTypes[ $fa['data_type'] ];
				
				if($fa['default_val']=='ct'){ $showDV = ' DEFAULT CURRENT_TIMESTAMP'; }
				else if($fa['default_val']=='d0'){ $showDV = ' DEFAULT \'0000-00-00 00:00:00\''; }
				
				if($fa['attribute']=='uc'){ $showUC=' ON UPDATE CURRENT_TIMESTAMP'; }
				else if($fa['attribute']=='us'){ $showUS = ' unsigned'; }
				
				$schema .= '	`'.$fn.'` '.$showType.$showLength.$showUS.' NOT NULL'.$showAI.$showDV.$showUC.','."\n";
			
			}
			
			if(count($table['PK'])>0){
				$schema .= '	PRIMARY KEY (`'.implode('`,`', $table['PK']).'`)'."\n";
			}else{
				die("no primary keys defined!");
			}
			
			$schema .= ') ENGINE=InnoDB DEFAULT CHARSET=utf8;'."\n\n";
		}
		// echo '<pre>'; print_r($tables);
		return $schema;
	}
	
}