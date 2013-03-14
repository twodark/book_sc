<?php
	require_once('book_sc_fns.php');
	session_start();

	$catid=$_GET['catid'];

	try{
		if(!isset($catid)){
			throw new Exception("No catagory selected. please go back and choose again.");
		}

		$cat_name=get_cat_name($catid);	
		
		if(!$cat_name){
			throw new Exception("No this catagoty. please go back and choose again.");
		}
	
		do_html_header($cat_name);

		$books=get_cat_books($catid);
	
		display_books($books);

	}catch(Exception $e){
		do_html_header($e->getMessage());
		display_menu();
	}
	
	do_html_footer();
?>