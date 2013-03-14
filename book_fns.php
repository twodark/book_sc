<?php
	require_once('book_sc_fns.php');

	function get_catagories(){
		try{
			$conn=connect_db();
			$query="select catid, cat_name from catagory";
			$result=mysqli_query($conn, $query);

			if(!$result){
				throw new Exception("Could not execute query. - please try again.");
			}

			if(mysqli_num_rows($result)<1){
				throw new Exception("No catagories in database.");
			}

			$cats=do_result_to_array($result);
			return $cats;			
		}catch(Exception $e){
			echo $e->getMessage();
			return false;
		}
	}

	function get_cat_name($catid){
		$conn=connect_db();
		$query="select cat_name from catagory where catid='$catid'";

		$result=mysqli_query($conn, $query);

		if(!$result){
			throw new Exception("No books in this catagory.");
		}

		$cat_name=do_result_to_array($result);

		return $cat_name[0]['cat_name'];
	}

	function get_cat_books($catid){
		$conn=connect_db();
		$query="select isbn, title from book where catid='$catid'";

		$result=mysqli_query($conn, $query);

		if(!$result){
			throw new Exception("No books in this catagory.");
		}

		$books=do_result_to_array($result);
		return $books;
	}

	function get_book_detail($isbn){
		$conn=connect_db();
		$query="select * from book where isbn='$isbn'";

		$result=mysqli_query($conn, $query);
		if(!$result){
			throw new Exception("Could not execute query.");
		}

		if(mysqli_num_rows($result)<1){
			throw new Exception("No this book. please go back and try again.");
		}

		$detail=mysqli_fetch_assoc($result);

		return $detail;
	}
?>