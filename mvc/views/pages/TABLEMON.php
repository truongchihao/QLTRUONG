<div class="container box">
    <h1 class="text-center">QUẢN LÝ DANH SÁCH MÔN</h1>
    <br />
    <div class="table-responsive">
    <br />
    <br />
    <br />
    <table id="user_data" class="table table-bordered table-striped">
        <thead>
        <tr>
             <th class="text-center">IDMON</th>
             <th class="text-center">TÊN MÔN</th>
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
   url:"http://localhost/live/QLMON/fetchmon/<?php echo $_SESSION["idtruong"];?>",
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