<?php
class QLHS extends Controller{

    public function __construct(){

        $this->LOPModel = $this->model("LOPModel");
        $this->HSModel = $this->model("HSModel");
        $this->ACModel = $this->model("ACModel");
    }

    public function fetchhs($idlop){

        $result = $this->HSModel->read($idlop);
        $rowcount=mysqli_num_rows($result);

        //View

        $this->view("fetchhs", [
            "idlop" => $idlop,
            "rowcount" => $rowcount,
            "readhs" => $result,
        ]);
    }

    public function read($idhs){

        //View

        $this->view("NQL", [
            "HS"=>"read",
            "readhs" => $this->HSModel->ReadHS($idhs),
        ]);
    }

    public function update($idhs){

        //View

        $this->view("NQL", [
            "HS"=>"update",
            "updatehs" => $this->HSModel->ReadHS($idhs),
            "lop" => $this->LOPModel->LOP(),
        ]);
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

        $this->view("NQL", [
            "HS"=>"delete",
            "tths" => $this->HSModel->TTHS($idhs),
        ]);
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
