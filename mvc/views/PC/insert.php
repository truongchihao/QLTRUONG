<div class="container">
    <div class="mx-auto mt-5 mb-5 btn-info" style="width:500px;">
        <div class="page-header m-5">
            <h1>Phân công giáo viên</h1>
        </div>
        <form id="formDemo" name="formDemo" action="http://localhost/quanly/QLPC/InsertPC" method="post" style="height: auto;">
                    <div class="form-group m-5">
                        <label>Nhập ID giáo viên</label>
                        <input type="text" name="idgv" class="form-control" id="idgv">
                        <div id="messageidgv" class="error"></div>
                    </div>
                    <div class="form-group m-5">
                        <label>Nhập mã giáo viên cần tìm:</label>
                        <input type="text" name="magv" class="form-control" id="magv">
                        <div id="messagemagv" class="error"></div>
                    </div>
                    <div class="form-group m-5">
                        <label>Nhập tên giáo viên cần tìm:</label>
                        <input type="text" name="tengv" class="form-control" id="tengv">
                        <div id="messagetengv" class="error"></div>
                    </div>
                    <div class="form-group m-5">
                        <label>Dạy lớp:</label>
                        <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="idlop">
                        <?php
                            if($row=="loi"){
                                echo '
                                <option selected>Không có</option>
                                ';}
                            else{
                                while ($lop = mysqli_fetch_array($data["lop"])) {
                                    if($row['TEN_LOP']==$lop['TEN_LOP']){
                                        echo '
                                        <option selected value="'.$lop['IDLOP'].'">'.$lop['TEN_LOP'].'</option>
                                        ';}
                                    else{
                                        echo '
                                        <option value="'.$lop['IDLOP'].'">'.$lop['TEN_LOP'].'</option>
                                        ';}
                                }
                                }
                        ?>
                        </select>
                    </div>
                    <div class="m-5">
                    <button type="submit" id="submit1" class="btn btn-lg btn-success" name="save">Xác nhận</button>
                    <a href="http://localhost/quanly/NQL/PC" class="btn btn-lg btn-danger">Hủy</a>
                    </div>
                    
                </from>
                <?php 
                if(isset($data["result"])){
                  ?>
                    <?php
                    if($data["result"] == "true"){
                      echo 
                    '<script>
                    window.alert("Phân công giáo viên thành công");
                    </script>';
                    }else{
                    echo '<script>
                    window.alert("Phân công giáo viên thất bại");
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
<script type="text/javascript" src="/quanly/public/js/jquery.validate.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
        $("#idgv").keyup(function(){
            var gvid = $(this).val();

            $.post("http://localhost/quanly/Ajax/CheckIDGV", {idgv:gvid}, function(data){
               $("#messageidgv").html(data);
            });
          });

          $("#magv").keyup(function(){
            var gvma = $(this).val();

            $.post("http://localhost/quanly/Ajax/CheckMAGV", {magv:gvma}, function(data){
                $("#messagemagv").html(data);
            });
          });

          $("#tengv").keyup(function(){
            var gvten = $(this).val();

            $.post("http://localhost/quanly/Ajax/CheckTENGV", {tengv:gvten}, function(data){
               $("#messagetengv").html(data);
            });
          });

          //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
          $("#formDemo").validate({
            rules: {
              idgv: {
                required: true,
                number: true,
                maxlength: 10,
                min: 1
              },
            },
            messages: {
              idgv: {
                required: "Vui lòng nhập idgv",
                number: "Vui lòng nhập dạng số",
                maxlength: "Độ tài tối đa 10 kí tự",
                min: "Giá trị nhỏ nhất là 1"
              },
            }
          });
        });
</script>
