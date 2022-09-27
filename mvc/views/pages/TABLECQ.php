<div class="container box">
  <h1 class="text-center">LỊCH SỬ CẤP QUYỀN</h1>
  <br />
  <div class="table-responsive">
  <br />
  <br />
  <br />
  <form action="http://localhost/quanly/NQL/CQ" method="post">
    <button type="submit" id="submit1" class="btn btn-lg btn-success m-3" name="save">Xem lịch sử cấp quyền</button>
  </form>
  <table id="user_data" class="table table-bordered table-striped">
    <thead>
    <tr>
    <th class="text-center">STT</th>
      <th class="text-center">Loại tài khoản</th>
      <th class="text-center">Mã bắt đầu</th>
      <th class="text-center">Số lượng</th>
      <th class="text-center">Mật khẩu</th>
    </tr>
    </thead>
    <tbody class="text-center">
<?php
if(isset($data["LS"])){
  $i=0;
  while ($row = mysqli_fetch_array($data["LS"])) {
    $i++;
    echo '<tr>
              <td>'.$i.'</td>
              <td>'.$row['LOAI_TK'].'</td>
              <td>'.$row['MA_BD'].'</td>
              <td>'.$row['SO_LUONG'].'</td>
              <td>'.$row['MK'].'</td>
          </tr>';
  }
}
  
?>
    </tbody>
  </table>
</div>
<div class="row">
  <div class="col-sm-5">
  
  </div>
  <div class="col-sm-7">
      <a href="http://localhost/quanly/CQGVHS/formCQ" class="btn btn-lg btn-success">Cấp quyền tài khoản</a>
  </div>
</div>
