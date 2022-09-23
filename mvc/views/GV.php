<?php
session_start();
if(isset($data["ttgv"])){
    $_SESSION["ten_gv"] = $data["ttgv"]["FULL_NAME"];
}

if(empty($_SESSION["ten_gv"])){
    header('Location: http://localhost/quanly/Home/Login');
}
?>
<html lang="en" class=" -webkit-">
<head>
  <meta charset="UTF-8">
  <title>Học sinh</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="/quanly/public/css/GD.css">
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
		<li><a href="#">Xem lớp được phân công</a></li>
		<li><a href="http://localhost/quanly/Home/Login">Đăng xuất</a></li>
	</ul>
</nav>


<main>
	<header>
		<div class="row">
        <div class="col-sm-2 bg-secondary">
            <div class="row">
                <div class="p-0">
                    <img class="rounded-circle m-4" width="100" height="100" src="/quanly/public/img/a.jpg" alt="null">
                </div>           
            </div>
            <p class="text-info text-center">
                    <?php 
                        if(isset($data["ttgv"])){
                            echo $data["ttgv"]["FULL_NAME"];
                        }
                    ?>
            </p>
            <p class="text-info">Chức vụ: <?php 
                        if(isset($data["ttgv"])){
                            echo $data["ttgv"]["CHUC_VU"];
                        }
                    ?></p>      
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
            <div class="no-overflow">Chào mừng đã đến với kênh hỗ trợ các chức năng của giáo viên.<br><p><br></p>
        </div>
		</div>
	</section>
	<section>
		<div class="container">
		    <div class="row bg-success border-top">
                <div class="col-sm-4">
                    <img class="img-thumbnail mt-2 mb-0 mx-auto d-block" width="200" height="150" src="/quanly/public/img/iuh.png" alt="null">
                    <p class="m-5">Chào mừng các bạn đến với hệ thống chức năng của giáo viên</p>
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