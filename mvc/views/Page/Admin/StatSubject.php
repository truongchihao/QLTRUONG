<div class="row" style="min-height: 100vh;">
    <div class="container mt-5">
        <p class="text-center text-uppercase fs-2 text-danger fw-bolder">Tạo Thống Kê</p>
        <form action="" method="POST">
            <div class="row">
                <!-- Grade -->
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-text" title="Khối">
                            <i class="bi bi-shop"></i>
                        </span>
                        <select class="form-select" id="grade" name="grade">
                            <option>Tất Cả</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                        </select>
                    </div>
                </div>

                <!-- Periods -->
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-text" title="Số Tiết">
                            <i class="bi bi-bookmark-star"></i>
                        </span>
                        <input type="number" class="form-control" id="periods" name="periods">
                    </div>
                </div>

                <!-- Test -->
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-text" title="Số Bài Kiểm Tra">
                            <i class="bi bi-calendar-day"></i>
                        </span>
                        <input type="number" class="form-control" id="test" name="test">
                    </div>
                </div>

                <!-- Operator -->
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-text" title="Phép Liệt Kê">
                            <i class="bi bi-calendar-day"></i>
                        </span>
                        <select class="form-select" id="operator" name="operator">
                            <option>Bằng</option>
                            <option>Lớn Hơn</option>
                            <option>Bé Hơn</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row my-3 m-1">
                <button class="form-control btn-success btn p-2 my-2 text-uppercase">Tạo Thống Kê</button>
            </div>
        </form>

        <!-- Stat Result -->
        <div class="row p-2">
            <table class="table table-bordered table-hover table-responsive">
                <thead class="bg-secondary text-center text-white text-uppercase">
                    <tr>
                        <th>Mã Môn Học</th>
                        <th>Tên Môn Học</th>
                        <th>Số Tiết</th>
                        <th>Số Bài Kiểm Tra</th>
                        <th>Khối</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data['Data'])) {
                        if (mysqli_num_rows($data['Data']) > 0) {
                            while ($result = $data['Data']->fetch_assoc()) {
                                echo '
                                    <tr>
                                        <td>' . $result["IDMON"] . '</td>
                                        <td>' . $result["TEN_MON"] . '</td>
                                        <th>' . $result["SO_TIET"] . '</th>
                                        <th>' . $result["SO_BAIKT"] . '</th>
                                        <td>' . intval($result["IDKHOI"]) . '</td>
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