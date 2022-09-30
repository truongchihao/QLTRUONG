<?php
$row = mysqli_fetch_array($data["ttgv"]);
?>
<div class="container flu">
    <div class="mx-auto mt-5 mb-5 alert-danger" style="width:600px;">
        <h3 class="m-5">Bạn có chắc muốn xóa thông tin của giáo viên có IDGV và xóa tài khoản có IDAC như dưới ?</h3>
        <form action="http://localhost/quanly/QLGV/DeleteGV" method="post">
			<div class="alert alert-danger fade in">
            <div class="form-inline m-3">
                <label>IDGV:</label>
                <p class="form-control-static">
                    <?php
                    if(isset($row))
                    {
                        echo $row["IDGV"];
                    }
                    ?>
                </p>
            </div>
            <div class="form-inline m-3">
                <label>IDAC:</label>
                <p class="form-control-static">
                    <?php
                    if(isset($row))
                    {
                        echo $row["IDAC"];
                    }
                    ?>
                </p>
            </div>
            <div class="form-inline m-3">
                <input type="hidden" name="idgv" value="<?php if(isset($row))
                    {
                        echo $row["IDGV"];
                    }
                    ?>?>">
                <input type="hidden" name="idac" value="<?php if(isset($row))
                    {
                        echo $row["IDAC"];
                    }?>">
                <button type="submit" id="submit1" class="btn btn-lg btn-danger" name="save">Xác nhận</button>
                <a href="http://localhost/quanly/NQL/GV/<?php echo $row["IDMON"];?>" class="btn btn-lg btn-success">Hủy</a>
            </div>
	        </div>
		</form> 
        <?php 
                if(isset($data["result"])){
                  ?>
                    <?php
                    if($data["result"] == "true"){
                      echo 
                    '<script>
                    window.alert("Xóa thông tin và tài khoản giáo viên thành công");
                    </script>';
                    }else{
                    echo '<script>
                    window.alert("Xóa thông tin và tài khoản giáo viên thất bại");
                    </script>';
                    }
                    ?>
                <?php } ?>       
    </div>
</div>