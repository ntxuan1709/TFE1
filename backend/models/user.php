<?php
	//Tạo  lớp model User chứa các hành động truy xuất dữ liệu trong database
	class User
	{
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}

		function getAll()
		{
			return $this->db->queryArray('select * from users');
		}
		//dem so user
		function getTotalUser()
		{
		return $this->db->queryArray("SELECT COUNT(*) as total FROM users");
		}

		function getById($id)
		{
			return $this->db->querySingleWithParam('SELECT * FROM users WHERE userid=?',[$id]);
		}

		function login($u,$p)
		{
			$pmd5=md5($u.$p);
			return $this->db->querySingleWithParam("select * from users where username=? and password=?",[$u,$pmd5]);
		}
	}

?>