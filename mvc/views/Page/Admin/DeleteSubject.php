<div class="row">
    <!-- Query Form -->
    <form action="" method="POST">
        <p class="text-center text-uppercase fs-2 text-danger m-5 fw-bolder">Xóa Môn Học</p>
        <i title="Làm Mới" class="bi bi-arrow-clockwise float-end fs-3 mb-1 text-danger" onclick="window.location.reload()" style="cursor: pointer;"></i>
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

    <!-- Query Result -->
    <form action="" method="POST">
        <p class="mt-5 mb-3 text-uppercase fs-4 text-danger fw-bold">Thông Tin Môn Học</p>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">ID Môn Học</button>
            <input type="text" class="form-control" id="id" name="id" readonly value="<?php if (isset($data['Subject'][0])) echo $data['Subject'][0] ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Tên Môn Học</button>
            <input type="text" class="form-control" id="name" name="name" readonly value="<?php if (isset($data['Subject'][1])) echo $data['Subject'][1] ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Số Tiết</button>
            <input type="text" class="form-control" id="periods" name="periods" readonly value="<?php if (isset($data['Subject'][2])) echo $data['Subject'][2] ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Số Bài Kiểm Tra</button>
            <input type="text" class="form-control" id="test" name="test" readonly value="<?php if (isset($data['Subject'][3])) echo $data['Subject'][3] ?>">
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Khối</button>
            <input type="text" class="form-control" id="grade" name="grade" readonly value="<?php if (isset($data['Subject'][4])) echo $data['Subject'][4] ?>">
        </div>

        <div class="mt-5 d-flex justify-content-center">
            <p class="text-danger fs-4 fw-bold">
                <?php if (isset($data['Result'])) echo $data['Result'] ?>
            </p>
        </div>

        <?php
        if (isset($data['Subject'][5]) && $data['Subject'][5]) {
            echo '
            <div class="input-group input-group-lg mt-5">
                <input type="text" class="form-control" id="deleteConfirm" name="deleteConfirm" readonly value="Yes" hidden>
                <input type="submit" class="form-control bg-danger text-white fs-3 text-uppercase" value="Xóa" id="delete">
            </div> ';
        }
        ?>
    </form>
</div>