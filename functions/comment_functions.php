<?php
function find_comment($userid,$galleryid){
    try {
        $senpai = call_onee_san();
        $id = 1;
        $exec = $senpai->prepare("SELECT * FROM comments");
        $exec->execute();
        while (($res = $exec->fetch(PDO::FETCH_ASSOC))){
            if ($res['userid'] == $userid && $res['galleryid'] == $galleryid)
                return (1);
        }
    }
    catch (PDOException $err){
        echo $err."\n";
    }
}
function get_comment($userid,$galleryid){
    try {
        $senpai = call_onee_san();
        $id = 1;
        $exec = $senpai->prepare("SELECT * FROM comments WHERE userid=$userid AND galleryid='$galleryid'");
        $exec->execute();
        if (($res = $exec->fetch(PDO::FETCH_ASSOC))){
            return ($res['comment']);
        }
        else
            return (0);
    }
    catch (PDOException $err){
        echo $err."\n";
    }
}

function add_comment($userid,$galleryid,$comment){
    try {
        $senpai = Call_onee_san();
        $sql = "INSERT INTO comments (userid,galleryid,comment) VALUES ('$userid','$galleryid','$comment')";
        $senpai->exec($sql);
    }
    catch(PDOException $err){
        echo $err."\n";
    }
}

function remove_comment($userid,$galleryid){
	try{
		$senpai = call_onee_san();
		$sql = "DELETE FROM comments WHERE userid='$userid' AND galleryid='$galleryid'";
		$senpai->exec($sql);
		echo "comment removed\n";
	}
	catch (PDOException $err){
		echo $err."\n";
	}	
}

// <div id="comment-box" class="column middle comment_container">
// 					<div class="comment-box messages">
						
// 						<!-- left side text box -->
// 						<div class="comment-box left">
// 							<br />
// 							User-name:
// 						</div>
						
// 						<!-- right side text box -->
// 						<div class="comment-box right">
// 							dajsfkl;jsad;gdjalk llkasjfkl;dasjfdl;djasl; fl;aksjfdklsjl faskl;dfj l;kas fo;kaj
// 							ajdklhjakl dglkas jl; ajslgd ja; dgjlas gla jdlaj sl;dgjals galj dsal;k gakls;
// 						</div>
						
// 					</div>
// 					<label> Comment: <br>
// 						<!-- <input type="text" name="Comment" class="text-box"> -->
// 						<textarea name="Comment" class="text-box" required></textarea>
// 					</label>
// 					<br />
// 					<input type="submit" name="Submit" value="Submit Comment" class="Submit">
// 					<a class="c-btn-close" onclick="openCloseComment()">&times;</a>
// 				</div>
function home_get_comment($userid,$galleryid){
    try {
        $senpai = call_onee_san();
        $exec = $senpai->prepare("SELECT * FROM comments WHERE galleryid='$galleryid'");
        $exec->execute();
        // echo "<text style=\"color:white\"><-------coments--------><text><br/>";
        $com = 0;
        while (($res = $exec->fetch(PDO::FETCH_ASSOC))){
            $comment = $res['comment'];
            $id = $res['id'];
            $name = get_specific("username","users","id",$res['userid']);
            $img = get_userimg($name);
            echo "
            <div class=\"comment-box messages\">
            <!-- left side text box -->
                <div class=\"comment-box left\">
                    <img class=\"comment-image\" $img>
				    <a class=\"comment-title\">$name</a>
			    </div>
						
		    <!-- right side text box -->
			    <div class=\"comment-box right\">
                    $comment";
            if ($res['userid'] == $userid){
                $page = $_GET['page'];
                $prev_pos = $galleryid;
                echo "<form  action=\"api/comment.php?page=$page&prev_pos=$prev_pos\" method=\"POST\">
                    <input type=\"hidden\" name=\"action\" value=\"delete\">
                    <input type=\"hidden\" name=\"form_id\" value=\"$id\">
                    <input type=\"submit\" name=\"sub_action\" value=\"remove\">
                    </form>";
                }
                echo"</div>
                </div>";
                // echo "<text style=\"color:white\"> $name : $comment<text>";
                // echo "<br/>";
                $com = 1;
            }
            if ($com == 0){
                // echo "<text style=\"color:white\">be the first to comment UWU<text><br/>";
        }
    }
    catch (PDOException $err){
        echo $err."\n";
    }
}

?>