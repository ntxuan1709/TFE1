<?php 
	class Artist
	{
		private $db;
		function __construct()
		{
			$this->db=new Database();
		}
		//lấy tất cả
		function getAll()
		{
			return $this->db->queryArray("SELECT * FROM artists");
		}
		//Lấy vài trường hợp
		function getBrief()
		{
			return $this->db->queryArray("SELECT artistid,singername,picture,birthday FROM artists");
		}

		//lấy ra 1 bản ghi (dòng) theo mã số (khóa chính)
		function getById($id)
		{
			return $this->db->querySingleWithParam("SELECT * FROM artists WHERE artistid=?",[$id]);
		}
		//lấy top 5 ca sĩ được yêu thích nhất  
		function getArtistTop()
		{
			return $this->db->queryArray("SELECT * FROM artists ORDER BY `artists`.`viewno` DESC LIMIT 0, 6");
		}

		function getArtistTrack()
		{
		return $this->db->queryArray("SELECT tracks.trackid, tracks.trackname, tracks.during, tracks.picture, tracks.url, tracks.composerid, tracks.categoryid, tracks.viewno, artists.artistid, artists.singername, trackartists.artistid, trackartists.trackid FROM tracks JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid ORDER BY artists.artistid");
		}
		//Tìm kiếm
		function search($title)
		{
		return $this->db->queryArrayWithParam("SELECT * FROM artists WHERE singername LIKE ?",[$title]);
		}

		
		//hàm thêm dữ liệu
		function insert($arrayParam)
		{
			return $this->db->execute("INSERT into artists(singername,picture,birthday,description,viewno) values(?,?,?,?,?)",$arrayParam);
		}
		//hàm update
		function update($arrayParam)
		{
			return $this->db->execute("UPDATE artists set singername=?,picture=?,birthday=?,description=?, viewno=? WHERE artistid=?",$arrayParam);
		}
		//hàm xóa
		function delete($id)
		{
			return $this->db->execute("DELETE FROM artists WHERE artistid=?",[$id]);
		}
		function validateRelation($id)
		{
			$data = $this->db->querySingleParam('SELECT count(*) AS total FROM trackartists WHERE artistid=?',[$id]);
		}
		//hàm kiểm tra sự tồn tại của tên danh mục
		function checkExistName($name)
		{
			$data=$this->db->querySingleWithParam("SELECT count(*) as total FROM artists WHERE singername=?",[$name]);
			return $data['total'];
		}
		//hàm kiểm tra sự tồn tại của tên danh mục khi chỉnh sửa
		function checkExistNameId($name,$id)
		{
			$data=$this->db->querySingleWithParam("SELECT count(*) as total FROM artists WHERE singername=? and artistid!=?",[$name,$id]);
			return $data['total'];
		}
	}
?>