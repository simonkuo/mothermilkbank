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

$dnum = $_GET["dnum"];


// Print_r ($_SESSION);
//echo "</br>"; 


/*  Connect to Data Base */

$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);

$sql   = "SELECT * FROM screenertable where donornumber =  $dnum";

//echo $sql;
//echo "</br>";

$result = mysql_query($sql, $con); 

/*
echo "</br>"; 
Print_r ($_SESSION);
echo "</br>";

*/

if (!$result) 
    {
       echo "DB Error, could not query the database\n";
       echo 'MySQL Error: ' . mysql_error();
       exit;
    }

$row = mysql_fetch_assoc($result);

$diet = $row['diet'];
$organization = $row['organization'];
$organizationother = $row['organizationother'];
$donorstatus = $row['determinechoose'];
$rxbcchoose = $row['rxbcchoose'];
$rxbcdate = $row['rxbcdate'];
$babysdob = $row['babysdob']; 
$storefrom = $row['storefrom']; 
$donorcomment = $row['donorcomment'];


echo "<b><FONT SIZE=5>Package Added</FONT></b>";

echo "</br>";
echo "</br>"; 

echo "<form action=\"recvcnfrm.php?dnum=$dnum&ctype=2\" method=\"post\">\n";

echo "Doner number:&nbsp;&nbsp;&nbsp;" . "<b>" . $dnum . "</b>"; 

echo "</br>";
echo "</br>"; 
echo "</br>"; 


echo "Illness and Medication Report Required?:&nbsp;&nbsp;&nbsp;&nbsp;";
echo "\n";
echo "<a href=\"./recvadd.php?dnum=$dnum&mreport=no\">No</a> |\n";
echo "<a href=\"./recvadd.php?dnum=$dnum&mreport=yes\">Yes</a> \n";
echo "\n";



$mreport = $_GET["mreport"];

// echo "<br>" . $mreport . "</br>";

if ($mreport == "yes")
  {
     echo "<input type=\"hidden\" name=\"mreport\" value=\"yes\">\n";
     include ("./mreport.html");
  }
/*
else
  {
     echo "<input type=\"hidden\" name=\"mreport\" value=\"no\">\n";
     include ("./blank.html");
  }
*/

//echo "</br>"; 
echo "</br>"; 
echo "</br>"; 

// Populate month - day - year today's date

$rmm = (idate("m"));
$rdd = (idate("d"));
$ryy = (idate("Y"));


echo "Date Received:&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"rmm\" size=\"2\" maxlength=\"2\" value=\"$rmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"rdd\" size=\"2\" maxlength=\"2\" value=\"$rdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"ryy\" size=\"4\" maxlength=\"4\" value=\"$ryy\">\n";
echo "&nbsp;mm-dd-yyyy\n";

echo "</br>"; 
echo "</br>"; 
echo "</br>"; 


echo "Organization:&nbsp;&nbsp;&nbsp;". "<b>" . $organization . "</b>";

echo "<input type=\"hidden\" name=\"organization\" value=\"$organization\">\n";

if ($organization =="OTH") 
   {
       echo "&nbsp;&nbsp;&nbsp;Name:&nbsp;&nbsp;" . "<b>" . $organizationother . "</b>"; 
       echo "<input type=\"hidden\" name=\"organizationother\" value=\"$organizationother\">\n";

   }

echo "</br>";
echo "</br>";
echo "</br>";

echo "Status:&nbsp;&nbsp;&nbsp;" . "<b>$donorstatus</b>"; 

echo "<input type=\"hidden\" name=\"donorstatus\" value=\"$donorstatus\">\n";

echo "</br>";
echo "</br>";
echo "</br>";

echo "RX/BC Pll/OTC Use (Y/N)(Dates):&nbsp;&nbsp;" . "<b>$rxbcchoose</b>"; 

echo "<input type=\"hidden\" name=\"rxbcchoose\" value=\"$rxbcchoose\">\n";


if ($row['rxbcchoose']=="Yes") 
   {
       echo "&nbsp;&nbsp;&nbsp;Date:&nbsp;&nbsp;" . "<b>$rxbcdate</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 
       echo "<input type=\"hidden\" name=\"rxbcdate\" value=\"$rxbcdate\">\n";
   }

echo "</br>";
echo "</br>";
echo "</br>";


echo "Special Diet:&nbsp;&nbsp;" . "<b>$diet</b>"; 

echo "<input type=\"hidden\" name=\"diet\" value=\"$diet\">\n";


echo "</br>";
echo "</br>"; 
echo "</br>"; 

echo "Donor Comments:&nbsp;&nbsp;" . "<b>$donorcomment</b>"; 
echo "<input type=\"hidden\" name=\"donorcomment\" value=\"$donorcomment\">\n";


echo "</br>";
echo "</br>";
echo "</br>";

// Break string to dsplay month - day - year
//echo "</br>"; 
echo "Baby's DOB:&nbsp;&nbsp;&nbsp;" . "<b>" . substr($babysdob,5,2) . "-" .  substr($babysdob,8,2) . "-" . substr($babysdob,0,4) . "</b>" . "&nbsp;&nbsp;&nbsp;(mm-dd-yyyy)"; 

echo "<input type=\"hidden\" name=\"babysdob\" value=\"$babysdob\">\n";


echo "</br>";
echo "</br>";
echo "</br>";

echo "Cooler number:&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"coolernumber\" size=\"4\" maxlength=\"4\">\n"; 
echo "</br>";
echo "</br>";
echo "</br>";

echo "Cooler Comments:\n";
echo "<br>\n";
echo "<br>\n";
echo "<textarea name=\"coolercomments\" rows=2 cols=20 maxlength=40 >\n";
echo "$coolercomments\n";
echo "</textarea>\n";
echo "</br>";
echo "</br>";
echo "</br>";

echo "Number of Ounces:&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"numberofounces\" size=\"4\" maxlength=\"4\">\n"; 
echo "</br>"; 
echo "</br>"; 
echo "</br>";


echo "Expression Range:";
echo "</br>";
echo "</br>";
echo "&nbsp;&nbsp;From:&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"fcmm\" size=\"2\" maxlength=\"2\" value=\"mm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"fcdd\" size=\"2\" maxlength=\"2\" value=\"dd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"fcyy\" size=\"4\" maxlength=\"4\" value=\"yyyy\">\n";
echo "</br>";
echo "</br>";
echo "&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"tcmm\" size=\"2\" maxlength=\"2\" value=\"mm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"tcdd\" size=\"2\" maxlength=\"2\" value=\"dd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"tcyy\" size=\"4\" maxlength=\"4\" value=\"yyyy\">\n";


echo "</br>"; 
echo "</br>"; 
echo "</br>";

echo "Stored from:&nbsp;&nbsp;&nbsp;". "<b>$storefrom</b>";
echo "<input type=\"hidden\" name=\"storefrom\" value=\"$storefrom\">\n";


?>

</br>
</br>
</br>


Milk Grade:&nbsp;&nbsp

<select name="milkgrade" id="milkgrade" onchange="showme('milkgradestate','milkgradeother',3)">  
<option value="Hospital">Hospital (10 days from Baby's Birthday)</option>
<option value="DF">Dairy Free (Not Mature)</option>
<option value="DF Mature">Dairy Free (Mature)</option>
<option value="Other">Other</option>
</select>
&nbsp;&nbsp;&nbsp;
<input type ="text" name="milkgradeother" id="milkgradeother" style=" position:relative;visibility:hidden;" value="Other" size=15 maxsize=15 >  

</br>
</br>
</br>

Package State:&nbsp;&nbsp

<select name="packetstate" id="packetstate" onchange="showme('packetstate','packetstateother',3)">  
<option value="W">Waiting</option>
<option value="R">Ready to Use</option>
<option value="U">Used</option>
<option value="O">Other</option>
</select>
&nbsp;&nbsp;&nbsp;
<input type ="text" name="packetstateother" id="packetstateother" style=" position:relative;visibility:hidden;" value="Other">  

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
echo "<input type=\"submit\" value=\"Add Package\">\n";

echo "</br>";

echo "</br>\n";
echo "</form>\n";

echo "</br>";

mysql_close($con);

?> 

<p><a href="./donorslt.php">Return to results</a></p>

<p><a href="./receivingmenu.php">Receiver Menu</a></p>



<BR><BR>

</BODY>
</HTML>
