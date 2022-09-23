<?php
if(isset($data["data"])){
    $row = $data["data"];
    if($row=="khongco")
    {
        echo 
           '<script>
                window.alert("Không đúng tài khoản và mật khẩu");
           </script>';
    }
}
?>
<div style="min-height: 150px;">

</div>
<div class="container">
  <div class="mx-auto mt-5 mb-5 btn-info" style="width:500px;">
    <div class="page-header">
      <h1 class="">ĐĂNG NHẬP</h1>
    </div>
      <form class="form-horizontal" action="http://localhost/quanly/LOGIN/TK" id="formDemo" name="formDemo" method="post" style="height: 300px;">
        
        <div class="m-5">
            <label>Nhập tài khoản:</label>        
            <input type="text" class="form-control" name="username" placeholder="Enter username" required>
        </div>
        <div class="m-5">
            <label>Nhập mật khẩu:</label>         
            <input type="password" class="form-control" id ="password" name="password" placeholder="Enter password" required>
        </div>
        <div class="m-5">
        <button type="submit" id="submit1" class="btn btn-lg btn-success m-3" name="save">Xác nhận</button>
        </div>
        
     </form>
  </div>
</div>
<style>
        .error
            {
            color: red;
            }
</style>
<script type="text/javascript" src="/quanly/public/js/jquery.validate.min.js"></script> 
<script type="text/javascript">
        $(document).ready(function() {
          //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
          $("#formDemo").validate({
            rules: {
              username: {
                required: true
              },
              password: {
                required: true
              },
            },
            messages: {
              username: {
                required: "Vui lòng nhập tài khoản!"
              },
              
              password: {
                required: "Vui lòng nhập mật khẩu!"
              },
            }
          });
        });
</script>
