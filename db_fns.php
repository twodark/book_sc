<?php
	function connect_db(){
		$db_server='localhost';
		$db_user='book_sc';
		$passwd='passwd';
		$db_select='book_sc';
		$conn=mysqli_connect($db_server, $db_user, $passwd, $db_select);
		if (!conn) {
			throw new Exception("Could not connect to database");
		}
		mysqli_query($conn, "SET NAMES 'utf8'"); 
		return $conn;
	}

	function do_result_to_array($result){
		$array_res=array();

		for($nums=0; $row=mysqli_fetch_assoc($result); $nums++){
			$array_res[$nums]=$row;
		}

		return $array_res;
	}
?>