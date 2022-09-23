<?php
if(isset($data["updategv"])){
    $row = $data["updategv"];
    if($row=="loi")
    {
        echo 
           '<script>
                window.alert("Lỗi không có IDGV cần chỉnh sửa");
           </script>';
    }
}
?>
<div class="container">
    <div class="mx-auto mt-5 mb-5 btn-info" style="width:500px;">
        <div class="page-header m-5">
            <h1>Chỉnh sửa</h1>
        </div>
        <form id="formDemo" name="formDemo" action="http://localhost/live/QLGV/UpdateGV" method="post" style="height: 530px;">
                    <div class="form-group m-5">
                        <label>Tên giáo viên:</label>
                        <input type="text" name="fullname" class="form-control" 
                        <?php
                            if($row!="loi"){
                              echo 'value="';
                              echo $row["FULL_NAME"];
                              echo '"';
                            }
                        ?>>
                    </div>
                    <div class="form-group m-5">
                        <label>Ngày sinh:</label>
                        <input type="text" name="birthday" id="birthday" class="form-control"
                        <?php
                            if($row!="loi"){
                              echo 'value="';
                              echo $row["BIRTHDAY"];
                              echo '"';
                            }
                        ?>>
                    </div>
                    <div class="form-group m-5">
                        <label>EMAIL:</label>
                        <input type="text" name="email" class="form-control"
                        <?php
                            if($row!="loi"){
                              echo 'value="';
                              echo $row["EMAIL"];
                              echo '"';
                            }
                        ?>>
                    </div>
                    <div class="form-group m-5">
                        <label>Chuyên môn:</label>
                        <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="chuyenmon">
                        <?php
                            if($row=="loi"){
                                echo '
                                <option selected>Không có</option>
                                ';}
                            else{
                                while ($monhoc = mysqli_fetch_array($data["monhoc"])) {
                                    if($row['TEN_MON']==$monhoc['TEN_MON']){
                                        echo '
                                        <option selected value="'.$monhoc['IDMON'].'">'.$monhoc['TEN_MON'].'</option>
                                        ';}
                                    else{
                                        echo '
                                        <option value="'.$monhoc['IDMON'].'">'.$monhoc['TEN_MON'].'</option>
                                        ';}
                                }
                                }
                        ?>
                        </select>
                    </div>
                    <div class="form-group m-5">
                        <label>Chức vụ:</label>
                        <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="chucvu">
                        <?php
                            if($row=="loi"){
                                echo '
                                <option selected>Không có</option>
                                ';}
                            else{
                                if($row['CHUC_VU']=="GIÁO VIÊN"){
                                    echo '
                                    <option selected value="GIÁO VIÊN">Giáo viên</option>
                                    <option value="TỔ TRƯỞNG CHUYÊN MÔN">Tổ trưởng chuyên môn</option>
                                    ';}
                                else{
                                    echo '
                                    <option value="GIÁO VIÊN">Giáo viên</option>
                                    <option selected value="TỔ TRƯỞNG CHUYÊN MÔN">Tổ trưởng chuyên môn</option>
                                    ';}
                                }
                        ?>
                        </select>
                    </div>
                    <div class="form-inline m-5">
                    <input type="hidden" name="idgv" value="<?php echo $row["IDGV"];?>">
                    <input type="hidden" name="idtruong" value="<?php echo $_SESSION["idtruong"];?>">
                    <button type="submit" id="submit1" class="btn btn-lg btn-success" name="save">Xác nhận</button>
                    <a href="http://localhost/live/NQL/GV/<?php echo $row["IDMON"];?>" class="btn btn-lg btn-danger">Hủy</a>
                    </div>
                    
                </from>
                <?php 
                if(isset($data["result"])){
                  ?>
                    <?php
                    if($data["result"] == "true"){
                      echo 
                    '<script>
                    window.alert("Cập nhật thông tin giáo viên thành công");
                    </script>';
                    }else{
                    echo '<script>
                    window.alert("Cập nhật thông tin giáo viên thất bại");
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
<!-- Liên kết CSS JQuery UI -->
<link href="/live/public/jquery-ui/jquery-ui.min.css" type="text/css" rel="stylesheet" />
<script src="/live/public/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="/live/public/js/jquery.validate.min.js"></script>
<script type="text/javascript">
  // Yêu cầu JQUERY UI thay thế INPUT text có id="txtNgayThangNamSinh" thành công cụ chọn ngày tháng Date Picker
  $('#birthday').datepicker(
      {
        showButtonPanel: true,    // option hiển thị nút "Today", "Done"
        dateFormat: 'yy-mm-dd'    // option Định dạng format ngày tháng; d: Day Ngày; m: Month tháng; y: Year năm
      }
    );
        $(document).ready(function() {

          $.validator.addMethod('custom', function (value, element) {

               let regExName = /^[A-Za-z\D]+$/;
               return (regExName.test(value));

               }, 'There are non alphabetic characters!');


          //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
          $("#formDemo").validate({
            rules: {
              fullname: {
                required: true,
                maxlength: 50,
                custom: true
                },
              birthday: {
                required: true,
                minlength: 10,
                maxlength: 10,             
                date: true
              },
              email: {
                required: true,
                email: true
              },
            },
            messages: {
              fullname: {
                required: "Vui lòng nhập tên giáo viên",
                maxlength: "Độ dài tối đa 50 kí tự",
                custom: "Vui lòng không nhập số"
                },
              birthday: {
                required: "Vui lòng nhập ngày sinh",
                minlength: "Độ dài tối thiểu 10 kí tự",
                maxlength: "Độ tài tối đa 10 kí tự",
                date: "Dạng date yyyy/mm/dd"
              },
              email: {
                required: "Vui lòng nhập email",
                email: "Dạng email abc@abc"
              },
            }
          });
        });
</script>
