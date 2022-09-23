<div class="container">
    <div class="mx-auto mt-5 mb-5 btn-info" style="width:500px;">
        <div class="page-header m-5">
            <h1>Thêm lớp học</h1>
        </div>
        <form id="formDemo" name="formDemo" action="http://localhost/live/QLLOP/InsertLOP" method="post" style="height: 380px;">
                    <div class="form-group m-5">
                        <label>Tên lớp học:</label>
                        <input type="text" name="tenlop" class="form-control" id="tenlop">
                        <div id="messagetenlop" class="error"></div>
                    </div>
                    <div class="form-group m-5">
                        <label>Số lượng:</label>
                        <input type="text" name="soluong" class="form-control">
                    </div>
                    <div class="form-group m-5">
                        <label>Chọn khối:</label>
                        <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="idkhoi">
                        <?php
                            if($row=="loi"){
                                echo '
                                <option selected>Không có</option>
                                ';}
                            else{
                                while ($khoi = mysqli_fetch_array($data["khoi"])) {
                                    if($row['TEN_KHOI']==$khoi['TEN_KHOI']){
                                        echo '
                                        <option selected value="'.$khoi['IDKHOI'].'">'.$khoi['TEN_KHOI'].'</option>
                                        ';}
                                    else{
                                        echo '
                                        <option value="'.$khoi['IDKHOI'].'">'.$khoi['TEN_KHOI'].'</option>
                                        ';}
                                }
                                }
                        ?>
                        </select>
                    </div>
                    <div class="form-inline m-5">
                    <input type="hidden" name="idtruong" value="<?php echo $_SESSION["idtruong"];?>">
                    <button type="submit" id="submit1" class="btn btn-lg btn-success" name="save">Xác nhận</button>
                    <a href="http://localhost/live/NQL/LOP" class="btn btn-lg btn-danger">Hủy</a>
                    </div>
                    
                </from>
                <?php 
                if(isset($data["result"])){
                  ?>
                    <?php
                    if($data["result"] == "true"){
                      echo 
                    '<script>
                    window.alert("Thêm lớp thành công");
                    </script>';
                    }else{
                    echo '<script>
                    window.alert("Thêm lớp thất bại");
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
        $("#tenlop").keyup(function(){
            var lop = $(this).val();

            $.post("http://localhost/live/Ajax/CheckTENLOP", {tenlop:lop}, function(data){
               $("#messagetenlop").html(data);
            });
          });
          //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
          $("#formDemo").validate({
            rules: {
              tenlop: {
                required: true,
                maxlength: 10
                },
              soluong: {
                required: true,
                number: true,
                maxlength: 2,
                min: 1
              },
            },
            messages: {
              tenlop: {
                required: "Vui lòng nhập tên lớp",
                maxlength: "Độ dài tối đa 10 kí tự"
                },
              soluong: {
                required: "Vui lòng nhập số lượng học sinh",
                number: "Vui lòng nhập dạng số",
                maxlength: "Độ tài tối đa 2 số",
                min: "Giá trị nhỏ nhất là 1"
              },
            }
          });
        });
</script>
