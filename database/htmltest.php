<?php
function get_val($username,$value){
    $db = mysqli_connect("localhost:3306","senpai","noticeme","senpai");
    $ret = mysqli_query($db,"SELECT $value FROM users WHERE username='$username'");
    $ret2 = mysqli_fetch_array($ret);
    return ($ret2[$value]);
    mysqli_close($db);
}
?>
<html>
<body>
    <text>-------------------------html image display test 1---------------------------</text>
    <?php
        $binary_senpai = get_val("mai","display");
        echo "<img src= 'data:image/jpeg;base64, $binary_senpai' />";
        //echo "<img src='data:image/jpeg;base64, $imgData' />";
    ?>
</body>
</html>