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
<!-- <BR><BR> -->


<?php

$urights = $_SESSION['urights'];



$packagenumber = $_POST["packagenumber"];

$donornumberr = $_POST["donornumber"];




// Construct Receive Date
$fdate = $frcvyr . "-" . $frcvmm . "-" . $frcvdd;
$tdate = $trcvyr . "-" . $trcvmm . "-" . $trcvdd;


echo "</b>"; 
echo "</br>"; 



//Print_r ($_SESSION);
echo "</br>"; 
echo "</br>"; 



/*  Connect to Data Base */
/*
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

*/   
echo  "<P><FONT SIZE=5><B>Thaw Groups</B></FONT></P>";

echo "</br>";
echo "</br>";
echo "</br>";

/*
mysql_select_db('milk_db', $con);

$sql   = "SELECT * FROM batch where thawgroupproccessflag = 'Y'";


echo $sql;
echo "</br>";
echo "</br>";


$result = mysql_query($sql, $con); 

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
*/

echo "<TABLE FRAME=VOID CELLSPACING=0 COLS=4 RULES=NONE BORDER=0>\n";
echo "	<COLGROUP><COL WIDTH=150><COL WIDTH=150><COL WIDTH=20><COL WIDTH=150><COL WIDTH=280><COL WIDTH=100></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=100 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=5>Thaw Group ID</FONT></B></TD>\n";
echo "			<TD WIDTH=100 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=5>Created</FONT></B></TD>\n";
echo "			<TD WIDTH=160 ALIGN=LEFT><B><FONT SIZE=5>Type</FONT></B></TD>\n";
echo "			<TD WIDTH=100 ALIGN=LEFT><B><FONT SIZE=5>Location</FONT></B></TD>\n";
echo "			<TD WIDTH=180 ALIGN=LEFT><B><FONT SIZE=5>xxxx</FONT></B></TD>\n";
echo "			<TD WIDTH=180 ALIGN=LEFT><B><FONT SIZE=5>xxxx</FONT></B></TD>\n";
echo "		</TR>\n";
echo "		<TR>\n";
echo "			<TD HEIGHT=17 ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "			<TD ALIGN=LEFT><BR></TD>\n";
echo "		</TR>\n";


while ($row = mysql_fetch_assoc($result)) 
   {
       $thawgroupid = $row['thawgroupid'];
       $createdate = $row['createdate'];
       $tgtype = $row['type'];
       $storagelocation=$row['storagelocation'];
       $rdate=$row['receivedate'];
       $storagelocation=$row['storagelocation'];

       echo "<TR>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./batchadd.php?thawgroupid=$thawgroupid\"> $packagenumber</a></FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$createdate</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$tgtype</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$storagelocation</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$rdate</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$storagelocation</FONT></TD>\n";
       echo "</TR>\n";
   
       $rec = 1;   /* triggers when records are found  */
   }



if (!$rec) 
   {
       echo "<TR>\n";
       echo "<TD HEIGHT=17 ALIGN=LEFT><FONT SIZE=4>No Records Found</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><BR></TD>\n";
       echo "<TD ALIGN=LEFT><BR></TD>\n";
       echo "<TD ALIGN=LEFT><BR></TD>\n";
       echo "<TD ALIGN=LEFT><BR></TD>\n";
       echo "<TD ALIGN=LEFT><BR></TD>\n";
       echo "</TR>\n";
    }


echo "	</TBODY>\n";
echo "</TABLE>\n";
echo "\n";

echo "</br>";
echo "Click on link to Add Batch";
echo "</br>";



mysql_free_result($result); 


mysql_close($con);


echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";




echo "<p><a href=\"./labmenu.php\">Lab Menu</a></p>\n";



?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
