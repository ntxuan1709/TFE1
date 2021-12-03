<?php 
	class TrackArtist
	{
		private $db;
		function __construct()
		{
			$this->db=new Database();
		}
		//lấy tất cả
		function getAll()
		{
			return $this->db->queryArray("SELECT * FROM trackartists");
		}
			// Đếm số tracks  
		function getTotalTrackArist()
		{
		return $this->db->queryArray("SELECT COUNT(*) as total FROM trackartists");
		}
		//lấy ra 1 bản ghi (dòng) theo mã số (khóa chính)
		function getById($id)
		{
			return $this->db->querySingleWithParam("SELECT * FROM trackartists WHERE artistid=?",[$id]);
		}
		//hàm thêm dữ liệu
		function insert($arrayParam)
		{
			return $this->db->execute("INSERT into trackartists(artistid,trackid) values(?,?)",$arrayParam);
		}
		//hàm update
		function update($arrayParam)
		{
			return $this->db->execute("UPDATE trackartists set trackid WHERE artistid=?",$arrayParam);
		}
		//hàm xóa
		function delete($id)
		{
			return $this->db->execute("DELETE FROM trackartists WHERE artistid=?",[$id]);
		}
	}
?>