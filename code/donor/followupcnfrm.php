<?php 
echo "<h2 class=\"sectionTitle\"> Follow up </h2>";

$donorpacketbymail = "";
$donorpacketbyemail = "";
$donorpacketbyfax = "";
//Handle checkbox
if (IsChecked('donorpacketby','mail'))
{
	$donorpacketbymail = 'on';
}
if (IsChecked('donorpacketby','email'))
{
	$donorpacketbyemail = 'on';
}
if (IsChecked('donorpacketby','fax'))
{
	$donorpacketbyfax = 'on';
}
$followup_data = array (
			'donorpacketbymail'   => $donorpacketbymail,
			'donorpacketbyemail'   => $donorpacketbyemail,
			'donorpacketbyfax'   => $donorpacketbyfax,
			'datesentpacket'   => $_POST['datesentpacket'],
			'staffinitdatesentpacket' => $_POST['staffinitdatesentpacket'],
			'datereceivedpacket'  => $_POST['datereceivedpacket'],
			'staffinitdatereceivedpacket'      => $_POST['staffinitdatereceivedpacket'],

			'pedifaxneeded'   => $_POST['pedifaxneeded'],
			'datesentpedi'   => $_POST['datesentpedi'],
			'staffinitdatesentpedi' => $_POST['staffinitdatesentpedi'],
			'datereceivedpedi'  => $_POST['datereceivedpedi'],
			'staffinitdatereceivedpedi'      => $_POST['staffinitdatereceivedpedi'],
			
			'obfaxneeded'   => $_POST['obfaxneeded'],
			'datesentob'   => $_POST['datesentob'],
			'staffinitdatesentob' => $_POST['staffinitdatesentob'],
			'datereceivedob'  => $_POST['datereceivedob'],
			'staffinitdatereceivedob'      => $_POST['staffinitdatereceivedob'],
			
			'other'   => $_POST['other'],
			'datesentother'   => $_POST['datesentother'],
			'staffinitdatesentother' => $_POST['staffinitdatesentother'],
			'datereceivedother'  => $_POST['datereceivedother'],
			'staffinitdatereceivedother'      => $_POST['staffinitdatereceivedother'],
			
			'datepacketreview'   => $_POST['datepacketreview'],
			'packetreviewstatus'   => $_POST['packetreviewstatus'],
			'staffinitpacketreview' => $_POST['staffinitpacketreview'],
		);
		
echo "<div class=\"sectioncolumn twoColumnSection\">";
echo "<label>Donor Packet:</label>"; 
if ($followup_data['donorpacketbymail'] == '' && $followup_data['donorpacketbyemail'] == '' && $followup_data['donorpacketbyfax'] == '')
{
	echo "<span>N/A</span>";
}
else
{
	if ($followup_data['donorpacketbymail'] != '')
	{
		echo " <span>mail</span>";
	}
	if ($followup_data['donorpacketbyemail'] != '')
	{
		echo " <span>email</span>";
	}
	if ($followup_data['donorpacketbyfax'] != '')
	{
		echo " <span>fax</span>";
	}
}
if ($followup_data['donorpacketbyfax'] != '' || $followup_data['donorpacketbymail'] != '' || $followup_data['donorpacketbyemail'] != '')
{
if ($followup_data['datesentpacket'] != '')
{
echo "<br><label>Date sent:</label> <span>" . $followup_data['datesentpacket'] . "</span>";
}
if ($followup_data['staffinitdatesentpacket'] != '')
{
echo "<br><label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentpacket'].  "</span>";
}
if ($followup_data['datereceivedpacket'] != '')
{
echo "<br><label>Date received:</label> <span>" . $followup_data['datereceivedpacket'] . "</span>";
}
if ($followup_data['staffinitdatereceivedpacket'] != '')
{
echo "<br><label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedpacket'] . "</span>" ;
}
}
echo "</div>";

echo "<div class=\"sectioncolumn twoColumnSection\">";
echo "<label>Pediatrician fax needed:</label> <span>".$followup_data['pedifaxneeded']. "</span>";
if ($followup_data['pedifaxneeded'] != 'N/A')
{
if ($followup_data['datesentpedi'] != '')
{
echo "<br><label>Date sent:</label> <span>" . $followup_data['datesentpedi'] . "</span>";
}
if ($followup_data['staffinitdatesentpedi'] != '')
{
echo "<br><label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentpedi'].  "</span>";
}
if ($followup_data['datereceivedpedi'] != '')
{
echo "<br><label>Date received:</label> <span>" . $followup_data['datereceivedpedi'] . "</span>";
}
if ($followup_data['staffinitdatereceivedpedi'] != '')
{
echo "<br><label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedpedi'] . "</span>" ;
}
}
echo "</div>";

echo "<br class=\"clear\">";

echo "<div class=\"sectioncolumn twoColumnSection\">";
echo "<label>Obstetrician fax needed:</label> <span>".$followup_data['obfaxneeded']. "</span>";
if ($followup_data['obfaxneeded'] != 'N/A')
{
if ($followup_data['datesentob'] != '')
{
echo "<br><label>Date sent:</label> <span>" . $followup_data['datesentob'] . "</span>";
}
if ($followup_data['staffinitdatesentob'] != '')
{
echo "<br><label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentob'].  "</span>";
}
if ($followup_data['datereceivedob'] != '')
{
echo "<br><label>Date received:</label> <span>" . $followup_data['datereceivedob'] . "</span>";
}
if ($followup_data['staffinitdatereceivedob'] != '')
{
echo "<br><label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedob'] . "</span>" ;
}
}
echo "</div>";




if ($followup_data['other'] != '')
{
echo "<div class=\"sectioncolumn twoColumnSection\">";
echo "<label>Other:</label> <span>".$followup_data['other']. "</span>";
if ($followup_data['datesentother'] != '')
{
echo "<br><label>Date sent:</label> <span>" . $followup_data['datesentother'] . "</span>";
}
if ($followup_data['staffinitdatesentother'] != '')
{
echo "<br><label>Staff Init:</label> <span>" . $followup_data['staffinitdatesentother'].  "</span>";
}
if ($followup_data['datereceivedother'] != '')
{
echo "<br><label>Date received:</label> <span>" . $followup_data['datereceivedother'] . "</span>";
}
if ($followup_data['staffinitdatereceivedother'] != '')
{
echo "<br><label>Staff Init:</label> <span>" . $followup_data['staffinitdatereceivedother'] . "</span>" ;
}
echo "</div>";
}


if ($followup_data['datepacketreview'] != '' || $followup_data['packetreviewstatus'] != '' ||$followup_data['staffinitpacketreview'] != '' )
{
echo "<div class=\"section\">";
echo "<label>Packet Review:</label>";
if ($followup_data['datepacketreview'] != '')
{
echo "<br><label>Date:</label> <span>" . $followup_data['datepacketreview'] . "</span>";
}
if ($followup_data['packetreviewstatus'] != '')
{
echo "<br><label>Status:</label> <span>" . $followup_data['packetreviewstatus'] . "</span>";
}
if ($followup_data['staffinitpacketreview'] != '')
{
echo "<br><label>Staff Init:</label> <span>" . $followup_data['staffinitpacketreview'].  "</span>";
}
echo "</div>";

}


?>

