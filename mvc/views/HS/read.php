<?php
if(isset($data["readhs"])){
    $row = $data["readhs"];
    if($row=="loi")
    {
        echo 
           '<script>
                window.alert("Lỗi không có IDHS cần xem");
           </script>';
    }
}
?>
<div class="container">
    <div class="mx-auto mt-5 mb-5 btn-info" style="width:500px;">
        <div class="page-header m-5">
            <h1>Xem chi tiết</h1>
        </div>
        <div class="form-inline m-3">
            <label>Mã học sinh:</label>
            <p class="form-control-static">
                <?php
                if($row=="loi"){ 
                    echo 'Không có';}
                else{
                    echo $row["MA_HS"];}
                ?>
            </p>
        </div>
        <div class="form-inline m-3">
            <label>Tên học sinh:</label>
            <p class="form-control-static">
                <?php
                if($row=="loi"){ 
                    echo 'Không có';}
                else{
                    echo $row["FULL_NAME"];}
                ?>
            </p>
        </div>
        <div class="form-inline m-3">
            <label>Học lớp:</label>
            <p class="form-control-static">
                <?php

                if($row=="loi"){ 
                    echo 'Không có';}
                else{
                    echo $row["TEN_LOP"];}
                ?>
            </p>
        </div>
        <div class="form-inline m-3">
            <label>Ngày sinh:</label>
            <p class="form-control-static">
                <?php

                if($row=="loi"){ 
                    echo 'Không có';}
                else{
                    echo $row["BIRTHDAY"];}
                ?>
            </p>
        </div>
        <div class="form-inline m-3">
            <label>Email:</label>
            <p class="form-control-static">
                <?php

                if($row=="loi"){ 
                    echo 'Không có';}
                else{
                    echo $row["EMAIL"];}
                ?>
            </p>
        </div>
        <p><a href="http://localhost/quanly/NQL/HS/<?php echo $row["IDLOP"];?>" class="btn btn-primary m-3">BACK</a></p>
    </div>
</div>