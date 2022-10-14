<h1>Lớp <?php 
        if(isset($data["LOPDAY"]) && $data["LOPDAY"]["IDGV"] == $_SESSION["ttgv"]["IDGV"]){
            $ttgvlop = $data["LOPDAY"];
            echo $ttgvlop["TEN_LOP"];
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }
        ?>
</h1>
<div class="container box">
    <form class="form-horizontal" action="http://localhost/quanly/UPLOAD/tailieu" id="formDemo" name="formDemo" method="post" style="height: autopx;">
        <div class="m-5">
        <input type="hidden" name="idlop" value="<?php 
        if(isset($ttgvlop)){
          echo $ttgvlop["IDLOP"];
        }
        ?>">
        <button type="submit" id="submit1" class="btn btn-lg btn-success m-3" name="save">Upload tài liệu</button>
        </div>
    </form>
    <div class="border border-success border-end-0 border-start-0 border-top-0">
        <h3>Tài liệu</h3>

    </div>
    <div>
        <h3>Tài liệu</h3>

    </div>

    <div class="border border-primary border-end-0 border-start-0 border-top-0">
        <h3>Bài tập</h3>
    </div>
    <div>
        <h3>Bài tập</h3>

    </div>
<div>