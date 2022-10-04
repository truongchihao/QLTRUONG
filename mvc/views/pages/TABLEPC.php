<div class="container box">
    <h1 class="text-center">QUẢN LÝ DANH SÁCH PHÂN CÔNG GIÁO VIÊN</h1>
    <a href="http://localhost/quanly/QLPC/insert/<?php echo $_SESSION["idtruong"];?>" class="btn btn-lg btn-success">Thêm Giáo viên</a>
    <br />
    <div class="table-responsive">
    <br />
    <br />
    <br />
    <table id="user_data" class="table table-bordered table-striped">
        <thead>
        <tr>
             <th class="text-center">IDPC</th>
             <th class="text-center">Tên Giáo viên</th>
             <th class="text-center">Chuyên môn</th>
             <th class="text-center">Lớp phụ trách</th> 
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
   url:"http://localhost/live/QLPC/fetchpc/<?php echo $_SESSION["idtruong"];?>",
   type:"POST"
  },
  "columnDefs":[
   {
    "targets":[0, 1, 3],
    "orderable":false,
   },
  ],

 });
</script>