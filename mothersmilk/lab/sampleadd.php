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

<?php include '../mystyle.php'; ?>


</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php

//Print_r ($_SESSION);

$sampleid = $_GET["sampleid"];
/*
echo "sampleid: " . "$sampleid";
echo "<br>";

*/

echo "<p><b>Add Lab Sample</b></p>";


echo "<br>";

echo "</br>";
echo "<form action=\"samplecnfrm.php?sampleid=$sampleid&ctype=2\" method=\"post\">\n";

echo "Sample ID:&nbsp;&nbsp;&nbsp;&nbsp;" . "<b>$sampleid</b>"; 
echo "</br>"; 
echo "</br>"; 


echo "</br>\n";
echo "</br>\n";
echo "<input type=\"submit\" value=\"Add Sample\">\n";
echo "</br>\n";
echo "</br>\n";
echo "</br>\n";
echo "</form>\n";

echo "</br>";

echo "</br>";
echo "</br>";


// ****************************************************************

   mysql_free_result($result); 

   echo "</br>";
   echo "</br>";
   echo "</br>";



   echo "</br>";
   echo "<p><a href=\"./batchadd.php\">Back</a></p>\n";

// some code

// mysql_close($con);




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
