<?php
include('db.php');
$rowcount=$data["rowcount"];
$query = '';
$output = array();
$query .= "SELECT *
FROM lop as l, phan_cong as pc, giao_vien as gv, mon_hoc as mh
WHERE l.IDLOP = pc.IDLOP AND pc.IDGV = gv.IDGV AND gv.IDMON = mh.IDMON ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'AND ( IDPC LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR FULL_NAME LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR TEN_MON LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR TEN_LOP LIKE "%'.$_POST["search"]["value"].'%" ) ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY IDPC DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["IDPC"];
 $sub_array[] = $row["FULL_NAME"];
 $sub_array[] = $row["TEN_MON"];
 $sub_array[] = $row["TEN_LOP"];
 $data[] = $sub_array;
}
$output = array(
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => $rowcount,
 "data"    => $data
);
echo json_encode($output);
?>