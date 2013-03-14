<?php
	function do_html_header($title){
        Header('Content-type: text/html; charset=utf8');
?>
<html>
    <head>
        <title><?php echo $title; ?></title>
    </head>
    <body>
    <font size='22'>UYGNIN-BOOK-STORE</font>
    <img style="float:right" src='button.php?btn_text=Add to cart' border='0' 
             alt='Shopping cart' />
    <div style="clear:both"></div>
    <hr/>
    

<?php
    if($title)
        do_html_heading($title);
}

    function do_html_heading($title){
    	echo "<h2>$title</h2>";
    }
    
    function do_html_footer(){
    	echo '</body></html>';
    }

    function do_html_url($url, $title){
        echo "<a href='$url'>$title</a>";
    }

    function display_button($url, $alt, $btn_text){
        echo "<a href='$url'>";
        echo "<img alt='$alt' src='button.php?btn_text=$btn_text' />";
        echo "</a><br />";
    }


    function display_catagories($cats){
        if(is_array($cats)){
            echo "<ul>";
            foreach ($cats as $row) {
                $url="show_cat.php?catid=".$row['catid'];
                $title=$row['cat_name'];
                echo '<li>';
                do_html_url($url, $title);
                echo '</li>';
            }
        }
    }

    function display_menu(){
        echo "<hr>";
        do_html_url('index.php','homepage');
        echo '<hr>';
    }

    function display_books($books){
        if(is_array($books)){
            echo "<ul>";
            foreach ($books as $row) {
                $isbn=$row['isbn'];
                $title=$row['title'];
                $url="show_book.php?isbn=$isbn";
                echo '<li>';
                do_html_url($url, "<img src='bk_imgs/$isbn.jpg' />");        
                echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                do_html_url($url, $title);
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    function display_book_detail($detail){
        if(is_array($detail)){
            $catid=$detail['catid'];
            $cat_name=get_cat_name($catid);
            $isbn=$detail['isbn'];
            $title=$detail['title'];
            $author=$detail['author'];
            $price=$detail['price'];
            $desc=$detail['description'];
?>
    <img style="float:left" src=<?php echo "bk_imgs/$isbn.jpg" ?>  height='50%' />
        <ul style="float:left">
            <li>
                书名：<?php echo $title?>
            </li>
            <li>
                作者：<?php echo $author?>
            </li>
            <li>
                价格：￥<?php echo $price?>
            </li>
            <li>
                描述：<?php echo $desc?>
            </li>
        </ul>
    <div style="clear:both"></div>
<?php
        }

    }

?>