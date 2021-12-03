<?php 
	class Playlisttrack
	{
		private $db;
		function __construct()
		{
			$this->db=new Database();
		}
		//lấy tất cả
		function getAll()
		{
			return $this->db->queryArray("SELECT * FROM playlisttracks");
		}

		// Đếm số tracks  
		function getTotalPlaylistTrack()
		{
		return $this->db->queryArray("SELECT  COUNT(DISTINCT playlistid) as total FROM playlisttracks");
		}

		//lấy ra 1 bản ghi (dòng) theo mã số (khóa chính)
		function getById($id)
		{
			return $this->db->querySingleWithParam("SELECT * FROM playlisttracks WHERE playlistid=?",[$id]);
		}
		//hàm thêm dữ liệu
		function insert($arrayParam)
		{
			return $this->db->execute("INSERT into playlisttracks(playlistid,trackid) values(?,?)",$arrayParam);
		}
		//hàm update
		function update($arrayParam)
		{
			return $this->db->execute("UPDATE playlisttracks SET trackid=? WHERE playlistid=?",$arrayParam);
		}
		//hàm xóa
		function delete($id)
		{
			return $this->db->execute("DELETE FROM playlisttracks WHERE playlistid=?",[$id]);
		}

	}
?>