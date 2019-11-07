<?php

session_start();

if (!isset($_POST['action']))
{
    echo ("error : no action posted");
}
else if ($_POST['action'] === 'add test like')
    add_like(1,6);
?>