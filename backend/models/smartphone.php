<?php
class Introduce
{
	private $db;
	function __construct()
	{
		$this->db = new Database();
	}
	//lấy tất cả
	function getListAll()
	{
		$result = $this->db->queryArray("SELECT introduce_id, title, description, url, status 
		FROM introduce WHERE status = 1");
		if ($result != null) {
			return $result;
		} else {
			return null;
		}
	}
}
