<div class="row p-5" style="min-height: 100vh;">
    <!-- Query Form -->
    <form action="" method="POST">
        <p class="mb-3 text-center text-uppercase fs-2 text-danger fw-bolder">Thêm Người Quản Trị Trường</p>
        <div class="input-group input-group-lg">
            <input type="text" class="form-control" id="id" placeholder="Nhập ID Người Dùng" name="id" required>
            <button type="submit" class="btn btn-success text-uppercase">Truy Vấn</button>
        </div>
    </form>

    <!-- Query Result -->
    <form action="" method="POST">
        <p class="mt-1 mb-1 text-uppercase fs-4 text-danger fw-bold">Thông Tin Quản Lý Trường Mới</p>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-danger text-uppercase w-25">Mã Tài Khoản</button>
            <input type="text" class="form-control" id="nid" name="nid" readonly>
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-danger text-uppercase w-25">Tên Tài Khoản</button>
            <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($data['Manager'][0])) echo $data['Manager'][0] ?>" readonly>
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-danger text-uppercase w-25">Mật Khẩu</button>
            <input type="text" class="form-control" id="password" name="password" value="<?php if (isset($data['Manager'][1])) echo $data['Manager'][1] ?>" readonly>
        </div>

        <div class="input-group input-group-lg mt-3">
            <button type="button" class="btn btn-success text-uppercase w-25">Mã Giáo Viên</button>
            <input type="text" class="form-control" id="teacherCode" name="teacherCode" value="<?php if (isset($data['Manager'][5])) echo $data['Manager'][5] ?>" readonly>
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Tên</button>
            <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($data['Manager'][2])) echo $data['Manager'][2] ?>" readonly>
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Trường</button>
            <input type="text" class="form-control" id="school" name="school" value="<?php if (isset($data['Manager'][3])) echo $data['Manager'][3] ?>" readonly>
        </div>
        <div class="input-group input-group-lg mt-2">
            <button type="button" class="btn btn-success text-uppercase w-25">Địa Chỉ</button>
            <input type="text" class="form-control" id="address" name="address" value="<?php if (isset($data['Manager'][4])) echo $data['Manager'][4] ?>" readonly>
        </div>
        <div class="input-group input-group-lg mt-2 d-none">
            <button type="button" class="btn btn-success text-uppercase w-25">Mã Trường</button>
            <input type="text" class="form-control" id="schoolCode" name="schoolCode" value="<?php if (isset($data['Manager'][6])) echo $data['Manager'][6] ?>" readonly>
        </div>
        <div class="input-group input-group-lg mt-2 d-none">
            <button type="button" class="btn btn-success text-uppercase w-25">Mã Trường</button>
            <input type="text" class="form-control" id="oldManager" name="oldManager" value="<?php if (isset($data['OldManager'])) echo $data['OldManager'] ?>" readonly>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            <p class="text-danger fs-4 fw-bold">
                <?php if (isset($data['Error'])) echo $data['Error']; ?>
            </p>
        </div>
        <div class="mt-4 d-flex justify-content-center">
            <p class="text-danger fs-4 fw-bold">
                <?php if (isset($data['Result'])) echo $data['Result']; ?>
            </p>
        </div>
        <?php
        if (isset($data['Status']) && $data['Status']) {
            echo '
                <div class="input-group mt-1">
                    <input type="text" class="form-control" id="addConfirm" name="addConfirm" readonly value="Yes" hidden>
                    <input type="submit" class="form-control bg-danger text-white fs-3 text-uppercase" value="Thêm">
                </div> ';
        }
        ?>
    </form>
</div>