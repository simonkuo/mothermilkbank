<?php
session_start();
// store session data

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="LibreOffice 3.3  (Linux)">
	<META NAME="AUTHOR" CONTENT="Pat Dumalanta">
	<META NAME="CREATED" CONTENT="20121123;15512700">
	<META NAME="CHANGEDBY" CONTENT="Pat Dumalanta">
	<META NAME="CHANGED" CONTENT="20121123;16005500">
<!--
<?php include '../mystyle.php'; ?>
-->

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>



<?php



// Print_r ($_SESSION);

echo "</br>";
echo "<p><a href=\"./labsearch.php\">Lab Search</a></p>\n";
echo "</br>";

/*
echo "</br>";
echo "<p><a href=\"./labproc.php\">Lab Processing</a></p>\n";
echo "</br>";
*/

echo "</br>";
echo "<p><a href=\"./bpooladd.php\">Create New Blue Pool</a></p>\n";
echo "</br>";

echo "</br>";
echo "<p><a href=\"./batchadd.php\">Create New Batch</a></p>\n";
echo "</br>";

echo "</br>";
echo "<p><a href=\"./bottleadd.php\">Create New Bottle</a></p>\n";
echo "</br>";



echo "</br>";
echo "<p><a href=\"../dbenter.php\">Main menu</a></p>\n";
echo "</br>";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
