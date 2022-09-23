<div class="row">
    <!-- Query Form -->
    <form action="" method="POST">
        <p class="text-center text-uppercase fs-2 text-danger mt-5 fw-bolder">Cập Nhật Môn Học</p>
        <div class="input-group input-group-lg">
            <select name="id" id="id" class="form-control">
                <?php
                while ($result = $data['AllSubject']->fetch_assoc()) {
                    echo '<option value=' . $result["IDMON"] . '>' . $result["TEN_MON"] . '</option>';
                }
                ?>
            </select>
            <button type="submit" class="btn btn-success text-uppercase">Truy Vấn</button>
        </div>
    </form>

    <!-- Result Form -->
    <form action="" method="POST">
        <p class="mt-5 mb-3 text-uppercase fs-4 text-danger fw-bold">Thông Tin Môn Học</p>
        <i title="Làm Mới" class="bi bi-arrow-clockwise float-end fs-3 mb-1 text-danger" onclick="window.location.reload()" style="cursor: pointer;"></i>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">ID Môn Học</button>
            <input type="text" class="form-control" id="id" name="id" readonly value="<?php if (isset($data['Subject'][0])) echo $data['Subject'][0] ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Tên Môn Học</button>
            <input type="text" class="form-control" id="name" name="name" required maxlength="20" value="<?php if (isset($data['Subject'][1])) echo $data['Subject'][1] ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Số Tiết</button>
            <input type="text" class="form-control" id="periods" name="periods" required value="<?php if (isset($data['Subject'][2])) echo $data['Subject'][2] ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Số Bài Kiểm Tra</button>
            <input type="text" class="form-control" id="test" name="test" required value="<?php if (isset($data['Subject'][4])) echo $data['Subject'][3] ?>">
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
            Tên Môn Học Chỉ Chứa 20 Ký Tự, Không Bao Gồm Số Thứ Tự Lớp Học!
        </div>

        <div class="mt-5 d-flex justify-content-center">
            <p class="text-danger fs-4 fw-bold">
                <?php if (isset($data['Result'])) echo $data['Result']; ?>
            </p>
        </div>
        <?php
        if (isset($data['Subject'][5]) && $data['Subject'][5]) {
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
    var grade = '<?php if (isset($data['Subject'][5])) echo ($data['Subject'][4]); ?>';
    console.log(grade);
    $(document).ready(function() {
        $("#G6, #G7, #G8, #G9").filter(function() {
            return $(this).text() == grade;
        }).prop('selected', true);
    })
</script>