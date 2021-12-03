<?php

class Composer
{
	private $db;
		function __construct()
		{
			$this->db = new Database();
		}

		function getAll()
		{
			return $this->db->queryArray('SELECT * FROM composers');
		}
		//Lấy vài trường hợp
		function getBrief()
		{
			return $this->db->queryArray("SELECT composerid,composername,picture,birthday FROM composers");
		}		

		function getById($id)
		{
			return $this->db->querySingleWithParam('SELECT * FROM composers WHERE composerid=?',[$id]);
		}
		//lấy top 5 nhạc sĩ được yêu thích nhất  
		function getComposerTop()
		{
			return $this->db->queryArray("SELECT * FROM composers ORDER BY `composers`.`viewno` DESC LIMIT 0, 5");
		}



		function insert($arrayParams)
		{
			return $this->db->execute('INSERT INTO composers(composername,picture,birthday,description,viewno) VALUES(?,?,?,?,?)',$arrayParams);
		}

		function update($arrayParams)
		{
			return $this->db->execute('UPDATE composers SET composername=?,picture=?,birthday=?,description=?,viewno=? WHERE composerid=?',$arrayParams);
		}

		function delete($id)
		{
			return $this->db->execute('DELETE FROM composers WHERE composerid=?',[$id]);
		}
		function validateRelation($id)
		{
			$data = $this->db->querySingleParam('SELECT count(*) AS total FROM tracks WHERE composerid=?',[$id]);
		}
		//hàm kiểm tra sự tồn tại của tên danh mục
		function checkExistName($name)
		{
			$data=$this->db->querySingleWithParam("SELECT count(*) as total FROM composers WHERE composername=?",[$name]);
			return $data['total'];
		}
		//hàm kiểm tra sự tồn tại của tên danh mục khi chỉnh sửa
		function checkExistNameId($name,$id)
		{
			$data=$this->db->querySingleWithParam("SELECT count(*) as total FROM composers WHERE composername=? and composerid!=?",[$name,$id]);
			return $data['total'];
		}

}
?>