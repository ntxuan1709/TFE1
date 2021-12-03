<?php
class Database
{
	function connect()
	{
		//Thông số kết nối
		$host 	= 'localhost';
		$db 	= 'tfe';
		$user 	= 'root';
		$pass 	= '';
		$charset = 'utf8';
		$options = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		];
		//thiết lập chuỗi kết nối
		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$pdo = null;
		//tạo đối tượng kết nối

		$pdo = new PDO($dsn, $user, $pass, $options);
		if ($pdo == null) {
			echo 'Connection failed: ';
		}
		return $pdo;
	}
	//truy vấn và trả về 1 mảng dữ liệu
	function queryArray($sql)
	{
		$pdo = $this->connect(); //gọi hàm connect để lấy đối tượng kết nối
		$stmt = $pdo->query($sql); //gọi hàm truy vấn câu $sql
		$data = array(); //tạo một mảng
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	//truy vấn và trả về 1 dòng dữ liệu
	function querySingleWithParam($sql, $params)
	{
		$pdo = $this->connect();
		$stmt = $pdo->prepare($sql);
		$stmt->execute($params);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
	//truy vấn theo tham số và trả về 1 mảng dữ liệu
	function queryArrayWithParam($sql, $params)
	{
		$pdo = $this->connect(); //gọi hàm connect để lấy đối tượng kết nối
		$stmt = $pdo->prepare($sql); //gọi hàm truy vấn câu $sql
		$stmt->execute($params);
		$data = array(); //tạo một mảng
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	//thực thi câu truy vấn với tham số và trả về số bản ghi thực hiện được (số dòng)
	function execute($sql, $params)
	{
		$pdo = $this->connect();
		$stmt = $pdo->prepare($sql);
		$stmt->execute($params);
		$count = $stmt->rowCount();
		return $count;
	}
}
