<div class="container">
  <div class="mx-auto mt-5 mb-5 btn-info" style="width:500px;">
    <div class="page-header">
      <h1 class="">UPLOAD TÀI LIỆU</h1>
    </div>
      <form class="form-horizontal" enctype="multipart/form-data" action="http://localhost/quanly/UPLOAD/uploadtailieu" id="formDemo" name="formDemo" method="post" style="height: autopx;">
        <div class="m-5"> 
          <p>Loại tài liệu:</p>       
          <div class="radio">
            <label class="radio-inline"><input type="radio" name="optradio" id="radio" value="TL" checked> Tài liệu</label>
            <label class="radio-inline"><input type="radio" name="optradio" id="radio" value="BT"> Bài tập</label>
          </div>
        </div>
        <div class="m-5">
        <label for="formFile" class="form-label">Chọn file tài liệu:</label>
        <input class="form-control" type="file" name="myfile">
        </div>
        <div class="m-5">
        <input type="hidden" name="idgv" value="<?php 
        if(isset($_SESSION["ttgv"])){
          echo $_SESSION["ttgv"]["IDGV"];
        }
        ?>">
        <input type="hidden" name="idlop" value="<?php 
        if(isset($data["data"])){
          echo $data["data"];
        }
        ?>">
        <button type="submit" id="submit1" class="btn btn-lg btn-success m-3" name="save">Xác nhận</button>
        <a href="http://localhost/quanly/GV/LOPDAY/<?php 
        if(isset($_SESSION["ttgv"])){
          echo $_SESSION["ttgv"]["IDGV"];
        }
        ?>/<?php 
        if(isset($data["data"])){
          echo $data["data"];
        }
        ?>" class="btn btn-lg btn-secondary m-3">BACK</a>
        </div>
     </form>
     <?php if( isset($data["result"]) ) { ?>
       <?php
       if($data["result"] == "true"){
         echo 
        '<script>
        window.alert("Upload thành công");
        </script>';
       }else{
        echo '<script>
        window.alert("Upload thất bại");
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
          //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
          $("#formDemo").validate({
            rules: {
              myfile: {
                required: true
                
              },
            },
            messages: {
              myfile: {
                required: "Vui lòng chọn file!"
                
              },
            }
          });
        });
</script>
