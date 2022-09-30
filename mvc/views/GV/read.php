<?php
if(isset($data["readgv"])){
    $row = $data["readgv"];
    if($row=="loi1")
    {
        echo 
           '<script>
                window.alert("Lỗi không có IDGV cần xem 1");
           </script>';
    }
    if($row=="loi2")
    {
        echo 
           '<script>
                window.alert("Lỗi không có IDGV cần xem 2");
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
            <label>Mã giáo viên:</label>
            <p class="form-control-static">
                <?php
                if($row=="loi"){ 
                    echo 'Không có';}
                else{
                    echo $row["MA_GV"];}
                ?>
            </p>
        </div>
        <div class="form-inline m-3">
            <label>Tên giáo viên:</label>
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
            <label>Dạy môn:</label>
            <p class="form-control-static">
                <?php

                if($row=="loi"){ 
                    echo 'Không có';}
                else{
                    echo $row["TEN_MON"];}
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
        <div class="form-inline m-3">
            <label>Chức vụ:</label>
            <p class="form-control-static">
                <?php

                if($row=="loi"){ 
                            echo 'Không có';}
                else{
                    echo $row["CHUC_VU"];}
                ?>
            </p>
        </div>
        <p><a href="http://localhost/quanly/NQL/GV/<?php echo $row["IDMON"];?>" class="btn btn-primary m-3">BACK</a></p>
    </div>
</div>