<?php

function upload_img($userid,$imglocation,$table){
try {
    $senpai = Call_onee_san();
    $binary_senpai = base64_encode(file_get_contents($imglocation));
    if ($table == "gallery")
    {
        //$userid = get_specific("user_id","user","username",$userid);
        $senpai->exec("INSERT INTO gallery (img,userid) VALUES ('$binary_senpai','$userid')");
    }
    if ($table == "users")
        $senpai->exec("UPDATE users SET display='$binary_senpai' WHERE username='$userid'");
    
} catch (PDOException $e) {
        echo "fuck". $e->getMessage()."\n";
    }
}

function get_img($galleryid,$class){
try{
    $binary_senpai = get_specific("img","gallery","id",$galleryid);
    if ($binary_senpai == false)
        return (0);
    //$binary_senpai = "this is the image";
    if ($class)
        echo /*"img class ".$galleryid."\n";*/"<img class=\"$class\" src='data:image/jpeg;base64, $binary_senpai' />";
    else
        echo /*"img ncl ".$galleryid."\n";*/"<img src='data:image/jpeg;base64, $binary_senpai' />";
    return (1);
} catch (PDOException $e) {
	echo "failed to find get img \n";
}
}

function ver_img($galleryid){
    try {
		$senpai = Call_onee_san();
		$sth = $senpai->prepare("SELECT userid FROM gallery WHERE id ='$galleryid'");
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_ASSOC);
		if (!$result['userid'])
			return (0);
		$sth->closeCursor();
		return ($result['userid']);
	} catch (PDOException $e) {
		echo "failed to verify img ".$e->getMessage()."\n";
	}
}

function max_img(){
try{
    $senpai = call_onee_san();
    $new = $senpai->prepare("SELECT id FROM gallery");
    $new->execute();
    $max = 0;
    while ($column = $new->fetch(PDO::FETCH_ASSOC))
        if ($max < $column['id'])
            $max = $column['id'];
    $new->closeCursor();
    return $max."\n";
} catch (PDOException $e) {
	echo "failed to find count img\n";
}
}

function retrieve_img($i){
try{
    if (ver_img($i) == 0){
        return (0);
    }
    else{
        return get_specific("img","gallery","id",$i);
    }
} catch (PDOException $e) {
	echo "failed to retrive img\n";
}
}

function get_posts($index) { 
try {
    $senpai = Call_onee_san();
    $stmt = $senpai->prepare("SELECT 
                        `gallery`.`id`,
                        `users`.`username`,
                        `up_date`
                    FROM
                        `gallery`
                    INNER JOIN `users` ON `gallery`.`userid` = `users`.`id`
                    ORDER BY 
                        `up_date` ASC,
                        `id` ASC
                    LIMIT
                        :limit1, :limit2
                    ;");
    $stmt->bindValue(':limit1', intval(($index - 1) * 5), PDO::PARAM_INT);
    $stmt->bindValue(':limit2', 5, PDO::PARAM_INT);
    if (!$stmt->execute())
    {
        $stmt = null;
        print("BLEAK! brah");
        exit;
    }
    if (!$return = $stmt->fetchAll(PDO::FETCH_ASSOC))
    {
        $stmt = null;
        return (null);
    }
    return ($return);
}
catch (PDOExeption $e) {
    echo "shit".$e->GetMessage(),"\n";
}
}
function home_img($amm,$page_no,$class){
try{
    $i = ($amm * ($page_no - 1)) + 1;
    $amm += $i;
    $index = $page_no;
    $posts = get_posts($index);
    while ($i < $amm)
    {
        if (ver_img($i) == 0){
            return (0);
        }
        else{
        $img = retrieve_img($i); 
        echo "<div class=\"column middle title\">Title</div>
            <div class=\"column middle subtitle\">Title Description, DATE</div>
            <img class=\"$class\" src='data:image/jpeg;base64, $img'>
            <div class=\"column middle icons\">
                <a class=\"icons\">
                    <i class=\"fa fa-thumbs-up w3-hover-opacity\"></i>
                    <i class=\"fa fa-comments w3-hover-opacity\" onclick=\"openDropComment_$i()\"></i>
                </a>
            </div>
        <div id=\"comment-box_$i\" class=\"column middle comment_container\">
            <a class=\"c-btn-close\" onclick=\"openCloseComment_$i()\">&times;</a>
            <br />
            <label> Comment: <br>
                <textarea name=\"Comment_$i\" class=\"Input comment-box\" required></textarea>
            </label>";
            foreach ($posts as $post) {
                if ($post['username'] == $_SESSION['user_id']) {
                    print ("<form method='POST' action='functions/post.php'>
                    <input type='hidden' name='galleryid' value=\"" . $post['id'] . "\" />
                    <button type='submit' name='action' value='delete' class='delete'> Delete </button>
                    </form>");
                }
            }
        }
            echo "<br />";
            echo "<form method='POST' action='api/like.php'>
            <input type='hidden' name='galleryid' value=\"" . $post['id'] . "\" />
            <button type='submit' name='action' value='add' class='delete'> like </button>
            </form>";
            echo "<br />";
            echo "</div>";
        $i++;
    }
} catch (PDOException $e) {
	echo "failed to print home page img list\n";
}
}

function java_comment($amm,$page_no){
try{
    $i = ($amm * ($page_no - 1)) + 1;
    $amm += $i;
    while ($i < $amm)
    {
        if (ver_img($i) == 0){
            return (0);
        }
        else{
        echo"function openDropComment_$i() {
			document.getElementById('comment-box_$i').style.height = 'auto';
			document.getElementById('comment-box_$i').style.visibility = 'visible';
		}
		function openCloseComment_$i() {
			document.getElementById('comment-box_$i').style.height = '0';
			document.getElementById('comment-box_$i').style.visibility = 'hidden';
        }";
        }
        $i++;
    }
} catch (PDOException $e) {
	echo "failed to printf comment boxes\n";
}
}

function pager($mode,$amm){
try{
    if ($page = $_GET['page']){
        if ($page > 1 && $mode == -1)
            $page--;
        else if ($mode == 1 && ($page * $amm) <= max_img())
            $page++;
    }
    else
        $page = 1;
    //echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?page=$page";
    echo "localhost:8080/camagru/home_html.php?page=$page";
    //echo "localhost:8080/camagru/test.php?page=$page";
} catch (PDOException $e) {
	echo "failed to get next page link\n";
}
}

function pager_images($no,$page){
try{
    echo "<div class=\"column middle\" style=\"background-color:grey;\">";
    home_img($no,$page,"column middle image");
} catch (PDOException $e) {
	echo "failed to print home mage img\n";
}
}

function get_userimg($session_var){
try{
    $binary_senpai = get_specific("display","users","username",$session_var);
    if ($binary_senpai == NULL)
        return "src=\"https://www.google.com/url?sa=i&source=images&cd=&ved=2ahUKEwjitNri3NXlAhUIFRQKHRJeDhoQjRx6BAgBEAQ&url=http%3A%2F%2Fwww.clker.com%2Fclipart-no-image-icon.html&psig=AOvVaw0E1jpBuv733GOlkoJjhEdF&ust=1573134419626111\"";
    else
        return "src='data:image/jpeg;base64, $binary_senpai'";
} catch (PDOException $e) {
	echo "failed to get usrimg\n";
}
}
?>