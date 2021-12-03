<?php 
class Category
{
	private $db;
	function __construct()
	{
		$this->db=new Database();
	}
		//lấy tất cả
	function getAll()
	{
		return $this->db->queryArray("SELECT * from categories");
	}
		//lấy ra 1 bản ghi (dòng) theo mã số (khóa chính)
	function getById($id)
	{
		return $this->db->querySingleWithParam("SELECT * from categories where categoryid=?",[$id]);
	}
		//lấy top 6 thể loại được yêu thích nhất  
	function getCategoryTop()
	{
		return $this->db->queryArray("SELECT * FROM categories ORDER BY `categories`.`viewno` DESC LIMIT 0, 6");
	}

/*	// Lấy thể loại và track id
	function CategoryTrack($categoryid)
	{
		return $this->db->queryArrayWithParam("SELECT tracks.trackid, tracks.trackname, tracks.picture, tracks.url, tracks.during, tracks.composerid, tracks.categoryid, tracks.viewno, categories.categoryid, categories.categoryname FROM tracks, categories WHERE categories.categoryid = tracks.categoryid AND categoryid = '$categoryid'");
	}*/
	// Lấy playlist theo Aritst
	function getCategoryTrack($categoryid)
		{
			return $this->db->queryArrayWithParam("SELECT tracks.trackid, tracks.trackname, tracks.picture, tracks.url, tracks.during, tracks.composerid, tracks.categoryid, tracks.viewno, artists.artistid, artists.singername, trackartists.artistid, trackartists.trackid, categories.categoryid, categories.categoryname, categories.viewno FROM tracks JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid JOIN categories on tracks.categoryid = categories.categoryid WHERE categories.categoryid = ?",[$categoryid]);
		}
		//hàm thêm dữ liệu
	function insert($arrayParam)
	{
		return $this->db->execute("INSERT into categories(categoryname,viewno) values(?,?)",$arrayParam);
	}
		//hàm update
	function update($arrayParam)
	{
		return $this->db->execute("UPDATE categories set categoryname=?,viewno=? where categoryid=?",$arrayParam);
	}
		//hàm xóa
	function delete($id)
	{
		return $this->db->execute("DELETE from categories where categoryid=?",[$id]);
	}
		//hàm kiểm tra sự tồn tại của dữ liệu liên ở bảng khác (products)
	function validateRelation($id)
	{
		$data=$this->db->querySingleWithParam("SELECT count(*) as total from tracks where categoryid=?",[$id]);
		return $data['total'];
	}
		//hàm kiểm tra sự tồn tại của tên danh mục
	function checkExistName($name)
	{
		$data=$this->db->querySingleWithParam("SELECT count(*) as total from categories where categoryname=?",[$name]);
		return $data['total'];
	}
		//hàm kiểm tra sự tồn tại của tên danh mục khi chỉnh sửa
	function checkExistNameId($name,$id)
	{
		$data=$this->db->querySingleWithParam("SELECT count(*) as total from categories where categoryname=? and categoryid!=?",[$name,$id]);
		return $data['total'];
	}
}
?>