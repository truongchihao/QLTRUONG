<div class="container box">
  <h1 class="text-center">Danh sách lớp được phân công</h1>
  <br />
  <div class="table-responsive">
  <br />
  <br />
  <br />
  <table id="user_data" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">STT</th>
        <th class="text-center">TÊN LỚP</th>
        <th class="text-center">CHỨC NĂNG</th>
    </tr>
    </thead>
    <tbody class="text-center">
<?php
if(isset($data["GVLOP"])){
  $i=0;
  while ($row = mysqli_fetch_array($data["GVLOP"])) {
    if($row["IDGV"] == $_SESSION["ttgv"]["IDGV"])
    {
    $i++;
    echo '<tr>
              <td>'.$i.'</td>
              <td>'.$row['TEN_LOP'].'</td>
              <td><a href="http://localhost/quanly/GV/LOPDAY/'.$row["IDGV"].'/'.$row['IDLOP'].'" title="Xem chi tiết" data-toggle="tooltip" class="m-3"><span class="glyphicon glyphicon-eye-open"></span></a></td>
          </tr>';
    }
    else
    {
      header("location: http://localhost/quanly/Home/Login");
    }
  }
}
  
?>
    </tbody>
  </table>
</div>