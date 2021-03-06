<?php 
   include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/config/main_config.php"); 
   session_start();

  // check if logged in 
  include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/LoginCheck.php");

  // check if has rights to access this page
  $urights = $_SESSION['urights'];
  if( !($urights & RECEIVER_RIGHTS) )
  { // no receiver rights
    header('Location: /mothersmilk/norights.php');
    exit(); 
  }

?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" media="all" href="/mothersmilk/css/main.css" />
 <title>Daily Search Results</title>
<link rel="icon" 
      type="image/ico" 
      href="/mothersmilk/images/favicon.ico" />
</head>
<body>
<div id="pageContent">
<div id="header">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/HeaderHTML.php"); ?>
</div>
<div id="menu"></div>
<div id="messagebar">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/MessageBar.php"); ?>
</div>
<div id="content">
<?php include '../mystyle.php'; ?>


<h1 class="pageTitle">Daily Search Results</h1>
<P>

<P><FONT SIZE=4><B>Click on link to process package</B></FONT></P>
<?php


$urights = $_SESSION['urights'];

$determinechoose = $_POST["determinechoose"];


/*  Connect to Data Base */

$con = mysqli_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD, DB_DATABASE_NAME);

$sql = "SELECT screenertable.donornumber, screenertable.firstname, screenertable.lastname, screenertable.organization, screenertable.determinechoose from screenertable  inner join receivertable on screenertable.donornumber = receivertable.donornumberr where screenertable.determinechoose = '$determinechoose' and screenertable.processflag = 'Y' group by screenertable.donornumber"; 

$result = mysqli_query($con,$sql); 
if (!$result) 
  {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysqli_error($con);
    exit;
  }


echo "<TABLE id='results'>\n";
echo "		<TR class='resultHeader'>\n";
echo "			<TD>Donor Number</TD>\n";
echo "			<TD>First Name</TD>\n";
echo "			<TD>Last Name</TD>\n";
echo "			<TD>Type</TD>\n";
echo "			<TD>Status</TD>\n";
echo "		</TR>\n";


$cellclass="resultRow";
while ($row = mysqli_fetch_assoc($result)) 
   {
       $donornum=$row['donornumber'];
       $fname=$row['firstname'];
       $lname=$row['lastname'];
       $organization=$row['organization'];
       $determinechoose=$row['determinechoose'];


       echo "<TR class='" . $cellclass ."' >\n";
       echo "<TD><a href=\"./dailypackagesearch.php?dnum=$donornum&determinechoose=$determinechoose\"> $donornum</a></FONT></TD>\n";
       echo "<TD>$fname</TD>\n";
       echo "<TD>$lname</TD>\n";
       echo "<TD>$organization</TD>\n";
       echo "<TD>$determinechoose</TD>\n";
       echo "</TR>\n";
   
       $rec = 1;   /* triggers when records are found  */
       $cellclass = (( $cellclass == "resultRow" ) ? "resultAltRow" : "resultRow");
   }


if (!$rec) 
   {
       echo "<TR><TD colspan=\"5\"></TD></TR>\n";
       echo "<TR>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "<TD>No Packages Found</TD>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "<TD>&nbsp;</TD>\n";
       echo "</TR>\n";
       echo "<TR><TD colspan=\"5\"></TD></TR>\n";
    }


echo "</TABLE>\n";

mysqli_free_result($result); 

mysqli_close($con);

?>

<P><a href="./dailysearch.php">Daily Search</a>&nbsp;

<a href="./receivingmenu.php">Receiving Menu</a></P>
</br>


</div>
<div id="footer">
<?php include($_SERVER['DOCUMENT_ROOT'] ."/mothersmilk/include/FooterHTML.php"); ?>
</div>
</div>
</body>
</html>
