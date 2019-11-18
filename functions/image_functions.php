<?php

function upload_img($userid,$imglocation,$table){
try {
    if ($imglocation) {
    $senpai = Call_onee_san();
    $binary_senpai = base64_encode(file_get_contents($imglocation));
    $n_senpai = "data:image/jpeg;base64, ".$binary_senpai;
    if ($table == "gallery")
    {
        //$userid = get_specific("user_id","user","username",$userid);
        $senpai->exec("INSERT INTO gallery (img,userid) VALUES ('$n_senpai','$userid')");
    }
    if ($table == "users")
        $senpai->exec("UPDATE users SET display='$n_senpai' WHERE username='$userid'");
}
} catch (PDOException $e) {
        echo "file not found". $e->getMessage()."\n";
    }
}

function upload_img2($userid, $img, $table) {
    try {
        $senpai = Call_onee_san();
        $arr = explode($img);
        $binary_senpai = $img;
        if ($table == "gallery")
        {
        //$userid = get_specific("user_id","user","username",$userid);
        $senpai->exec("INSERT INTO gallery (img,userid) VALUES ('$binary_senpai','$userid')");
        }
        if ($table == "users")
            $senpai->exec("UPDATE users SET display='$binary_senpai' WHERE username='$userid'");
    }
    catch (PDOException $e) {

    }
}

// function str_comp($img){
//     $str = "data:image";
//     $i = 0;
//     while ($str[$i]){
//         if ($img[$i] != $str[$i]){
//             return (0);
//         }
//         $i++;
//     }
//     return(1);
// }

function get_img($galleryid,$class){
try{
    $binary_senpai = get_specific("img","gallery","id",$galleryid);
    if ($binary_senpai == false)
        return (0);
    //$binary_senpai = "this is the image";
    // if (str_comp($binary_senpai)){
        if ($class)
            $return = "<img class=\"$class\" src='$binary_senpai' />";
        else
            $return = "<img src='$binary_senpai' />";
    // }
    // else{
    //     if ($class)
            // $return = "<img class=\"$class\" src='data:image/jpeg;base64, $binary_senpai' />";
        // else
            // $return = "<img src='data:image/jpeg;base64, $binary_senpai' />";
    // }
    return ($return);
} catch (PDOException $e) {
	echo "failed to find get img \n";
}
}

function retrieve_img($i, $class){
try{
    if (ver_img($i) == 0){
        return (0);
    }
    else{
        return get_img($i, $class);
    }
} catch (PDOException $e) {
	echo "failed to retrive img\n";
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

function id_arr(){
    try{
        $senpai = Call_onee_san();
		$sth = $senpai->prepare("SELECT id FROM gallery");
		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_COLUMN);
		return($result);
		$sth->closeCursor();
		//return ($result[$target]);
    }
    catch (PDOExecption $e){
        echo $e."\n";
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
                        `up_date` DESC,
                        `id` DESC
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
    // $i = ($amm * ($page_no - 1)) + 1;
    // $amm += $i;
    $index = $page_no;
    $arr = id_arr();
    $counter = 0;
    $max = count($arr);
    $max -= $amm * ($page_no - 1);
    $image = 0;
    // $i = 0;
    $posts = get_posts($page_no);
    while ($image < $amm)
    {
        $i = $arr[$max-1];
        $page = $_GET['page'];
        if (ver_img($i) == 0){
            return (0);
        }
        else{
        $img = retrieve_img($i, $class); 
        $likes = get_likes(NULL,$i);
        $name = get_specific("username","users","id",get_specific("userid","gallery","id",$i));
        $date = get_specific("up_date","gallery","id",$i);
        echo "<div class=\"column middle title\">Posted by: $name</div>
            <div class=\"column middle subtitle\">on: $date</div>
            $img";
            echo "<div class=\"column middle icons\" >
            <a class=\"icons\">
            <form  action=\"api/like.php?page=$page&prev_pos=$i\" method=\"POST\">
            <input type=\"hidden\" name=\"action\" value=\"like\">
            <input type=\"hidden\" name=\"form_id\" value=\"$i\">
            <text style=\"color=white\">$likes<text/>
            <button class=\"fa fa-thumbs-up w3-hover-opacity\" name=\"sub_action\" style=\"background: none; border: none; color:white !important;\"></button>
            <i class=\"fa fa-comments w3-hover-opacity\" onclick=\"openDropComment_$i()\"></i>
            </form>";
            if ($posts[$image]['username'] === $_SESSION['user_id']) {
                $tag = $_GET['page'];
                echo "<form  action=\"api/posts.php?page=$tag\" method=\"POST\">
                <input type=\"hidden\" name=\"action\" value=\"delete\">
                <input type=\"hidden\" name=\"form_id\" value=\"$i\">
                <input type=\"hidden\" name=\"sub_action\" value=\"null\">
                <button class=\"fa fa-trash w3-hover-opacity\" name=\"sub_action\" style=\"background: none; border: none; color:white !important;\"></button>
                </form>";
            }
            echo "<a>
            </div>
            <div id=\"comment-box_$i\" class=\"column middle comment_container\">
            </a>";

            if (!isset($_SESSION['user_id']))
                home_get_comment(0,$i);
            else{
                $user  = get_specific("id","users","username",$_SESSION['user_id']);
                home_get_comment($user,$i);
            }
            echo "<br/><a class=\"c-btn-close\" onclick=\"openCloseComment_$i()\">&times;</a><br/>";
    }
    if (isset($_SESSION['user_id'])){
        $prev_pos = $i;
        echo "
        <form  action=\"api/comment.php?page=$page&prev_pos=$i\" method=\"POST\">
        <input type=\"hidden\" name=\"action\" value=\"add\">
        <input type=\"hidden\" name=\"form_id\" value=\"$i\">
        <label class=\"comment-def\"> 
        Comment:
        <br \>
        <textarea id=\"com_$i\" name=\"comment\" class=\"text-box\" required></textarea>
        </label><br>
        <input type=\"submit\" name=\"sub_action\" value=\"comment\">
                </form>
                ";
    }
    echo "</div>"; 
    $image++;
    $max--;
}
}catch (PDOException $e) {
    echo "failed to print home page img list\n $e";
    }
}

function java_comment($amm,$page_no){
try{
    $arr = id_arr();
    $max = count($arr);
    $max -= $amm * ($page_no - 1);
    $image = 0;
    while ($image < $amm)
    {
        $i = $arr[$max-1];
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
        $image++;
        $max--;
    }
} catch (PDOException $e) {
	echo "failed to printf comment boxes\n";
}
}

function pager($mode,$amm){
try{
    $max = count(id_arr());
    if ($page = $_GET['page']){
        if ($page > 1 && $mode == -1)
            $page--;
        else if ($mode == 1 && ($page * $amm) < $max)
            $page++;
    }
    else
        $page = 1;
    //echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."?page=$page";
    echo "./index.php?page=$page";
    //echo "localhost:8080/camagru/test.php?page=$page";
} catch (PDOException $e) {
	echo "failed to get next page link\n";
}
}

function pager_images($no,$page){
try{
    echo "<div class=\"column middle c\" onload=\"scroltest();\">";
    home_img($no,$page,"column middle image");
    echo "</div>";
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
        return "src='".$binary_senpai."'";
} catch (PDOException $e) {
	echo "failed to get usrimg\n";
}
}

function get_editor_image($session_var){
try {
    // $img = get_specific("img","gallery","id",$session_var);
    $senpai = call_onee_san();
    $image_arr = $senpai->prepare("SELECT * FROM gallery WHERE userid='$session_var'");
    $image_arr->execute();
    // echo "<div class=\"column side c\">";
    while (($image = $image_arr->fetch(PDO::FETCH_ASSOC))){
        $img = $image['img'];
        $id = $image['id'];
        echo "<img class=\"left_block prev_image\" src='$img'>";
        echo "<p class=\"prev_date\">".$image['up_date']."</p>";
        echo "<form  action=\"api/posts.php\" method=\"POST\">
            <input type=\"hidden\" name=\"action\" value=\"delete\">
            <input type=\"hidden\" name=\"form_id\" value=\"$id\">
            <input type=\"hidden\" name=\"sub_action\" value=\"editor_redirect\">
            <input type=\"submit\" name=\"butt\" value=\"delete this post\" class=\"del_btn\">
            </form>";
    }
    // echo "</div>";
}
catch(PDOExecption $e){
    echo $e;
}
}
?>