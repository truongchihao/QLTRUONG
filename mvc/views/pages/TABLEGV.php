<?php
if(isset($data["ttmon"])){
    $row = $data["ttmon"];
    $_SESSION["IDMON"] = $data["ttmon"]["IDMON"];
    if(empty($row))
    {
        echo 
           '<script>
                window.alert("Lỗi không có IDMON cần xem");
           </script>';
    }
}
?>
<div class="container box">
    <h1 class="text-center">QUẢN LÝ DANH SÁCH GIÁO VIÊN DẠY <?php echo $row["TEN_MON"];?></h1>
    <br />
    <div class="table-responsive">
    <br />
    <br />
    <br />
    <table id="user_data" class="table table-bordered table-striped">
        <thead>
        <tr>
             <th class="text-center">IDGV</th>
             <th class="text-center">MA_GV</th>
             <th class="text-center">FULL_NAME</th>
             <th class="text-center">CHUC_VU</th> 
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
   url:"http://localhost/quanly/QLGV/fetchgv/<?php echo $_SESSION["IDMON"];?>",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0,2,3,4],
    "orderable":false,
   },
  ],

 });
</script>