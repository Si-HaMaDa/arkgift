<?php
$file_path = "a_countclicks.php";

// Open the file to get existing content
$contents = file_get_contents($file_path);
$current = explode("\n", $contents);

echo end($current) + 1;
echo "<br>";

$contents = str_replace(end($current), end($current) + 1, $contents);

file_put_contents($file_path, $contents);
?>
2
