<?php
$row = mysqli_fetch_array($data["ttlop"]);
?>
<div class="container flu">
    <div class="mx-auto mt-5 mb-5 alert-danger" style="width:600px;">
        <h3 class="m-5">Bạn có chắc muốn xóa thông tin của lớp có IDLOP như dưới?</h3>
        <form action="http://localhost/live/QLLOP/DeleteLOP" method="post">
			<div class="alert alert-danger fade in">
            <div class="form-inline m-3">
                <label>IDLOP:</label>
                <p class="form-control-static">
                    <?php
                        echo $row["IDLOP"];
                    ?>
                </p>
            </div>
            <div class="form-inline m-3">
                <input type="hidden" name="idlop" value="<?php echo $row["IDLOP"];?>">
                <button type="submit" id="submit1" class="btn btn-lg btn-danger" name="save">Xác nhận</button>
                <a href="http://localhost/live/NQL/LOP" class="btn btn-lg btn-success">Hủy</a>
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
                    window.alert("Xóa thông tin của lớp thành công");
                    </script>';
                    }else{
                    echo '<script>
                    window.alert("Xóa thông tin của lớp thất bại");
                    </script>';
                    }
                    ?>
                <?php } ?>       
    </div>
</div>