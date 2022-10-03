<?php
include('db.php');
$rowcount=$data["rowcount"];
$idlop=$data["idlop"];
$query = '';
$output = array();
$query .= "SELECT * FROM HOC_SINH WHERE IDLOP = '$idlop' ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'AND ( IDHS LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR MA_HS LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR FULL_NAME LIKE "%'.$_POST["search"]["value"].'%" )';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY IDHS DESC ';
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
 $sub_array[] = $row["IDHS"];
 $sub_array[] = $row["MA_HS"];
 $sub_array[] = $row["FULL_NAME"];
 $sub_array[] = '<a href="http://localhost/quanly/QLHS/read/'.$row['IDHS'].'" title="Xem chi tiết" data-toggle="tooltip" class="m-3"><span class="glyphicon glyphicon-eye-open"></span></a>
                 <a href="http://localhost/quanly/QLHS/update/'.$row['IDHS'].'" title="Chỉnh sửa" data-toggle="tooltip" class="m-3"><span class="glyphicon glyphicon-pencil"></span></a>
                 <a href="http://localhost/quanly/QLHS/delete/'.$row['IDHS'].'" title="Xóa" data-toggle="tooltip" class="m-3"><span class="glyphicon glyphicon-trash"></span></a>';
 $data[] = $sub_array;
}
$output = array(
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => $rowcount,
 "data"    => $data
);
echo json_encode($output);
?>