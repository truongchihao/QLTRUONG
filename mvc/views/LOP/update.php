<?php
if(isset($data["updatelop"])){
    $row = $data["updatelop"];
    if($row=="loi")
    {
        echo 
           '<script>
                window.alert("Lỗi không có IDLOP cần chỉnh sửa");
           </script>';
    }
}
?>
<div class="container">
    <div class="mx-auto mt-5 mb-5 btn-info" style="width:500px;">
        <div class="page-header m-5">
            <h1>Chỉnh sửa</h1>
        </div>
        <form id="formDemo" name="formDemo" action="http://localhost/live/QLLOP/UpdateLOP" method="post" style="height: 380px;">
                    <div class="form-group m-5">
                        <label>Tên lớp học:</label>
                        <input id="tenlop" type="text" name="tenlop" class="form-control"
                        <?php
                            if($row!="loi"){
                              echo 'value="';
                              echo $row["TEN_LOP"];
                              echo '"';
                            }
                        ?>>
                        <div id="messagetenlop" class="error"></div>
                    </div>
                    <div class="form-group m-5">
                        <label>Số lượng:</label>
                        <input type="text" name="soluong" class="form-control"
                        <?php
                            if($row!="loi"){
                              echo 'value="';
                              echo $row["SO_LUONG"];
                              echo '"';
                            }
                        ?>>
                    </div>
                    <div class="form-group m-5">
                        <label>Thuộc khối:</label>
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
                    <input type="hidden" name="idlop" value="<?php echo $row["IDLOP"];?>">
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
                    window.alert("Cập nhật thông tin lớp thành công");
                    </script>';
                    }else{
                    echo '<script>
                    window.alert("Cập nhật thông tin lớp thất bại");
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
                minlength: 1,
                maxlength: 2,
                min: 1
              },
            },
            messages: {
              tenlop: {
                required: "Vui lòng nhập tên lớp",
                maxlength: "Độ dài tối đa 10 chữ số"
                },
              soluong: {
                required: "Vui lòng nhập số lượng học sinh",
                number: "Vui lòng nhập dạng số",
                minlength: "Độ dài tối thiểu 1 kí tự",
                maxlength: "Độ tài tối đa 2 kí tự",
                min: "Giá trị nhỏ nhất là 1"
              },
            }
          });
        });
</script>
