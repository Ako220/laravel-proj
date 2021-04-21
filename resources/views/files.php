<?php
	$file_handle = fopen("file://C:/Users/Asus/Desktop/Akzhan.txt", "w");
	if($file_handle == false)
	{
		echo "<p>Error occurred in opening the file...exiting...</p>";
		exit();
	}
	fwrite($file_handle, "<p>This is writing to a file tutorial in PHP</p>");
	fwrite($file_handle, "<p>All the content inside this file is written using PHP program</p>");
	echo "<p>All the content is written to the file successfully.</p>";
	fclose($file_handle);
?>