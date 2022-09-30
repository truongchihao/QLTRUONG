<?php
session_start();
if(isset($data["ttnql"])){
    $_SESSION["ttnql"] = $data["ttnql"];
}

if(empty($_SESSION["ttnql"])){
    header('Location: http://localhost/quanly/Home/Login');
}
?>
</html>
<html lang="en" class=" -webkit-">
<head>
  <meta charset="UTF-8">
  <title>Quản lý</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="/quanly/public/css/GD.css">
  <link href="/live/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="/live/public/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/live/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/live/public/js/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        .box
            {
            width:1500px;
            padding:20px;
            background-color:#fff;
            border:1px solid #ccc;
            border-radius:5px;
            margin-top:25px;
            }

        select.input-sm 
            {
            height: 40px;
            line-height: 30px;
            }
    </style>
</head>
<body translate="no">
  <input type="checkbox" id="menu">
<label for="menu" class="menu">
	<span></span>
	<span></span>
	<span></span>
</label>

<nav class="nav">
	<ul>
		<li><a href="http://localhost/quanly/NQL/Home">Home</a></li>
		<li><a href="http://localhost/quanly/NQL/CQ">Cấp quyền giáo viên, học sinh</a></li>
        <li><a href="#">Quản lý danh sách học sinh</a></li>
        <li><a href="http://localhost/quanly/NQL/MON">Quản lý danh sách giáo viên</a></li>
        <li><a href="#">Phân công giáo viên</a></li>
		<li><a href="http://localhost/quanly/Home/Login">Đăng xuất</a></li>
	</ul>
</nav>


<main>
	<header>
		<div class="row">
        <div class="col-sm-2 bg-secondary p-0">
            <div class="row">
                <div class="m-2">
                    <img class="rounded-circle m-4" width="100" height="100" src="/quanly/public/img/a.jpg" alt="null">
                </div>           
            </div>
            <p class="text-info text-center">
                <?php 
                    if(isset($_SESSION["ttnql"])){
                        echo $_SESSION["ttnql"]["FULL_NAME"];
                    }
                ?>
            </p>
            <p class="text-info">Chức vụ: Người quản lý</p>      
        </div>
        <div class="col-sm-10 bg-light border-bottom">
            <div class="row bg-light">
                <div class="col-sm-3">
                    <img class="img-thumbnail mt-5" width="200" height="150" src="/quanly/public/img/iuh.png" alt="null">
                </div>
                <div class="col-sm-9">
                    <h2 class="mt-4">
                      TRƯỜNG TRUNG HỌC CỞ SỞ HÒA BÌNH
                    </h2>
                </div>
            </div>
        </div>
  </div>
	</header>
	<section>
		<div class="container">
        <div class="row mt-5">
            <div class="box py-3 generalbox sitetopic">
                <h2 class="sectionname text-warning">Giới thiệu chung</h2>
            <div class="no-overflow">Chào mừng đã đến với kênh hỗ trợ các chức năng của quản lý trường.<br><p><br></p>
        </div>
        <div class="row">
            <?php
            if(isset($data["Page"]))
            {
                require_once "./mvc/views/pages/".$data["Page"].".php";
            }
            if(isset($data["GV"]))
            {
                require_once "./mvc/views/GV/".$data["GV"].".php";
            }
                 
             ?>         
        </div>
		</div>
	</section>
	<section>
		<div class="container">
		    <div class="row bg-success border-top">
                <div class="col-sm-4">
                    <img class="img-thumbnail mt-2 mb-0 mx-auto d-block" width="200" height="150" src="/quanly/public/img/iuh.png" alt="null">
                    <p class="m-5">Chào mừng các bạn đến với hệ thống chức năng của người quản lý trường.</p>
                </div>
                <div class="col-sm-4">
                    <h4 class="m-5 text-danger text-center">Liên kết</h4>
                        <a class="nav-link text-dark text-center" href="#">Website Nhà Trường</a>
                        <a class="nav-link text-dark text-center" href="#">Website Trung tâm QTHT</a>
                        <a class="nav-link text-dark text-center" href="#">Cổng Thông Tin học sinh</a>
                </div>
                <div class="col-sm-4">
                    <h4 class="m-5 text-danger text-center">Liên Hệ</h4>
                    <div class=" m-5 text-center">
                        <p>Trung tâm Quản trị Hệ thống</p>
                        <p>Phone : 0242894390</p>
                        <p>E-mail : tht@iuh.edu.vn</p>
                    </div>         
                </div>
            </div>
        <div class="row bg-primary">
            <p class="m-1 text-center">Copyright © 2022 - Phát triển bởi Hào-Quí - ĐHCN TP.HCM</p>
        </div>
        </div>
	</section>
</main>
</body>
</html>