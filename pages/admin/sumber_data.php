<?php
 require_once('../../fungsi/fungsi.php');
  konek_db();
$term = trim(strip_tags($_GET['term']));
 
$qstring = "SELECT KD_RMAKAN, NM_RMAKAN FROM MD_RMAKAN WHERE NM_RMAKAN LIKE '".$term."%'";

$result = mysql_query($qstring);
 
while ($row = mysql_fetch_array($result))
{
    $row['value']=htmlentities(stripslashes($row['NM_RMAKAN']));
    $row['id']=(int)$row['KD_RMAKAN'];

    $row_set[] = $row;
}

echo json_encode($row_set);
?>