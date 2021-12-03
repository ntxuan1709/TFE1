<?php

class Playlist
{
	private $db;
		function __construct()
		{
			$this->db = new Database();
		}

		function getAll()
		{
			return $this->db->queryArray('SELECT * FROM playlists');
		}

		function getById($id)
		{
			return $this->db->querySingleWithParam('SELECT * FROM playlists WHERE playlistid=?',[$id]);
		}

		// Lấy top track 10 lượt xem 
		function getPlaylistTop()
		{
			return $this->db->queryArray("SELECT playlists.viewno, playlists.playlistname, playlisttracks.playlistid, trackartists.artistid, artists.singername FROM playlisttracks JOIN playlists on playlists.playlistid = playlisttracks.playlistid JOIN tracks ON tracks.trackid = playlisttracks.trackid JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid ORDER BY playlists.viewno DESC LIMIT 0, 10");
		}

		// Lấy playlist theo Aritst
		function getPlaylistTrack($playlistid)
		{
			return $this->db->queryArrayWithParam("SELECT playlisttracks.playlistid, tracks.trackname, tracks.picture, tracks.url, tracks.during, trackartists.artistid, trackartists.trackid, artists.singername FROM playlisttracks JOIN tracks ON tracks.trackid = playlisttracks.trackid JOIN trackartists ON tracks.trackid = trackartists.trackid JOIN artists ON trackartists.artistid = artists.artistid WHERE playlisttracks.playlistid = ?",[$playlistid]);
		}


		//hàm thêm dữ liệu
		function insert($arrayParam)
		{
			return $this->db->execute("INSERT INTO playlists(playlistname,viewno,userid,categoryid) VALUES(?,?,?,?)",$arrayParam);
		}
		//hàm update
		function update($arrayParam)
		{
			return $this->db->execute("UPDATE playlists SET playlistname=?,viewno=?,userid=?,categoryid=? WHERE playlistid=?",$arrayParam);
		}


		function delete($id)
		{
			return $this->db->execute('DELETE FROM playlists WHERE playlistid=?',[$id]);
		}
		function validateRelation($id)
		{
			$data = $this->db->querySingleWithParam('SELECT count(*) AS total FROM playlisttracks WHERE playlistid=?',[$id]);
		}
		//hàm kiểm tra sự tồn tại của tên danh mục
		function checkExistName($name)
		{
			$data=$this->db->querySingleWithParam("SELECT count(*) as total FROM playlists WHERE playlistname=?",[$name]);
			return $data['total'];
		}	

		function checkExistNameId($name,$id)
		{
			$data = $this->db->querySingleWithParam('SELECT count(*) as total FROM playlists WHERE playlistname=? and playlistid!=?', [$name,$id]);
			return $data['total'];
		}

}
?>