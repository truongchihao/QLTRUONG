<?php
include('db.php');
$rowcount=$data["rowcount"];
$idtruong=$data["idtruong"];
$query = '';
$output = array();
$query .= "SELECT l.IDLOP, l.TEN_LOP, l.SO_LUONG, k.TEN_KHOI
FROM lop as l, khoi as k, truong_hoc as tr WHERE l.IDKHOI = k.IDKHOI AND tr.IDTRUONG=k.IDTRUONG AND tr.IDTRUONG='$idtruong' ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'AND ( IDLOP LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR TEN_LOP LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR SO_LUONG LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR TEN_KHOI LIKE "%'.$_POST["search"]["value"].'%" )';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY IDLOP DESC ';
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
 $sub_array[] = $row["IDLOP"];
 $sub_array[] = $row["TEN_LOP"];
 $sub_array[] = $row["SO_LUONG"];
 $sub_array[] = $row["TEN_KHOI"];
 $sub_array[] = '<a href="http://localhost/live/NQL/HS/'.$row['IDLOP'].'" title="Xem chi tiết" data-toggle="tooltip" class="m-3"><span class="glyphicon glyphicon-eye-open"></span></a>
                 <a href="http://localhost/live/QLLOP/update/'.$row['IDLOP'].'" title="Chỉnh sửa" data-toggle="tooltip" class="m-3"><span class="glyphicon glyphicon-pencil"></span></a>
                 <a href="http://localhost/live/QLLOP/delete/'.$row['IDLOP'].'" title="Xóa" data-toggle="tooltip" class="m-3"><span class="glyphicon glyphicon-trash"></span></a>';
 $data[] = $sub_array;
}
$output = array(
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => $rowcount,
 "data"    => $data
);
echo json_encode($output);
?>