<?php

function basic_html($test1 , $test2, $test3) {
    print ("<!DOC TYPE HTML>");
    print ("<html>");
    print ("<head>");
    print ("<title>Redirect</title>");
    print ("</head>");
    print ("<body>\"" . $test1 . "\"");
    print ("<br />");
    print ("\"" . $test2 . "\"");
    print_r($test3);
    print ("</body>");
    print ("</html>");

}

?>