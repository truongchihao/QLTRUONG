<?php
class QLHS extends Controller{

    public function __construct(){

        $this->LOPModel = $this->model("LOPModel");
        $this->HSModel = $this->model("HSModel");
        $this->ACModel = $this->model("ACModel");
    }

    public function fetchhs($idlop){

        //$idlop=preg_quote($idlop);

        if(is_numeric($idlop))
        {
            $result = $this->HSModel->read($idlop);
            $rowcount=mysqli_num_rows($result);

            //View

            $this->view("fetchhs", [
                "idlop" => $idlop,
                "rowcount" => $rowcount,
                "readhs" => $result,
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }

    public function read($idhs){

        //View
        //$idhs=preg_quote($idhs);

        if(is_numeric($idhs))
        {
            $this->view("NQL", [
                "HS"=>"read",
                "readhs" => $this->HSModel->ReadHS($idhs),
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }

    public function update($idhs){

        //View
        //$idhs=preg_quote($idhs);

        if(is_numeric($idhs))
        {
            $this->view("NQL", [
                "HS"=>"update",
                "updatehs" => $this->HSModel->ReadHS($idhs),
                "lop" => $this->LOPModel->LOP(),
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }

    public function UpdateHS(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $fullname = $_POST["fullname"];
            $birthday = $_POST["birthday"];
            $email = $_POST["email"];
            $idhs = $_POST["idhs"];
            $idlop = $_POST["idlop"];
        
        // 2. update database bang gv

        $kq = $this->HSModel->UpdateHS($fullname, $birthday, $email, $idhs, $idlop);

        // 3. show chu thanh cong hay that bai

        $this->view("NQL", [
            "HS"=>"update",
            "updatehs" => $this->HSModel->ReadHS($idhs),
            "lop" => $this->LOPModel->LOP(),
            "result" => $kq,
        ]);

        }
 
    }

    public function delete($idhs){

        //View
        //$idhs=preg_quote($idhs);

        if(is_numeric($idhs))
        {
            $this->view("NQL", [
                "HS"=>"delete",
                "tths" => $this->HSModel->TTHS($idhs),
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }

    public function DeleteHS(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $idhs = $_POST["idhs"];
            $idac = $_POST["idac"];
        
        // 2. update database bang gv

        $kq1 = $this->HSModel->DeleteHS($idhs);
        $kq2 = $this->ACModel->DeleteAC($idac);

        if($kq1==$kq2){
            $kq=true;
        }else{
            $kq=false;
        }
        // 3. show chu thanh cong hay that bai

        $this->view("NQL", [
            "HS"=>"delete",
            "tths" => $this->HSModel->TTHS($idhs),
            "result" => $kq,
        ]);

        }
 
    }
}
?>
