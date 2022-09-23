<div class="row" style="min-height: 100vh;">
    <form action="" method="POST">
        <p class="text-center text-uppercase fs-2 text-danger m-5 fw-bolder">Thêm Trường</p>
        <i title="Làm Mới" class="bi bi-arrow-clockwise float-end fs-3 mb-1 text-danger" onclick="window.location.reload()" style="cursor: pointer;"></i>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">ID Trường</button>
            <input type="text" class="form-control" id="id" readonly>
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Tên Trường</button>
            <input type="text" class="form-control" id="name" name="name" required value="<?php if (isset($data['School'][0])) echo $data['School'][0]; ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Ngày Thành Lập</button>
            <input type="date" class="form-control" id="date" name="date" required value="<?php if (isset($data['School'][1])) echo $data['School'][1]; ?>">
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
            <select class="form-select" id="kind" name="kind">
                <option>Trường Cơ Sở</option>
                <option>Trường Chuyên</option>
            </select>
        </div>
        <div class="text-danger text-center mt-5 fs-6 fw-bold">
            <p>Tên Trường Chỉ Chứa Tối Đa 50 Ký Tự, Không Bao Gồm Các Tiền Tố: THCS, THCS Chuyên!</p>
        </div>

        <!-- Show Result -->
        <div class="text-danger text-center mt-5 fs-5 fw-bold">
            <p> <?php if (isset($data['Result'])) {
                    echo $data['Result'];
                } ?> </p>
        </div>

        <div class="input-group input-group-lg mt-5">
            <input type="submit" class="form-control bg-danger text-white fs-3 text-uppercase" value="Thêm Trường">
        </div>
    </form>
</div>

<!-- Script -->
<script type="text/javascript">
    var address = '<?php echo $data['School'][2]; ?>';
    var kind = '<?php echo $data['School'][3]; ?>';
    $(document).ready(function() {
        $("#Q1, #Q2, #Q3, #Q4, #Q5, #Q6, #Q7, #Q8, #Q9, #Q10, #Q11, #Q12, #QPN, #QBT, #QTP, #QTB, #QGV").filter(function() {
            return $(this).text() == address;
        }).prop('selected', true);
        $("#CS, #C").filter(function() {
            return $(this).text() == kind;
        }).prop('selected', true);
    })
</script>