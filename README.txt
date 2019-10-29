Mainly for PC and Marthen

to use any function use " require("./header.php"); "

functions are:

1. general_functions.php

		get_specific($target, $table, $column, $value);
				ok for get_specific:
				target = what you want to get.
				table = the table its in.
				coloumn = the coloum of the value you have to offer.
				value = any other reference to what you want, example. 
				you want the vkey the give the username for who you want the vkey of,
				and the column will be username

		update_specific($target, $new_var, $table, $column, $value);

		find_specific($var, $column, $table);

		delete_specific($table, $column, $value);

		add_user($username, $email, $display, $password);

2. like_functions.php

		add_like($userid, $galleryid);
		remove_like($userid, $galleyid); think0

3. user_functions.php

		add_user($username,$email,$display,$password); // auto double hash (base65 then md5);

4. image_functions.php
		
		upload_img($userid,$imagelocation); (uploads image from either url or local file into gallery);
		get_img($galleryid); (retireves image from database for html rendering);

5.  comment_functions.php

		add_comment($userid,$galleryid,$comment); (adds comment to table and links it to gallery and userid multiple comments are supported)
		remove_comment($userid,$galleryid);