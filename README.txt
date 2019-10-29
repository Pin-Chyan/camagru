Mainly for PC and Marthen

Funtions available:

in the database folder we have the following:

Sub categories:

1. Functions.php (general)

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

2. functions_likes.php (for the like button)

		add_like($userid, $img, $type);

		update_like ($userid, $img, $type);

		get_like($userid, $img); <-- work in progress

		count_likes($img);

		