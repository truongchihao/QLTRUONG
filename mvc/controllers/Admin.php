<?php
class Admin extends Controller
{
    function SayHi()
    {
        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/Home"
        ]);
    }

    function Permission()
    {
        $id = $username = $password = $name = $school = $address = $teacherCode = $schoolCode = $error = $show = "";
        $status = false;
        $result = "";
        $manager = array();

        $managerModel = $this->model("ManagerModel");
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $data = $managerModel->getTeacher($id);

            if ($data->num_rows > 0) {
                $result = $data->fetch_assoc();
                $username = 'QL' . (100001 + $managerModel->getMaxID());
                $password = "111111";
                $name = $result["FULL_NAME"];
                $school = $result["TEN_TRUONG"];
                $address = $result["DIA_CHI"];
                $teacherCode = $result["IDGV"];
                $schoolCode = $result["IDTRUONG"];
                $manager = array($username, $password, $name, $school, $address, $teacherCode, $schoolCode);

                if (!($managerModel->isManager($id))) {
                    $status = true;
                } else {
                    $status = false;
                    $error = "Tài Khoản Hiện Tài Đã Là Người Quản Lý Trường!";
                }
            } else {
                $error = "Tài Khoản Không Tồn Tại!";
            }
        }

        if (isset($_POST['addConfirm'])) {
            $data = $managerModel->getTeacher($_POST['teacherCode']);
            $result = $data->fetch_assoc();

            $username = ($_POST['username']);
            $teacherCode = $result["IDGV"];
            $schoolCode = $result["IDTRUONG"];
            if ($managerModel->add($username, $teacherCode, $schoolCode)) {
                $show = "Thêm Tài Khoản Thành Công!";
            } else {
                $show = "Thêm Tài Khoản Thất Bại!";
            }
        }

        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/Permission",
            "Manager" => $manager,
            "Error" => $error,
            "Status" => $status,
            "Result" => $show
        ]);
    }

    function Stat()
    {
        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/Stat"
        ]);
    }

    function StatSchool()
    {
        $address = $kind = "Tất Cả";
        $startTime = $endTime = 0;
        $resultSet = array();

        if (!empty($_POST)) {
            $address = $_POST['address'];
            $kind = $_POST['kind'];
            $startTime = strtotime($_POST['startTime']);
            $endTime = strtotime($_POST['endTime']);

            $schoolModel = $this->model("SchoolModel");
            $resultSet = $schoolModel->stat($address, $kind, $startTime, $endTime);
        }

        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/StatSchool",
            "Data" => $resultSet,
        ]);
    }

    function StatSubject()
    {
        $grade = $operator = "";
        $periods = $test = 0;
        $resultSet = array();

        if (!empty($_POST)) {
            $grade = $_POST['grade'];
            $operator = $_POST['operator'];
            $periods = $_POST['periods'];
            $test = $_POST['test'];

            $subjectModel = $this->model("SubjectModel");
            $resultSet = $subjectModel->stat($grade, $periods, $test, $operator);
        }

        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/StatSubject",
            "Data" => $resultSet,
        ]);
    }

    function Add()
    {
        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/Add"
        ]);
    }

    function AddSchool()
    {
        $result = "";
        $school = array();

        if (!empty($_POST)) {
            $kind = $_POST['kind'];
            $date = $_POST['date'];
            $address = $_POST['address'];
            $name = ($kind == 'Trường Cơ Sở') ? ('THCS ' . $_POST['name']) : ('THCS Chuyên ' . $_POST['name']);
            $school = array($name, $date, $address, $kind);

            $schoolModel = $this->model("SchoolModel");
            $result = ($schoolModel->add($name, $date, $address, $kind)) ? "Thêm Trường Thành Công!" : "Thêm Trường Thất Bại!";
        }

        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/AddSchool",
            "School" => $school,
            "Result" => $result,
        ]);
    }

    function AddSubject()
    {
        $result = "";
        $subject = array();

        if (!empty($_POST)) {
            $grade = intval($_POST['grade']);
            $name = $_POST['name'] . " " . $_POST['grade'];
            $periods = intval($_POST['periods']);
            $test = intval($_POST['test']);
            $subject = array($name, $periods, $test, $grade);

            $subjectModel = $this->model("SubjectModel");
            $result = ($subjectModel->add($name, $periods, $test, $grade)) ? "Thêm Môn Học Thành Công!" : "Thêm Môn Học Thất Bại!";
        }

        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/AddSubject",
            "Subject" => $subject,
            "Result" => $result,
        ]);
    }

    function Update()
    {
        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/Update"
        ]);
    }

    function UpdateSchool()
    {
        $id = $name = $date = $address = $kind = $result = "";
        $status = false;
        $school = array();
        $allSchool = array();

        $schoolModel = $this->model("SchoolModel");
        $allSchool = $schoolModel->getAll();
        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $data = $schoolModel->get($id);

            if ($data->num_rows > 0) {
                while ($result = $data->fetch_assoc()) {
                    $name = $result['TEN_TRUONG'];
                    $date = $result['NGAY_THANH_LAP'];
                    $address = $result['DIA_CHI'];
                    $kind = $result['LOAI'];
                }
                $status = true;
                $school = array($id, $name, $date, $address, $kind, $status);
            } else {
                $error = "Không Tìm Thấy Thông Tin Trường!";
            }

            if (isset($_POST['updateConfirm'])) {
                $kind = $_POST['kind'];
                $date = $_POST['date'];
                $address = $_POST['address'];
                $name = ($kind == 'Trường Cơ Sở') ? ('THCS ' . $_POST['name']) : ('THCS Chuyên ' . $_POST['name']);

                if ($schoolModel->update($id, $name, $date, $address, $kind)) {
                    $result = "Cập Nhật Trường Thành Công!";
                } else {
                    $result = "Cập Nhật Trường Thất Bại!";
                }
            }
        }

        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/UpdateSchool",
            "School" => $school,
            "AllSchool" => $allSchool,
            "Result" => $result
        ]);
    }

    function UpdateSubject()
    {
        $id = $name = $periods = $test = $grade = $result = $error = "";
        $status = false;
        $subject = array();
        $allSubject = array();

        $subjectModel = $this->model("SubjectModel");
        $allSubject = $subjectModel->getAll();

        if (isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $data = $subjectModel->get($id);

            if ($data->num_rows > 0) {
                while ($result = $data->fetch_assoc()) {
                    $name = $result['TEN_MON'];
                    $periods = $result['SO_TIET'];
                    $test = $result['SO_BAIKT'];
                    $grade = $result['IDKHOI'];
                }
                $status = true;
                $subject = array($id, $name, $periods, $test, $grade, $status);
            } else {
                $error = "Không Tìm Thấy Thông Tin Môn Học!";
            }

            if (isset($_POST['updateConfirm'])) {
                $name = $_POST['name'] . " " . $_POST['grade'];
                $periods = intval($_POST['periods']);
                $test = intval($_POST['test']);
                $grade = $_POST['grade'];

                if ($subjectModel->update($id, $name, $periods, $test, $grade)) {
                    $result = "Cập Nhật Môn Học Thành Công!";
                } else {
                    $result = "Cập Nhật Môn Học Thất Bại!";
                }
            }
        }

        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/UpdateSubject",
            "Subject" => $subject,
            "AllSubject" => $allSubject,
            "Result" => $result
        ]);
    }

    function Delete()
    {
        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/Delete"
        ]);
    }

    function DeleteSubject()
    {
        $name = $grade = $periods = $test = $error = $result = "";
        $status = false;
        $subject = array();
        $allSubject = array();

        $subjectModel = $this->model("SubjectModel");
        $allSubject = $subjectModel->getAll();
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $data = $subjectModel->get($id);

            if ($data->num_rows > 0) {
                while ($result = $data->fetch_assoc()) {
                    $name = $result['TEN_MON'];
                    $periods = $result['SO_TIET'];
                    $test = $result['SO_BAIKT'];
                    $grade = $result['IDKHOI'];
                }
                $status = true;
                $subject =  array($id, $name, $periods, $test, $grade, $status);
            } else {
                $error = "Không Tìm Thấy Thông Tin Môn Học!";
            }

            if (isset($_POST['deleteConfirm'])) {
                if ($subjectModel->delete($id)) {
                    $result = "Xóa Môn Học Thành Công!";
                } else {
                    $result = "Xóa Môn Học Thất Bại!";
                }
            }
        }

        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/DeleteSubject",
            "Subject" => $subject,
            "AllSubject" => $allSubject,
            "Error" => $error,
            "Result" => $result,
        ]);
    }

    function Logout()
    {
        $this->view("/Page/Admin/Master", [
            "Page" => "Admin/Logout"
        ]);
    }
}
