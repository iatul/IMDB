<?php
require Movie.php
Class Subscriber{
	private $info;
	private $tableLoaded = false;
	public $sid;
	protected $validFields = array ('name','email','phone');

	function __construct($pid = null){
		if ( is_null( $sid ) ) {
			return;
		}
		$sid = (int) $sid;
		$this->sid = $sid;
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

	private function setDataFromTable (){  //This function populates data from Publisher Table
		if ( $this->tableLoaded) 		// data already populated
			return;
		else {
			$this->tableLoaded = 1;
			$query = "SELECT * FROM subscriber WHERE id = ?";
			
			$result = Query::doSelectOne( $query, array ( $this->sid ), 'slave', false); 
			// Wrapper for queries 1.) query, 2.) array of params, 3.) 'slave'or 'master' , 4) persist connection
                    
			foreach ($this->validFields as $column) {
				$this->info[$column] = (array_key_exists( $column, $result ) ? $result[$column] : null);
			}
		}
	}

	public function subscribeMovie($movieId){
		$query = "INSERT INTO `notification` SET `sid` = ?, `mid`= ?";
		return doInsert($query, array($this->sid, $movieId);
	}
}

?>