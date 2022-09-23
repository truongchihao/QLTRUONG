<?php
if(isset($data["thongbao"])){
    $row = $data["thongbao"];
    if($row=="loi")
    {
        echo 
           '<script>
                window.alert("Không được phép chỉnh sửa lớp mặc định");
           </script>';
    }
    if($row=="loixoa")
    {
        echo 
           '<script>
                window.alert("Không được phép xóa lớp mặc định");
           </script>';
    }
}
?>
<div class="container box">
    <h1 class="text-center">QUẢN LÝ DANH SÁCH LỚP</h1>
    <a href="http://localhost/live/QLLOP/insert/<?php echo $_SESSION["idtruong"];?>" class="btn btn-lg btn-success">Thêm lớp</a>
    <br />
    <div class="table-responsive">
    <br />
    <br />
    <br />
    <table id="user_data" class="table table-bordered table-striped">
        <thead>
        <tr>
             <th class="text-center">IDLOP</th>
             <th class="text-center">TÊN LỚP</th>
             <th class="text-center">SỐ LƯỢNG</th>
             <th class="text-center">THUỘC KHỐI</th> 
             <th class="text-center" style="width: 150px;">OPTION</th>
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
   url:"http://localhost/live/QLLOP/fetchlop/<?php echo $_SESSION["idtruong"];?>",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 1, 4],
    "orderable":false,
   },
  ],

 });
</script>