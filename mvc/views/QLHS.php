<?php
session_start();
if(empty($_SESSION["ten_nql"])){
    header('Location: http://localhost/live/Home/Login');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/live/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="/live/public/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/live/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/live/public/js/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="/live/public/css/GD.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
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
<body>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-sm-2 bg-secondary">
                <div class="row">
                    <div class="col-sm-5 p-0">
                        <img class="rounded-circle m-4" width="100" height="100" src="/live/public/img/a.jpg" alt="null">
                    </div>
                    <div class="col-sm-7 p-0">
                        <p class="text-info m-4 text-center mt-5">
                        <?php 
                            if(isset($data["ttnql"])){
                                echo $data["ttnql"]["FULL_NAME"];
                                $_SESSION["ten_nql"] = $data["ttnql"]["FULL_NAME"];
                            }else{echo $_SESSION["ten_nql"];
                            }?>
                        </p>
                    </div>               
                </div>
                <div class="container-fluid">
                    <p class="text-info">Chức vụ: Người quản lý trường</p>
                </div>
            </div>
            <div class="col-sm-10 bg-light border-bottom">
                <div class="row bg-light">
                    <div class="col-sm-4">
                        <img class="img-thumbnail mt-5" width="200" height="150" src="/live/public/img/iuh.png" alt="null">
                    </div>
                    <div class="col-sm-8">
                        <h1 class="mt-5">
                        <?php 
                            if(isset($data["tttruong"])){
                                echo $data["tttruong"]["TEN_TRUONG"];
                                $_SESSION["ten_truong"] = $data["tttruong"]["TEN_TRUONG"];
                            }else{echo $_SESSION["ten_truong"];
                            }?>
                        </h1>
                    </div>
                 </div>
            </div>
        </div>
        <div class="row border-bottom ">
            <div class="col-sm-2 bg-secondary">
                <div class="row mt-5" id="vertical-menu">
                <a href="./NQL" class="active h4 mb-0">Chức năng</a>
                    <a href="http://localhost/live/NQL/CQ">Phân quyền giáo viên, học sinh</a>
                    <a href="http://localhost/live/NQL/LOP">Quản lý danh sách lớp</a>
                    <a href="http://localhost/live/NQL/MON">Quản lý danh sách giáo viên</a>
                    <a href="http://localhost/live/NQL/PC">Phân công giáo viên</a>
                    <a href="#">Thống kê</a>
                    <a href="http://localhost/live/Home/Login">Đăng xuất</a>
                </div>
            </div>
            <div class="col-sm-10">
            <?php
                 require_once "./mvc/views/HS/".$data["HS"].".php"
            ?>         
            </div>
        </div>
        <div class="row bg-success border-top">
            <div class="col-sm-4">
                <img class="img-thumbnail mt-2 mb-0 mx-auto d-block" width="200" height="150" src="/live/public/img/iuh.png" alt="null">
                <p class="m-5">Chào mừng các bạn đến với hệ thống chức năng của người quản lý trường.</p>
            </div>
            <div class="col-sm-4">
                <h4 class="m-5 text-danger text-center">Liên kết</h4>
                <ul class="nav flex-column m-5">
                    <li class="nav-item ">
                        <a class="nav-link text-dark text-center" href="#">Website Nhà Trường</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark text-center" href="#">Website Trung tâm QTHT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark text-center" href="#">Cổng Thông Tin học sinh</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4">
                <h4 class="m-5 text-danger text-center">Liên Hệ</h4>
                <div class=" m-5 text-center">
                    <p>Trung tâm Quản trị Hệ thống</p>
                    <p>Phone : 0283.8940 390 - ext 168</p>
                    <p>E-mail : csm@iuh.edu.vn</p>
                </div>         
            </div>
        </div>
        <div class="row bg-primary">
            <p class="m-1 text-center">Copyright © 2022 - Phát triển bởi Nhóm 11 - ĐHCN TP.HCM</p>
            </div>
        </div>
    </div>
</body>
</html>