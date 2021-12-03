<?php
class Menu
{
	private $db;
	function __construct()
	{
		$this->db = new Database();
	}
	//lấy tất cả
	function getListAll()
	{
		$result = $this->db->queryArray("SELECT menu_id,name,href,parent_id,status 
			FROM menu where status = 1");
		if ($result != null) {
			return $result;
		} else {
			return null;
		}
	}
}
