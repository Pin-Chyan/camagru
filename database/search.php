<?php
if ($_GET['users'] !== '')
{
	if (file_exists("/users"))
	{
		$items = unserialize(file_get_contents("private/items"));
		$item = $items[$_GET['item']];
		if (!empty($item))
		{
			echo "<h3>".$item['item']." - $".$item['image']."</h3>";
		}
		else
			echo "Nothing Found\n";
	}
}
else
{
	echo "Error\n";
}
exit();
?>