<?php
if(session_status() != PHP_SESSION_ACTIVE){
	session_start();
}
class Database{
	private	$db = '';
	private $sql = '';

	public function __construct()
	{
		try{
			$this->db = new PDO('mysql:host=localhost; dbname=tracnghiem_online','root','');
			$this->db->query('set names "utf8"');
		}
		catch(PDOException $ex){
			echo $ex->getMessage();
			die();  
		}
	}
	public function loadRows($sql)
	{
    	$query = $this->db->query($sql);
    	$query->setFetchMode(PDO::FETCH_OBJ);
    	return $query->fetchAll();	 
	}
	public function loadRow($sql)
	{
    	$query = $this->db->query($sql);
    	$query->setFetchMode(PDO::FETCH_OBJ);
    	return $query->fetch();	 
	}
}
?>