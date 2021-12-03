<?php
class Category
{
	private $db;
	function __construct()
	{
		$this->db = new Database();
	}

	function getListNewView($category_id)
	{
		$result = $this->db->queryArrayWithParam(
			"SELECT n.new_id, n.name, n.title, n.description, n.view, n.author, n.create_date, n.update_date, n.url, n.status 
			FROM news n 
			INNER JOIN category_new cate ON cate.new_id = n.new_id AND cate.category_id in (?) 
			WHERE STATUS = 1 ORDER BY VIEW DESC",
			[$category_id]
		);
		if ($result != null) {
			return $result;
		} else {
			return null;
		}
	}

	function getListByCategory($category_id, $new_id)
	{
		$str = "SELECT * FROM news n
		INNER JOIN category_new cate ON
			cate.new_id = n.new_id ";
		if (isset($category_id)) {
			$str = $str . " AND  cate.category_id = ?";
		}
		if (isset($new_id)) {
			$str = $str . " AND  n.new_id = ? ";
		}
		$str = $str . " WHERE STATUS = 1 
		ORDER BY VIEW DESC ";
		if (isset($category_id) && isset($new_id)) {
			$result = $this->db->queryArrayWithParam(
				$str,
				[$category_id],
				[$new_id]
			);
		} else if (!isset($category_id) && isset($new_id)) {
			$result = $this->db->queryArrayWithParam(
				$str,
				[$new_id]
			);
		}else{
			$result = $this->db->queryArray(
				$str
			);
		}

		if ($result != null) {
			return $result;
		} else {
			return null;
		}
	}

	function getIdByNameCategory($nameCategory)
	{
		$result = $this->db->queryArrayWithParam(
			"SELECT * FROM categories WHERE status = 1 AND name = ? ",
			[$nameCategory]
		);
		if ($result != null) {
			return $result;
		} else {
			return null;
		}
	}

	function getCategoryChildrent($category_id)
	{
		$result = $this->db->queryArrayWithParam(
			"SELECT * FROM categories WHERE status = 1 AND parent_id = ? ",
			[$category_id]
		);
		if ($result != null) {
			return $result;
		} else {
			return null;
		}
	}

	function getCategoryName($new_id)
	{
		$result = $this->db->queryArrayWithParam(
			"SELECT ca.name, canew.category_id FROM category_new canew 
			INNER JOIN categories ca ON ca.category_id = canew.category_id AND ca.status = 1 
			WHERE canew.new_id = ? 
			ORDER BY ca.parent_id ASC",
			[$new_id]
		);
		if ($result != null) {
			return $result;
		} else {
			return null;
		}
	}
}
