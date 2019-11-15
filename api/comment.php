<?php 
require_once("../header.php");
session_start();


// echo "The time is " . date("h:i:sa") . "<br/>";
// echo "post test ok ".$_POST['id']."<br/>";
// print_r($_POST);
// echo "<br/> get test ok <br/>";
// print_r($_GET);

//check error start 
$err = 0;
if (!isset($_SESSION['user_id'])){
    echo "error : no user logged in<br/>";
    $err = 1; 
}
else if (!isset($_POST['action'])){
    echo "error : unspecified action<br?>";
    $err = 1;
}
//finish error check
if ($err == 0){
    $user   = get_specific("id","users","username",$_SESSION['user_id']);
    $action = $_POST['action'];
    $galleryid = $_POST['form_id'];
}

if ($err == 1)
{
    echo "please code properly next time UWU<br/>";
}
else if ($action === "add"){
    if (isset($_POST['comment'])){
        $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
        $posterid = get_specific('userid', 'gallery', 'id', $galleryid);
        add_comment($user,$galleryid, $comment);
        if ($user != $posterid) {
            $name = $_SESSION['user_id'];
            $userid = get_specific('userid', 'gallery', 'galleryid', $galleryid);
            $email = get_specific('email', 'users', 'id', $posterid);
            $pref = get_specific('notify', 'users', 'id', $posterid);
            if ($pref) {
                $subject = "Senpai noticed us";
                $msg = "
                <html>
                <body>
                <p>User ".$name." said \"".$comment."\"</p></br>
                </body>
                </html>
                ";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                mail($email,$subject,$msg, $headers);
            }
        }
    }
}
else if ($action === "delete"){
    delete_specific("comments","id",$_POST['form_id']);
}
$page = $_GET['page'];
$prev_pos = $_GET['prev_pos'];
header("Location: ../index.php?page=$page&prev_pos=$prev_pos");
?>