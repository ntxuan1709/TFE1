<?php
class Smartphone
{
	private $db;
	function __construct()
	{
		$this->db = new Database();
	}

	function getNewView()
	{
		$result = $this->db->queryArray(
			"SELECT new_id, name, title, description, view, author, create_date, update_date, url,status 
			FROM news 
			WHERE status = 1 order by view DESC LIMIT 0, 6"
		);
		if ($result != null) {
			return $result;
		} else {
			return null;
		}
	}

	function getListByCategory($category)
	{
		$result = $this->db->queryArrayWithParam(
			"SELECT * FROM news n
		INNER JOIN category_new cate ON
			cate.new_id = n.new_id AND cate.category_id = ?
		WHERE STATUS = 1 
		ORDER BY VIEW DESC",
			[$category]
		);
		if ($result != null) {
			return $result;
		} else {
			return null;
		}
	}
}
