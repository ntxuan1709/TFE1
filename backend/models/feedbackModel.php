<?php
class Feedback
{
	private $db;
	function __construct()
	{
		$this->db = new Database();
	}
	//hàm thêm dữ liệu
	function insert($arrayParam)
	{
		return $this->db->execute("INSERT into artists(name, email, phone, message, vote,menu_id) values(?,?,?,?,?,?)", $arrayParam);
	}
}
