<?php 
require_once("../header.php");
session_start();

$conn = Call_onee_san();
if (isset($_POST['q']))
    echo "post set\n ";
if ($conn){
    echo "success ".$_POST['q'];
    add_comment(1,2,"ajax run");
}
?>