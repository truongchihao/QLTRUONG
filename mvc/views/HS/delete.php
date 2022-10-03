<?php
$row = mysqli_fetch_array($data["tths"]);
?>
<div class="container flu">
    <div class="mx-auto mt-5 mb-5 alert-danger" style="width:600px;">
        <h3 class="m-5">Bạn có chắc muốn xóa thông tin của học sinh có IDHS và xóa tài khoản có IDAC như dưới ?</h3>
        <form action="http://localhost/quanly/QLHS/DeleteHS" method="post">
			<div class="alert alert-danger fade in">
            <div class="form-inline m-3">
                <label>IDGV:</label>
                <p class="form-control-static">
                    <?php
                    if(isset($row))
                    {
                        echo $row["IDHS"];
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
                <input type="hidden" name="idhs" value="<?php echo $row["IDHS"];?>">
                <input type="hidden" name="idac" value="<?php echo $row["IDAC"];?>">
                <button type="submit" id="submit1" class="btn btn-lg btn-danger" name="save">Xác nhận</button>
                <a href="http://localhost/quanly/NQL/HS/<?php echo $row["IDLOP"];?>" class="btn btn-lg btn-success">Hủy</a>
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
                    window.alert("Xóa thông tin và tài khoản học sinh thành công");
                    </script>';
                    }else{
                    echo '<script>
                    window.alert("Xóa thông tin và tài khoản học sinh thất bại");
                    </script>';
                    }
                    ?>
                <?php } ?>       
    </div>
</div>