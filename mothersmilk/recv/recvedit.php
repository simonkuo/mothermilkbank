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

include '../mystyle.php'; 
//include '../include main.js'; 

include '../include/main.js';
include '../include/mystylex.php'; 


?>

</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P>
<!-- <BR><BR> -->


<?php

$packagenumber = $_GET["packagenumber"];



// connect to database
$con = mysql_connect("localhost",$_SESSION["uname"],$_SESSION["pwd"]);

mysql_select_db('milk_db', $con);


$sql   = "SELECT * FROM receivertable where packagenumber =  $packagenumber";


$result = mysql_query($sql, $con); 

$row = mysql_fetch_assoc($result);


//Print_r ($_SESSION);


$rdate = $row['receivedate'];
$cdate = $row['createdate'];
$dnum = $row['donornumberr'];
$organization = $row['organization'];
$donorstatus = $row['donorstatus'];
$rxbcchoose = $row['rxbcchoose'];
$diet = $row['diet'];
$donorcomment = $row['donorcomment'];
$babysdob = $row['babysdob'];

$milkgrade = $row['milkgrade'];

$storefrom = $row['storefrom'];

$coolernumber = $row['coolernumber'];

$coolercomments = $row['coolercomments'];

$numberofounces = $row['numberofounces'];
$packetstate = $row['packetstate'];

$expressiondatefrom = $row['expressiondatefrom'];
$expressiondateto = $row['expressiondateto'];

$receivercomment = $row['receivercomment'];

$mreport = $row['mreport'];


echo "<form action=\"recvcnfrm.php?dnum=$dnum&packagenumber=$packagenumber&ctype=1\" method=\"post\">\n";

echo "</br>";

echo "Package number:&nbsp;&nbsp;&nbsp;" . "<b>$packagenumber</b>"; 
echo "</br>"; 
echo "</br>"; 

if ($mreport == "yes")
  {

      echo "<input type=\"hidden\" name=\"mreport\" value=\"yes\">\n";

      $illness = $row["illness"];
      $illnesscomment = $row["illnesscomment"];

      // Creating Illness Dates

      $illnessbegan = $row["illnessbegan"];
      $illnessbeganmm = substr($illnessbegan,5,2);
      $illnessbegandd = substr($illnessbegan,8,2);
      $illnessbeganyy = substr($illnessbegan,0,4);

      $illnessend = $row["illnessend"];
      $illnessendmm = substr($illnessend,5,2);
      $illnessenddd = substr($illnessend,8,2);
      $illnessendyy = substr($illnessend,0,4);

      $symptomdescription = $row["symptomdescription"];

      $fever = $row["fever"];

      // Creating Fever Dates

      $feverstart = $row["feverstart"];
      $feverstartmm = substr($feverstart,5,2);
      $feverstartdd = substr($feverstart,8,2);
      $feverstartyy = substr($feverstart,0,4);

      $feverend = $row["feverend"];
      $feverendmm = substr($feverend,5,2);
      $feverenddd = substr($feverend,8,2);
      $feverendyy = substr($feverend,0,4);

      $meduse = $row["meduse"];
      $medtypes = $row["medtypes"];
      $dosage = $row["dosage"];

      // Creating Dosage Dates

      $dosagestart = $row["dosagestart"];
      $dosagestartmm = substr($dosagestart,5,2);
      $dosagestartdd = substr($dosagestart,8,2);
      $dosagestartyy = substr($dosagestart,0,4);

      $dosageend = $row["dosageend"];
      $dosageendmm = substr($dosageend,5,2);
      $dosageenddd = substr($dosageend,8,2);
      $dosageendyy = substr($dosageend,0,4);

      $reportcomments = $row["reportcomments"];

      $signature = $row["signature"];

      // Creating Signature Dates

      $signaturedate = $row["signaturedate"];
      $signaturedatemm = substr($signaturedate,5,2);
      $signaturedatedd = substr($signaturedate,8,2);
      $signaturedateyy = substr($signaturedate,0,4);


switch ($illness)
{
case 'Donor':
  $donor = 'selected';
  break;
case 'Family Member':
  $family = 'selected';
  break;
default:
  echo "";
}


switch ($meduse)
{
case 'Yes':
  $yes = 'selected';
  break;
case 'No':
  $no = 'selected';
  break;
default:
  echo "";
}


?>

      <p><b>Illness and Medical Report</b></p>

      Who was Ill?&nbsp;&nbsp;

      <select name="illness">  
      <option value="Donor" <?php echo $donor ?>>Donor</option>
      <option value="Family Member" <?php echo $family ?>>Family Member</option>
      </select>

      <br>
      <br>
      Please Explain:
      <br>
      <br>

      <textarea name="illnesscomment" rows=2 cols=25 maxlength=52>
<?php echo $illnesscomment ?>
      </textarea>

      <br>
      <br>


      Illness&nbsp;&nbsp;Began:&nbsp;&nbsp;&nbsp;
<input type=int name=illbmm size=2 maxlength=2 value="<?php echo $illnessbeganmm ?>">
&nbsp;&nbsp;<input type=int name=illbdd size=2 maxlength=2 value="<?php echo       $illnessbegandd ?>">
&nbsp;&nbsp;<input type=int name=illbyy size=4 maxlength=4 value="<?php echo $illnessbeganyy ?>">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ended:&nbsp;&nbsp;&nbsp;
<input type=int name=illemm size=2 maxlength=2 value="<?php echo $illnessendmm ?>">
&nbsp;&nbsp;<input type=int name=illedd size=2 maxlength=2 value="<?php echo $illnessenddd ?>">
&nbsp;&nbsp;<input type=int name=illeyy size=4 maxlength=4 value="<?php echo $illnessendyy ?>">

      <br>
      <br>
      Description of Symptoms:
      <br>
      <br>
      <textarea name="symptomdescription" rows=2 cols=25 maxlength=52 >
<?php echo $symptomdescription ?>
      </textarea>

      <br>
      <br>

      Fever?&nbsp;&nbsp;

      <input type ="text" name="fever" size=3 maxlength=3 value="<?php echo $fever ?>">
&nbsp;&nbsp;F

      </br>
      </br>


      Fever&nbsp;&nbsp;Started:&nbsp;&nbsp;&nbsp;
<input type=int name=fsmm size=2 maxlength=2 value="<?php echo $feverstartmm ?>">
&nbsp;&nbsp;<input type=int name=fsdd size=2 maxlength=2 value="<?php echo $feverstartdd ?>">
&nbsp;&nbsp;<input type=int name=fsyy size=4 maxlength=4 value="<?php echo $feverstartyy ?>">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ended:&nbsp;&nbsp;&nbsp;
<input type=int name=femm size=2 maxlength=2 value="<?php echo $feverendmm ?>">
&nbsp;&nbsp;<input type=int name=fedd size=2 maxlength=2 value="<?php echo $feverenddd ?>">
&nbsp;&nbsp;<input type=int name=feyy size=4 maxlength=4 value="<?php echo $feverendyy ?>">

     </br>
     </br>

     DONOR MEDICATION USE

     <select name="meduse">
     <option value="Yes" <?php echo $yes ?>>Yes</option>
     <option value="No" <?php echo $no ?>>No</option>
     </select>

     </br>
     </br>

     Types:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=text name=medtypes size=20 maxlength=20 value="<?php echo $medtypes ?>"> 
     </br>
     </br>

     Dosage:&nbsp;&nbsp;<input type=text name=dosage size=20 maxlength=20 value="<?php echo $dosage ?>"> 
     </br>
     </br>


     Dosage&nbsp;&nbsp;Started:&nbsp;&nbsp;&nbsp;
<input type=int name=dsmm size=2 maxlength=2 value="<?php echo $dosagestartmm ?>">
&nbsp;&nbsp;<input type=int name=dsdd size=2 maxlength=2 value="<?php echo $dosagestartdd ?>">
&nbsp;&nbsp;<input type=int name=dsyy size=4 maxlength=4 value="<?php echo $dosagestartyy ?>">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ended:&nbsp;&nbsp;&nbsp;
<input type=int name=demm size=2 maxlength=2 value="<?php echo $dosageendmm ?>">
&nbsp;&nbsp;<input type=int name=dedd size=2 maxlength=2 value="<?php echo $dosageenddd ?>">
&nbsp;&nbsp;<input type=int name=deyy size=4 maxlength=4 value="<?php echo $dosageendyy ?>">

     <br>
     <br>
     Notes/Comments:
     <br>
     <br>
     <textarea name="reportcomments" rows=2 cols=50 maxlength=102 >
<?php echo $reportcomments ?>
</textarea>

     <br>
     <br>


     Signed:&nbsp;&nbsp;<input type=text name=signature size=30 maxlength=30 value="<?php echo $signature ?>"> 
</br>
</br>


     Date:&nbsp;&nbsp;&nbsp;&nbsp;
<input type=int name=smm size=2 maxlength=2 value="<?php echo $signaturedatemm ?>">
&nbsp;&nbsp;<input type=int name=sdd size=2 maxlength=2 value="<?php echo $signaturedatedd ?>">
&nbsp;&nbsp;<input type=int name=syy size=4 maxlength=4 value="<?php echo $signaturedateyy ?>">

     </br>
     </br>

      <p><b>End of Illness and Medical Report</b></p>

     </br>


<?php
  }


$rmm = substr($rdate,5,2);
$rdd = substr($rdate,8,2);
$ryy = substr($rdate,0,4);

echo "Date Received:&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"rmm\" size=\"2\" maxlength=\"2\" value=\"$rmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"rdd\" size=\"2\" maxlength=\"2\" value=\"$rdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"ryy\" size=\"4\" maxlength=\"4\" value=\"$ryy\">\n";
echo "&nbsp;mm-dd-yyyy\n";



echo "</br>";
echo "</br>"; 
echo "Doner number:&nbsp;&nbsp;&nbsp;" . "<b>$dnum</b>";
echo "</br>";
echo "</br>";
echo "Organization:&nbsp;&nbsp;&nbsp;" . "<b>$organization</b>"; 

echo "<input type=\"hidden\" name=\"organization\" value=\"$organization\">\n";

echo "</br>";
echo "</br>";

echo "Status:&nbsp;&nbsp;&nbsp;" . "<b>$donorstatus</b>"; 

echo "<input type=\"hidden\" name=\"donorstatus\" value=\"$donorstatus\">\n";

echo "</br>";
echo "</br>";

echo "RX/BC Pll/OTC Use (Y/N)(Dates):&nbsp;&nbsp;" . "<b>$rxbcchoose</b>"; 

echo "<input type=\"hidden\" name=\"rxbcchoose\" value=\"$rxbcchoose\">\n";

echo "</br>";
echo "</br>";

echo "Special Diet:&nbsp;&nbsp;" . "<b>$diet</b>"; 

echo "<input type=\"hidden\" name=\"diet\" value=\"$diet\">\n";

echo "</br>";
echo "</br>";

echo "Donor Comments:&nbsp;&nbsp;" . "<b>$donorcomment</b>"; 
echo "<input type=\"hidden\" name=\"donorcomment\" value=\"$donorcomment\">\n";

echo "</br>";
echo "</br>";


// Creating Baby's birthday

$babysdobmm = substr($babysdob,5,2);
$babysdobdd = substr($babysdob,8,2);
$babysdobyy = substr($babysdob,0,4);

echo "Baby's DOB:&nbsp;&nbsp;&nbsp" . "<b>$babysdobmm - $babysdobdd - $babysdobyy</b>";

echo "&nbsp;&nbsp;&nbsp;mm-dd-yyyy\n";

echo "<input type=\"hidden\" name=\"babysdob\" value=\"$babysdob\">\n";

echo "</br>";
echo "</br>";

echo "Cooler number:&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"coolernumber\" size=\"4\" maxlength=\"4\" value=\"$coolernumber\">\n"; 

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



echo "Number of Ounces:&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"numberofounces\" size=\"4\" maxlength=\"4\" value=\"$numberofounces\">\n"; 
echo "</br>"; 
echo "</br>"; 

$fcmm = substr($expressiondatefrom,5,2);
$fcdd = substr($expressiondatefrom,8,2);
$fcyy = substr($expressiondatefrom,0,4);

$tcmm = substr($expressiondateto,5,2);
$tcdd = substr($expressiondateto,8,2);
$tcyy = substr($expressiondateto,0,4);


echo "Expression Range:";
echo "</br>";
echo "</br>";
echo "&nbsp;&nbsp;From:&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"fcmm\" size=\"2\" maxlength=\"2\" value=\"$fcmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"fcdd\" size=\"2\" maxlength=\"2\" value=\"$fcdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"fcyy\" size=\"4\" maxlength=\"4\" value=\"$fcyy\">\n";
echo "&nbsp;mm-dd-yyyy\n";
echo "</br>";
echo "</br>";
echo "&nbsp;&nbsp;To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type=\"int\" name=\"tcmm\" size=\"2\" maxlength=\"2\" value=\"$tcmm\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"tcdd\" size=\"2\" maxlength=\"2\" value=\"$tcdd\">\n";
echo "&nbsp;&nbsp;<input type=\"int\" name=\"tcyy\" size=\"4\" maxlength=\"4\" value=\"$tcyy\">\n";
echo "&nbsp;mm-dd-yyyy\n";

echo "</br>"; 
echo "</br>"; 

echo "Stored from:&nbsp;&nbsp;&nbsp;". "<b>$storefrom</b>";


switch ($milkgrade)
{
case 'Hospital':
  $h = 'selected';
  break;
case 'DF':
  $df = 'selected';
  break;
case 'DF Mature':
  $dfm = 'selected';
  break;
case 'Other':
  $oth = 'selected';
  break;
default:
  echo "";
}


switch ($packetstate)
{
case 'W':
  $w = 'selected';
  break;
case 'R':
  $r = 'selected';
  break;
case 'O':
  $o = 'selected';
  break;
default:
  echo "";
}


switch ($storagelocation)
{
case 'Lab':
  $Lab = 'selected';
  break;
case 'F2':
  $F2 = 'selected';
  break;
case 'F3':
  $F3 = 'selected';
  break;
case 'F4':
  $F4 = 'selected';
  break;
case 'F1A':
  $F1A = 'selected';
  break;
case 'F1B':
  $F1B = 'selected';
  break;
case 'R3':
  $R3 = 'selected';
  break;
default:
  echo "";
}


?>

</br>
</br>


Milk Grade:&nbsp;&nbsp;&nbsp;

<select name="milkgrade" id="milkgrade" onchange="showme('milkgradestate','milkgradeother',3)">  
<option value="Hospital" <?php echo $h ?>>Hospital (10 days from Baby's Birthday)</option>
<option value="DF" <?php echo $df ?>>Dairy Free (Not Mature)</option>
<option value="DF Mature" <?php echo $dfm ?>>Dairy Free (Mature)</option>
<option value="Other" <?php echo $oth ?>>Other</option>
</select>

&nbsp;&nbsp;&nbsp;
<input type ="text" name="milkgradeother" id="milkgradeother" style=" position:relative;visibility:hidden;" value="Other" size=15 maxsize=15 >  

</br>
</br>

Package State:&nbsp;&nbsp;

<select name="packetstate" id="packetstate" onchange="showme('packetstate','packetstateother',2)">  
<option value="W" <?php echo $w ?>>Waiting</option>
<option value="R" <?php echo $r ?>>Ready to Use</option>
<option value="O" <?php echo $o ?>>Other</option>
</select>
&nbsp;&nbsp;&nbsp;
<input type ="text" name="packetstateother" id="packetstateother" style=" position:relative;visibility:hidden;" value="Other">  


</br>
</br>

<p>
Storage Location:&nbsp;&nbsp
<select name="storagelocation">  
<option value="Lab" <?php echo $Lab ?>>Lab</option>
<option value="F2" <?php echo $F2 ?>>F2 (raw)</option>
<option value="F3" <?php echo $F3 ?>>F3 (raw)</option>
<option value="F4" <?php echo $F4 ?>>F4 (raw)</option>
<option value="F1A" <?php echo $F1A ?>>F1A</option>
<option value="F1B" <?php echo $F1B ?>>F1B</option>
<option value="R3" <?php echo $R3 ?>>R3</option>
</select>
</p>



<?php


$sql   = "SELECT processnumber FROM screenertable where donornumber = $dnum";


$result = mysql_query($sql, $con); 

$row = mysql_fetch_assoc($result);

$processnumber = $row['processnumber'];

echo "<input type=\"hidden\" name=\"processnumber\" value=\"$processnumber\">\n";

/*
echo "</br>";
echo "processnumber: " . $processnumber;
echo "</br>";
*/


echo "</br>\n";

echo "</br>\n";


echo "</br>"; 


echo "</br>\n";
echo "<input type=\"submit\" value=\"Edit Donor Package\">\n";
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
   echo "<p><a href=\"./receivingmenu.php\">Return to Receiver Menu</a></p>\n";


   mysql_close($con);




?> 

</P>

<P><BR><BR>

</BODY>
</HTML>
