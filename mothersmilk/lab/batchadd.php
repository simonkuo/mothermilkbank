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
<?php 

include '../include/main.js'; 

include '../include/mystylex.php'; 


?>



</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php

$thawgroupid = $_GET["thawgroupid"];


// Print_r ($_SESSION);
//echo "</br>"; 


/*  Connect to Data Base */
/*
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);

$sql   = "SELECT * FROM batch where thawgroupid =  $thawgroupid";

//echo $sql;
//echo "</br>";

$result = mysql_query($sql, $con); 


echo "</br>"; 
Print_r ($_SESSION);
echo "</br>";



if (!$result) 
    {
       echo "DB Error, could not query the database\n";
       echo 'MySQL Error: ' . mysql_error();
       exit;
    }

$row = mysql_fetch_assoc($result);

$storagelocation = $row['storagelocation'];
*/

echo "<b><FONT SIZE=5>Create Batch</FONT></b>";

echo "</br>";
echo "</br>"; 

echo "<form action=\"batchconfirm.php?dnum=$dnum&ctype=2\" method=\"post\">\n";



// Populate month - day - year today's date

$bmm = (idate("m"));
$bdd = (idate("d"));
$byy = (idate("Y"));


echo "Batch Creation Date:&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"rmm\" size=\"2\" maxlength=\"2\" value=\"$bmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"rdd\" size=\"2\" maxlength=\"2\" value=\"$bdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"ryy\" size=\"4\" maxlength=\"4\" value=\"$byy\">\n";
echo "&nbsp;mm-dd-yyyy\n";
echo "</br>"; 
echo "</br>"; 

echo "Thaw Group ID:&nbsp;&nbsp;&nbsp;" . "<b>" . $thawgroupid . "</b>"; 
echo "</br>"; 
echo "</br>";

//Create Batch ID

$bbyy = substr($byy,2,2);

$bbmm = substr($bmm,0,1);
$bbbmm = substr($bmm,1,1);

if ($bbbmm == "")
   {
      //Appends "0" if month is less than 10 
      $bbmm = "0" . $bbmm;
   }
else
   {
      $bbmm = $bmm;
   }


$bbdd = substr($bdd,0,1);
$bbbdd = substr($bdd,1,1);

if ($bbbdd == "")
   {
      //Appends "0" if day is less than 10 
      $bbdd = "0" . $bbdd;
   }
else
   {
      $bbdd = $bdd;
   }



$batchid = "SC" . $bbyy . $bbmm . $bbdd;

echo "Batch ID:&nbsp;&nbsp;&nbsp;" . "<b>" . $batchid . "</b>"; 
echo "</br>"; 
echo "</br>"; 


// Naming "Raw" Sample for Batch

$rawbatchsampleid = $batchid . "RAW";  

$pasterizedbatchsampleid = $batchid;  

// Setting both Batch Samples to "Waiting"

$rawbatchsamplestatus = "Waiting";  
$pasterizedbatchsamplestatus = "Waiting";  

//****************************************************

echo "<TABLE FRAME=VOID CELLSPACING=0 COLS=3 RULES=NONE BORDER=0>\n";
echo "	<COLGROUP><COL WIDTH=200><COL WIDTH=200><COL WIDTH=200></COLGROUP>\n";
echo "	<TBODY>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=155 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=3>Samples</FONT></B></TD>\n";
echo "			<TD WIDTH=173 ALIGN=LEFT><B><FONT SIZE=3>Aproval</FONT></B></TD>\n";
echo "			<TD WIDTH=176 ALIGN=LEFT><B><FONT SIZE=3></FONT></B></TD>\n";
echo "		</TR>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=155 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=3></FONT></B></TD>\n";
echo "			<TD WIDTH=173 ALIGN=LEFT><B><FONT SIZE=3></FONT></B></TD>\n";
echo "			<TD WIDTH=176 ALIGN=LEFT><B><FONT SIZE=3></FONT></B></TD>\n";
echo "		</TR>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=155 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=3>$rawbatchsampleid</FONT></B></TD>\n";
echo "			<TD WIDTH=173 ALIGN=LEFT><B><FONT SIZE=3>$rawbatchsamplestatus</FONT></B></TD>\n";
echo "			<TD WIDTH=176 ALIGN=LEFT><B><FONT SIZE=3><a href=\"./sampleadd.php?sampleid=$rawbatchsampleid\">Add</a></B></FONT></TD>\n";
echo "		</TR>\n";
echo "		<TR>\n";
echo "			<TD WIDTH=155 HEIGHT=33 ALIGN=LEFT><B><FONT SIZE=3>$pasterizedbatchsampleid</FONT></B></TD>\n";
echo "			<TD WIDTH=173 ALIGN=LEFT><B><FONT SIZE=3>$pasterizedbatchsamplestatus</FONT></B></TD>\n";
echo "			<TD WIDTH=176 ALIGN=LEFT><B><FONT SIZE=3><a href=\"./sampleadd.php?sampleid=$pasterizedbatchsampleid\">Add</a></FONT></B></TD>\n";
echo "		</TR>\n";

while ($row = mysql_fetch_assoc($resultd)) 
   {
       $dnum=$row['donornumberl'];
       $dnrstat=$row['donorstat'];

       echo "<TR>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4>$dnum</FONT></TD>\n";
       echo "<TD ALIGN=LEFT><FONT SIZE=4>$dnrstat</FONT></TD>\n";
//       echo "<TD ALIGN=LEFT><FONT SIZE=4>REMOVE</FONT></TD>\n";
       echo "<TD HEIGHT=25 ALIGN=LEFT><FONT SIZE=4><a href=\"./bpooldnrdelete.php?dnum=$dnum&bpoolnumber=$bpoolnumber\">Remove</a></FONT></TD>\n";

       echo "</TR>\n";
   
   }


echo "	</TBODY>\n";
echo "</TABLE>\n";



//****************************************************

echo "</br>"; 
echo "</br>";

echo "Person Mixing and Pouring:&nbsp;&nbsp;&nbsp; 
<input type=\"text\" name=\"mixer\" size=\"15\" maxlength=\"15\">\n"; 
echo "</br>"; 
echo "</br>";

echo "Number of Bottles:&nbsp;&nbsp;&nbsp; 
<input type=\"text\" name=\"bottlenumber\" size=\"15\" maxlength=\"15\">\n"; 
echo "</br>"; 
echo "</br>"; 

echo "Number of ounces per bottles:&nbsp;&nbsp;&nbsp; 
<input type=\"text\" name=\"bottleounces\" size=\"15\" maxlength=\"15\">\n"; 
echo "</br>"; 

echo "</br>";

?>


</br>
</br>
</br>

</br>
</br>

<p>
Storage Location:&nbsp;&nbsp;

<select name="storagelocation" id="storagelocation">  
<option value="Lab">Lab</option>
<option value="F2">F2 (raw)</option>
<option value="F3">F3 (raw)</option>
<option value="F4">F4 (raw)</option>
<option value="F1A">F1A</option>
<option value="F1B">F1B</option>
<option value="R3">R3</option>
</select>

</p>



<?php

echo "</br>"; 


mysql_free_result($result); 

echo "</br>";
echo "</br>";
echo "<input type=\"submit\" value=\"Add Batch\">\n";

echo "</br>";

echo "</br>\n";
echo "</form>\n";

echo "</br>";

mysql_close($con);

?> 

<p><a href="./thawgroups.php">Thaw Group Search Results</a></p>

<p><a href="./labmenu.php">Lab Menu</a></p>



<BR><BR>

</BODY>
</HTML>
