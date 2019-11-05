<?php
function upload_img($userid,$imglocation){
try {
    $senpai = Call_onee_san();
    $binary_senpai = base64_encode(file_get_contents($imglocation));
    $senpai->exec("INSERT INTO gallery (img,userid) VALUES ('$binary_senpai','$userid')"); 
} catch (PDOException $e) {
        echo "fuck". $e->getMessage()."\n";
    }
}

function get_img($galleryid,$class){
    $binary_senpai = get_specific("img","gallery","id",$galleryid);
    if ($binary_senpai == false)
        return (0);
    //$binary_senpai = "this is the image";
    if ($class)
        echo /*"img class ".$galleryid."\n";*/"<img class=\"$class\" src='data:image/jpeg;base64, $binary_senpai' />";
    else
        echo /*"img ncl ".$galleryid."\n";*/"<img src='data:image/jpeg;base64, $binary_senpai' />";
    return (1);
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
		echo "failed to get_specific".$e->getMessage()."\n";
	}
}

function max_img(){
    $senpai = call_onee_san();
    $new = $senpai->prepare("SELECT id FROM gallery");
    $new->execute();
    $max = 0;
    while ($column = $new->fetch(PDO::FETCH_ASSOC))
        if ($max < $column['id'])
            $max = $column['id'];
    $new->closeCursor();
    echo $max."\n";
}

function retrieve_img($amm,$page_no,$class){
    $i = ($amm * ($page_no - 1)) + 1;
    $amm += $i;
    while ($i < $amm)
    {
        if (ver_img($i) == 0){
            return (0);
        }
        else{
            echo "<div class=\"column middle title\">Title</div>
            <div class=\"column middle subtitle\">Title Description, DATE</div>";
            retrieve_img(3,1,"column middle image");
            echo "<div class=\"column middle icons\">
                <a class=\"icons\">1
                    <i class=\"fa fa-thumbs-up w3-hover-opacity\"></i>
                    <i class=\"fa fa-comments w3-hover-opacity\" onclick=\"openDropComment()\"></i>
                </a>
            </div>
        <div id=\"comment-box\" class=\"column middle comment_container\">
            <a class=\"c-btn-close\" onclick=\"openCloseComment()\">&times;</a>
            <br />
            <label> Comment: <br>
                <textarea name=\"Comment\" class=\"Input comment-box\" required></textarea>
            </label>
            <br />
            <input type=\"submit\" name=\"Submit\" value=\"Submit Comment\" class=\"Submit\">
        </div>";
        }
        $i++;
    }
}
/*
function retrieve_img($amm,$page_no,$class){
    $i = ($amm * ($page_no - 1)) + 1;
    $amm += $i;
    while ($i < $amm)
    {
        if (ver_img($i) == 0){
            return (0);
        }
        else{

        }
        $i++;
    }
}
*/
?>