<div class="row">
    <!-- Query Form -->
    <form action="" method="POST">
        <p class="text-center text-uppercase fs-2 text-danger mt-5 fw-bold">Cập Nhật Trường</p>
        <div class="input-group input-group-lg">
            <select name="id" id="id" class="form-control">
                <?php
                while ($result = $data['AllSchool']->fetch_assoc()) {
                    echo '<option value=' . $result["IDTRUONG"] . '>' . $result["TEN_TRUONG"] . ' - ' . $result['DIA_CHI'] . '</option>';
                }
                ?>
            </select>
            <button type="submit" class="btn btn-success text-uppercase">Truy Vấn</button>
        </div>
    </form>

    <!-- Result Form -->
    <form action="" method="POST">
        <p class="mt-3 mb-3 text-uppercase fs-4 text-danger fw-bold">Thông Tin Môn Học</p>
        <i title="Làm Mới" class="bi bi-arrow-clockwise float-end fs-3 mb-1 text-danger" onclick="window.location.reload()" style="cursor: pointer;"></i>
        <div class="input-group input-group-lg mt-5">
            <button type="button" class="btn btn-success text-uppercase w-25">ID Trường</button>
            <input type="text" class="form-control" id="id" name="id" readonly value="<?php if (isset($data['School'][0])) echo $data['School'][0] ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Tên Trường</button>
            <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($data['School'][1])) echo $data['School'][1] ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Ngày Thành Lập</button>
            <input type="date" class="form-control" id="date" name="date" value="<?php if (isset($data['School'][2])) echo $data['School'][2] ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Địa Chỉ</button>
            <select class="form-select" id="address" name="address">
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
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Loại Trường</button>
            <select class="form-select" id="kind" name="kind" value="<?php echo $kind ?>">
                <option id="CS">Trường Cơ Sở</option>
                <option id="C">Trường Chuyên</option>
            </select>
        </div>
        <div class="text-danger text-center mt-5 fs-6 fw-bold">
            Tên Trường Chỉ Chứa Tối Đa 50 Ký Tự, Không Bao Gồm Các Tiền Tố: THCS, THCS Chuyên!
        </div>

        <div class="mt-5 d-flex justify-content-center">
            <p class="text-danger fs-4 fw-bold">
                <?php if (isset($data['Result'])) echo $data['Result']; ?>
            </p>
        </div>
        <?php
        if (isset($data['School'][5]) && $data['School'][5]) {
            echo '  
            <div class="input-group input-group-lg mt-5">
                <input type="text" class="form-control" id="updateConfirm" name="updateConfirm" readonly value="Yes" hidden>   
                <input type="submit" class="form-control bg-danger text-white fs-3 text-uppercase" value="Cập Nhật">
            </div> ';
        }
        ?>
    </form>
</div>

<!-- Script -->
<script type="text/javascript">
    var address = '<?php echo $data['School'][3]; ?>';
    var kind = '<?php echo $data['School'][4]; ?>';
    $(document).ready(function() {
        $("#Q1, #Q2, #Q3, #Q4, #Q5, #Q6, #Q7, #Q8, #Q9, #Q10, #Q11, #Q12, #QPN, #QBT, #QTP, #QTB, #QGV").filter(function() {
            return $(this).text() == address;
        }).prop('selected', true);
        $("#CS, #C").filter(function() {
            return $(this).text() == kind;
        }).prop('selected', true);
    })
</script>