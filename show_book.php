<?php
	require_once('book_sc_fns.php');
	session_start();

	try{
		$isbn=$_GET['isbn'];

		if (!isset($isbn)) {
			throw new Exception("No book seleted. please go back and try again.");
		} 

		$book_detail=get_book_detail($isbn);
		do_html_header($book_detail['title']);
		display_book_detail($book_detail);

	}catch(Exception $e){
		do_html_header($e->getMessage());
		display_menu();
	}

	echo "<hr>";

	if($_SISSION['admin_user']){
		display_button();
	}else{
		echo "<div align='center'>";
		display_button("add_to_cart.php?isbn=$isbn","add-to-cart",'添加到购物车');
		display_button("index.php","continue-shopping",'继续购物');
		echo "</div>";
	}

	do_html_footer();
	
?>