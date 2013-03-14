<?php 
	require_once('book_sc_fns.php');

	session_start();
	do_html_header('Welcome to Book-O-Rama');
	echo 'Please choose a catagory:</br>';

	$cats=get_catagories();
	display_catagories($cats);

	if(isset($_SESSION['admin_user'])){
		display_button('admin.php', 'admin-menu.php', 'Admin Menu');
	}

	do_html_footer();

?>