<?php
Class Movie{
	private $validFields = array('pid','name','release_date');
	public $mid;

	function __construct($mid=null)}{
		if ( is_null( $mid ) ) {
			return;
		}
		$mid = (int) $mid;
		$this->mid = $mid;
	}

	public function __get ( $name ){  // Magic method __get - implements lazy loading of data. Called when an unknown property is accessed
		if ( array_key_exists( $name, $this->info ) ) {
			return $this->info[$name];
		}

		if (in_array($name, $this->validFields)) {
				$this->setDataFromTable();
			}

		}
		return $this->info[$name];
	} 

	private function setDataFromTable (){  //This function populates data from Movie Table
		if ( $this->tableLoaded) 		// data already populated
			return;
		else {
			$this->tableLoaded = 1;
			$query = "SELECT * FROM movie WHERE id = ?";
			
			$result = Query::doSelectOne( $query, array ( $this->mid ), 'slave', false); 
			// Wrapper for queries 1.) query, 2.) array of params, 3.) 'slave'or 'master' , 4) persist connection
                    
			foreach ($this->validFields as $column) {
				$this->info[$column] = (array_key_exists( $column, $result ) ? $result[$column] : null);
			}
		}
	}

	private function allFieldsExist($movie){
		foreach ($this->validFields as $field) {
			if(!array_key_exists($field, $movie){
				return false;
			}
		}
		return true;
	}

	public function add($movie){
		if(!$this->allFieldsExist($movie)){
			return -1;
		}
		$query = "INSERT INTO `movie` SET `pid` = ?, `name` = ?, `release_date` = ?";
		return doInsert($query, array($movie['pid'], $movie['name'],$movie['date']), 'master', false);
		// Wrapper for queries 1.) query, 2.) array of params, 3.) 'slave'or 'master' , 4) persist connection
	}
}

?>