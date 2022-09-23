<div class="row" style="min-height: 100vh;">
    <form action="" method="POST">
        <p class="text-center text-uppercase fs-2 text-danger m-5 fw-bolder">Thêm Môn Học</p>
        <i title="Làm Mới" class="bi bi-arrow-clockwise float-end fs-3 mb-1 text-danger" onclick="window.location.reload()" style="cursor: pointer;"></i>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">ID Môn Học</button>
            <input type="text" class="form-control" id="id" name="id" value="<?php if (isset($id)) echo $id; ?>" readonly>
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Tên Môn Học</button>
            <input type="text" class="form-control" id="name" name="name" required value="<?php if (isset($data['Subject'][0])) echo $data['Subject'][0]; ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Số Tiết</button>
            <input type="number" class="form-control" required id="periods" name="periods" min="15" max="100" value="<?php if (isset($data['Subject'][1])) echo $data['Subject'][1]; ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Số Bài Kiểm Tra</button>
            <input type="number" class="form-control" required id="test" name="test" min="3" max="15" value="<?php if (isset($data['Subject'][2])) echo $data['Subject'][2]; ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Khối</button>
            <select class="form-select" id="grade" name="grade">
                <option id="G6">6</option>
                <option id="G7">7</option>
                <option id="G8">8</option>
                <option id="G9">9</option>
            </select>
        </div>
        <div class="text-danger text-center mt-5 fs-6 fw-bold">
            <p>Tên Môn Học Chứa 20 Ký Tự, Không Bao Gồm Lớp Học! Số Tiết Nằm Trong Khoản 15 đến 100! Số Bài Kiểm Tra Trong Khoản 3 đến 15!</p>
        </div>

        <div class="text-danger text-center mt-5 fs-5 fw-bold">
            <p> <?php if (isset($data['Result'])) {
                    echo $data['Result'];
                } ?> </p>
        </div>

        <div class="input-group input-group-lg mt-5">
            <input type="submit" class="form-control bg-danger text-white fs-3 text-uppercase" value="Thêm Môn Học">
        </div>
    </form>
</div>

<!-- Script -->
<script type="text/javascript">
    var grade = '<?php if (isset($data['Subject'][3])) echo $data['Subject'][3]; ?>';
    $(document).ready(function() {
        $("#G6, #G7, #G8, #G9").filter(function() {
            return $(this).text() == grade;
        }).prop('selected', true);
    })
</script>