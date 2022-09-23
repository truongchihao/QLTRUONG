<div class="row" style="min-height: 100vh;">
    <div class="container mt-5">
        <p class="text-center text-uppercase fs-2 text-danger fw-bolder">Tạo Thống Kê</p>
        <form action="" method="POST">
            <div class="row">
                <!-- Address -->
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-text" title="Địa Chỉ">
                            <i class="bi bi-shop"></i>
                        </span>
                        <select class="form-select" id="address" name="address">
                            <option id="Q1">Tất Cả</option>
                            <option id="Q1">Quận 1</option>
                            <option id="Q2">Quận 2</option>
                            <option id="Q3">Quận 3</option>
                            <option id="Q4">Quận 4</option>
                            <option id="Q5">Quận 5</option>
                            <option id="Q6">Quận 6</option>
                            <option id="Q7">Quận 7</option>
                            <option id="Q8">Quận 8</option>
                            <option id="Q9">Quận 9</option>
                            <option id="Q10">Quận 10</option>
                            <option id="Q11">Quận 11</option>
                            <option id="Q12">Quận 12</option>
                            <option id="QPN">Quận Phú Nhuận</option>
                            <option id="QBT">Quận Bình Thạnh</option>
                            <option id="QTP">Quận Tân Phú</option>
                            <option id="QTB">Quận Tân Bình</option>
                            <option id="QGV">Quận Gò Vấp</option>
                        </select>
                    </div>
                </div>

                <!-- School Type -->
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-text" title="Loại Trường">
                            <i class="bi bi-bookmark-star"></i>
                        </span>
                        <select class="form-select" id="kind" name="kind">
                            <option>Tất Cả</option>
                            <option>Trường Cơ Sở</option>
                            <option>Trường Chuyên</option>
                        </select>
                    </div>
                </div>

                <!-- Start Time -->
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-text" title="Thời Gian Bắt Đầu">
                            <i class="bi bi-calendar-day"></i>
                        </span>
                        <input type="date" class="form-control" id="startTime" name="startTime">
                    </div>
                </div>

                <!-- End Time -->
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-text" title="Thời Gian Bắt Đầu">
                            <i class="bi bi-calendar-day"></i>
                        </span>
                        <input type="date" class="form-control" id="endTime" name="endTime">
                    </div>
                </div>
            </div>

            <form action="" method="post" class="my-3 m-1">
                <button type="submit" class="btn form-control btn-success btn p-2 my-2 text-uppercase">Tạo Thống Kê</button>
            </form>
        </form>

        <!-- Stat Result -->
        <div class="row p-2">
            <table class="table table-bordered table-hover table-responsive">
                <thead class="bg-secondary text-center text-white text-uppercase">
                    <tr>
                        <th>Mã Trường</th>
                        <th>Tên Trường</th>
                        <th>Ngày Thành Lập</th>
                        <th>Địa Chỉ</th>
                        <th>Loại Trường</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data['Data'])) {
                        if (mysqli_num_rows($data['Data']) > 0) {
                            while ($result = $data['Data']->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <td>' . $result["IDTRUONG"] . '</td>
                                        <td>' . $result["TEN_TRUONG"] . '</td>
                                        <th>' . $result["NGAY_THANH_LAP"] . '</th>
                                        <th>' . $result["DIA_CHI"] . '</th>
                                        <td>' . $result["LOAI"] . '</td>
                                    </tr>';
                            }
                        }
                        echo '
                            <tr>
                                <td class="fw-bold fs-5 text-center text-uppercase">Tổng Cộng</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="fw-bold fs-5 text-success">' . mysqli_num_rows($data['Data']) . '</td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>