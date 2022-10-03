<?php
if(isset($data["ttlop"])){
    $row = mysqli_fetch_array($data["ttlop"]);
    if(empty($row))
    {
        echo 
           '<script>
                window.alert("Lỗi không có IDLOP cần xem");
           </script>';
    }
}
?>
<div class="container box">
    <h1 class="text-center">QUẢN LÝ DANH SÁCH HỌC SINH CỦA LỚP <?php 
    if(isset($row))
    {
        echo $row["TEN_LOP"];
    }
    ?> </h1>
    <input type="hidden" name="idlop" value="<?php echo $row["IDLOP"];?>">
    <br />
    <div class="table-responsive">
    <br />
    <br />
    <br />
    <table id="user_data" class="table table-bordered table-striped mx-auto mt-5 mb-5" style="width: 1000px;">
        <thead>
        <tr>
             <th class="text-center">IDHS</th>
             <th class="text-center">MÃ HỌC SINH</th>
             <th class="text-center">FULL_NAME</th>
             <th class="text-center" style="width: 120px;">OPTION</th>
        </tr>
        </thead>
    </table>
</div>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script type="text/javascript" language="javascript" >
 var dataTable = $('#user_data').DataTable({
  "processing":true,
  "serverSide":true,
  "order":[],
  "ajax":{
   url:"http://localhost/quanly/QLHS/fetchhs/<?php echo $row["IDLOP"];?>",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0,2,3],
    "orderable":false,
   },
  ],

 });
</script>