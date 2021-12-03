<?php 
class Track
{
	private $db;
	function __construct()
	{
		$this->db=new Database();
	}
		//lấy tất cả
	function getAll()
	{
		return $this->db->queryArray("SELECT * from tracks");
	}
		//Lấy vài trường hợp
	function getBrief()
	{
		return $this->db->queryArray("SELECT trackid,trackname,picture,url FROM tracks");
	}
		//lấy ra 1 bản ghi (dòng) theo mã số (khóa chính)
	function getById($id)
	{
		return $this->db->querySingleWithParam("SELECT * from tracks where trackid=?",[$id]);
	}
	 // Lay ra 1 trackartist 
		function getByIdArtistTrack($id)
	{
		return $this->db->querySingleWithParam("SELECT tracks.trackid, tracks.trackname, tracks.picture, tracks.url, tracks.composerid,tracks.categoryid,tracks.viewno, artists.artistid, artists.singername, trackartists.artistid, trackartists.trackid FROM tracks JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid where tracks.trackid = ?",[$id]);
	}
		//lấy sản phẩm theo category
	function getByCategory($categoryid)
	{
		return $this->db->queryArrayWithParam("SELECT * from tracks where categoryid=?",[$categoryid]);
	}
		//lấy sản phẩm theo Composer
	function getByAuthor($composerid)
	{
		return $this->db->queryArrayWithParam("SELECT * from tracks where composerid=?",[$composerid]);
	}
		//lấy track new 5 
	function getTrackNew()
	{
		return $this->db->queryArray("SELECT tracks.trackid, tracks.trackname, tracks.picture, tracks.url, tracks.composerid,tracks.categoryid,tracks.viewno, artists.artistid, artists.singername, trackartists.artistid, trackartists.trackid FROM tracks JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid ORDER By tracks.trackid DESC LIMIT 0, 6");
	}

		//lay track all 
	function getTrackAll($params = [])
	{
		$strSQL = 'SELECT tracks.trackid, tracks.trackname, tracks.picture, tracks.url, tracks.composerid,tracks.categoryid,tracks.viewno, artists.artistid, artists.singername, trackartists.artistid, trackartists.trackid FROM tracks JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid';

		if (isset($params['trackID']) && !empty($params['trackID']) && is_numeric($params['trackID']) == 1) {
			$trackID = (int) trim(strip_tags($params['trackID']));
			$strSQL .= " WHERE tracks.trackid = " . $trackID . " ";
		}

		$strSQL .= 'ORDER By tracks.trackid';
		return $this->db->queryArray($strSQL);
	}

		// Lấy tất cả track
	function getAllTrack()
	{
		return $this->db->queryArray("SELECT tracks.trackid, tracks.trackname, tracks.picture, tracks.url, tracks.composerid,tracks.categoryid,tracks.viewno, artists.artistid, artists.singername, trackartists.artistid, trackartists.trackid FROM tracks JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid");
	}


		// Lấy top track 10  
	function getTrackTop()
	{
		return $this->db->queryArray("SELECT tracks.trackid, tracks.trackname, tracks.picture, tracks.url, tracks.during, tracks.composerid,tracks.categoryid,tracks.viewno, artists.artistid, artists.singername, trackartists.artistid, trackartists.trackid FROM tracks JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid ORDER BY tracks.viewno DESC LIMIT 0, 10");
	}

		//Tìm kiếm
	function search($title)
	{
		return $this->db->queryArrayWithParam("SELECT tracks.trackid, tracks.trackname, tracks.picture, tracks.url, tracks.composerid, tracks.categoryid, tracks.viewno, artists.artistid, artists.singername, trackartists.artistid, trackartists.trackid FROM tracks JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid WHERE tracks.trackname LIKE ?",[$title]);
	}

	//Lấy track theo artist
	function trackbyartist($playlistid)
	{
		return $this->db->queryArrayWithParam("SELECT tracks.trackid, tracks.trackname, tracks.picture, tracks.url, tracks.during, tracks.composerid, tracks.categoryid, tracks.viewno, artists.artistid, artists.singername, trackartists.artistid, trackartists.trackid FROM tracks JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid WHERE trackartists.artistid = ?",[$playlistid]);
	}

	// Cập nhật 
	function updateViewno($id)
	{
		return $this->db->queryArrayWithParam("UPDATE track set viewno = viewno + 1 where trackid  = ?",[$id]);
	}




		//hàm thêm dữ liệu
	function insert($arrayParam)
	{
		return $this->db->execute("insert into tracks(trackname,picture,url,during,description,viewno,composerid,categoryid) values(?,?,?,?,?,?,?,?)",$arrayParam);
	}
		//hàm update
	function update($arrayParam)
	{
		return $this->db->execute("update tracks set trackname=?,picture=?,url=?,during=?,description=?,viewno=?,composerid=?,categoryid=?  where trackid=?",$arrayParam);
	}
		//hàm xóa
	function delete($id)
	{
		return $this->db->execute("delete from tracks where trackid=?",[$id]);
	}
		//hàm kiểm tra sự tồn tại của dữ liệu liên ở bảng khác (invoicedetails)
	function validateRelation($id)
	{
		$data = $this->db->querySingleParam('SELECT count(*) AS total FROM playlisttracks,trackartists WHERE trackid=?',[$id]);
	}
		//hàm kiểm tra sự tồn tại của tên nhac
	function checkExistName($name)
	{
		$data=$this->db->querySingleWithParam("SELECT count(*) as total from tracks where trackname=?",[$name]);
		return $data['total'];
	}
		//hàm kiểm tra sự tồn tại của tên danh mục khi chỉnh sửa
	function checkExistNameId($name,$id)
	{
		$data=$this->db->querySingleWithParam("SELECT count(*) as total from tracks where trackname=? and trackid!=?",[$name,$id]);
		return $data['total'];
	}
}
?>