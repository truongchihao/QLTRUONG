<div class="container">
  <div class="mx-auto mt-5 mb-5 btn-info" style="width:500px;">
    <div class="page-header">
      <h1 class="">Form cấp quyền</h1>
    </div>
      <form class="form-horizontal" action="http://localhost/quanly/CQGVHS/CAPTK" id="formDemo" name="formDemo" method="post" style="height: 500px;">
        <div class="m-5"> 
          <p>Loại tài khoản:</p>       
          <div class="radio">
            <label class="radio-inline"><input type="radio" name="optradio" id="radio" value="HS" checked> HS+MSHS</label>
            <label class="radio-inline"><input type="radio" name="optradio" id="radio" value="GV"> GV+MSGV</label>
          </div>
        </div>
        <div class="m-5">
            <label>Nhập mã số bắt đầu:</label>        
            <input type="text" class="form-control" name="maso" id="maso" placeholder="Enter ma so" required>
        </div>
        <div class="m-5">
            <label>Nhập số lượng:</label>          
            <input type="text" class="form-control" name="soluong" id ="soluong" placeholder="Enter so luong" required>
        </div>
        <div class="m-5">
            <label>Nhập mật khẩu:</label>         
            <input type="password" class="form-control" id ="password" name="password" placeholder="Enter password" required>
        </div>
        <div class="m-5">
        <input type="hidden" name="idnql" value="<?php echo $_SESSION["ttnql"]["IDNQL"];?>">
        <button type="submit" id="submit1" class="btn btn-lg btn-success m-3" name="save">Xác nhận</button>
        <a href="http://localhost/quanly/NQL/CQ" class="btn btn-lg btn-secondary m-3">BACK</a>
        </div>
        
     </form>
     <?php if( isset($data["result"]) ) { ?>

       <?php
       if($data["result"] == "true"){
         echo 
        '<script>
        window.alert("Tự động tạo tài khoản thành công");
        </script>';
       }else{
        echo '<script>
        window.alert("Tự động tạo tài khoản thất bại");
        </script>';
       }
       ?>
<?php } ?>
      
  
  </div>
</div>
<style>
        .error
            {
            color: red;
            }
</style>
<script type="text/javascript" src="/live/public/js/jquery.validate.min.js"></script> 
<script type="text/javascript">
        $(document).ready(function() {
          //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
          $("#formDemo").validate({
            rules: {
              maso: {
                required: true,
                number: true,
                minlength: 6,
                maxlength: 6,
                min: 100000
              },
              soluong: {
                required: true,
                number: true,
                maxlength: 6,
                min: 1
              },
              password: {
                required: true,
                minlength: 6,
                maxlength: 15
              },
            },
            messages: {
              maso: {
                required: "Vui lòng nhập mã số bắt đầu!",
                number: "Vui lòng nhập số",
                minlength: "Độ dài tối thiểu 6 chữ số",
                maxlength: "Độ dài tối đa 6 chữ số",
                min: "Nhỏ nhất là 100000"
              },
              
              soluong: {
                required: "Vui lòng nhập vào số lượng",
                number: "Vui lòng nhập số",
                maxlength: "Độ tài tối đa 6 chữ số",
                min: "Nhỏ nhất là 1"
              },
              password: {
                required: "Vui lòng nhập mật khẩu!",
                minlength: "Độ dài tối thiểu 6 kí tự",
                maxlength: "Độ tài tối đa 15 kí tự"
              },
            }
          });
        });
</script>
