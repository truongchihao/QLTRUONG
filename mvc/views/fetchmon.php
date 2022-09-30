<?php
include('db.php');
$rowcount = $data["rowcount"];
$query = '';
$output = array();
$query .= "SELECT * FROM MON_HOC ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE ( IDMON LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR TEN_MON LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR TEN_KHOI LIKE "%'.$_POST["search"]["value"].'%" )';
}
/*
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY IDMON DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}*/

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["IDMON"];
 $sub_array[] = $row["TEN_MON"];
 $sub_array[] = '<a href="http://localhost/quanly/NQL/GV/'.$row['IDMON'].'" title="Xem chi tiết" data-toggle="tooltip" class="m-3"><span class="glyphicon glyphicon-eye-open"></span></a>';
 $data[] = $sub_array;
}
$output = array(
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => $filtered_rows,
 "data"    => $data
);
echo json_encode($output);
?>