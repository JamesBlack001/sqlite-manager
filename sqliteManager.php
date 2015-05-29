<?php

/**
 * This small piece of software can be used in the browser or the cmd line.
 * It is designed to provide an easy way to initialise a sqlite setup, and 
 * to manage it when it is up and running.
 * 
 * I decided to build this due to my frustration with being unable to 
 * easily manage the set up when using an xampp install. It seems to be
 * that the only way that you can setup and manage sqlite db, is by
 * typing the commands and then running a script either through browser
 * or command line, with no real way of understanding if it has worked,
 * or what has actually happened.
 * 
 * My plan is to build this as an interface, such that it can be included
 * in other projects, to provide a way to debug the db setup as dev progresses.
 */


/**
* 
*/
class sqliteManager 
{
	
	/**
	 * principal object of the class, implements all of the behaviours
	 * for the db
	 * @var PDO object of sqlite3
	 */
	private $dbh;
	private $keyArray;

	/**
	 * Collection of results from db
	 * @var array
	 */
	private $dbresults;
	/**
	 * initial construct for the class that creates (or connects to)
	 * the SQLite db in file
	 * @param String $dbname specifies the name of the db
	 */
	function __construct($dbname)
	{
		$this->dbh = new PDO('sqlite:'.$dbname.'sqlite3');
		
	}
	public function returnDBHissetVal()
	{
		if(isset($this->dbh)){
			$success = True;
		}
		else{
			$success = False;
		}
		return $success;
	}

	/**
	 * Sets the attributes for the PDO object. Predifined in this instance,
	 * for sqlite3 module, can be extended to set user required attributes.
	 * @return Bool based on success of setting attributes
	 */
	public function setAttributes(){

		$success = $this->dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $success;
	}
	/**
	 * adds a key to the array keyArray readying the array for forming the insert
	 * statement
	 * @param String $key is a part of the array that will form the insert statement
	 */
	public function addKey($key){
		if(isset($keyArray)){
			$success = True;
		}
		else{
			$keyArray = array($key);
			if(isset($keyArray)) {$success = True;}
			else {$success = False;}
		}
		return $success;
	}
}