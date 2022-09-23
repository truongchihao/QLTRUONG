<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Trang Quản Trị - Học Tập Trực Tuyến Cấp Trung Học Cơ Sở</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Navigation -->
            <div class="col-sm-3 bg-secondary" style="min-height: 100vh;">
                <!-- User Profile -->
                <div class="row">
                    <div class="col-sm-12" style="min-height: 200px;">
                        <img class="rounded-circle mx-auto d-block my-3" width="50%" src="https://www.w3schools.com/howto/img_avatar.png" alt="avatar">

                        <!-- Change User Name And Permission -->
                        <p class="text-center h3 text-white">Lê Xuân Hòa</p>
                        <p class="text-center h5 text-white">Quản Trị Viên</p>
                    </div>
                </div>

                <!-- Vertical Navigation -->
                <div class="row-sm-12">
                    <p class="fs-4 text-uppercase my-2" style="text-decoration: none; background-color: #1C4962; padding: 20px; color: white; min-width: 100%;">Chức Năng</p>
                    <div class="container-fluid d-grid">
                        <div class="btn-group-vertical">
                            <!-- Home Page -->
                            <a href="http://localhost/live/Admin/Home" class="btn btn-dark btn-block mb-2 py-3 text-uppercase text-white">
                                <i class="bi bi-house-fill mx-2 float-start"></i> Trang Chủ
                            </a>
                            <!-- Assign Permission -->
                            <a href="http://localhost/live/Admin/Permission" class="btn btn-dark btn-block mb-2 py-3 text-uppercase text-white">
                                <i class="bi bi-person-check-fill mx-2 float-start"></i> Phân Quyền
                            </a>
                            <!-- Create Stat -->
                            <a href="http://localhost/live/Admin/Stat" class="btn btn-dark btn-block mb-2 py-3 text-uppercase text-white">
                                <i class="bi bi-bar-chart-line mx-2 float-start"></i> Tạo Thống Kê
                            </a>
                            <!-- Add Object -->
                            <a href="http://localhost/live/Admin/Add" class="btn btn-dark btn-block mb-2 py-3 text-uppercase text-white">
                                <i class="bi bi-plus-circle mx-2 float-start"></i> Thêm Đối Tượng
                            </a>
                            <!-- Delete Object -->
                            <a href="http://localhost/live/Admin/Delete" class="btn btn-dark btn-block mb-2 py-3 text-uppercase text-white">
                                <i class="bi bi-x-octagon mx-2 float-start"></i> Xóa Đối Tượng
                            </a>
                            <!-- Update Object -->
                            <a href="http://localhost/live/Admin/Update" class="btn btn-dark btn-block mb-2 py-3 text-uppercase text-white">
                                <i class="bi bi-plus-square-dotted mx-2 float-start"></i> Cập nhật Đối Tượng
                            </a>
                            <!-- Sign Out -->
                            <a href="http://localhost/live/Home/Login" class="btn btn-dark btn-block mb-2 py-3 text-uppercase text-white">
                                <i class="bi bi-box-arrow-in-right mx-2 float-start"></i> Đăng Xuất
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="col-sm-9">
                <?php require_once './mvc/views/Page/' . $data["Page"] . '.php' ?>
            </div>
        </div>

    </div>
</body>

</html>