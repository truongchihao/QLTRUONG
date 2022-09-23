<?php
class QLHS extends Controller{

    public function __construct(){

        $this->LOPModel = $this->model("LOPModel");
        $this->HSModel = $this->model("HSModel");
        $this->ACModel = $this->model("ACModel");
        $this->TRUONGModel = $this->model("TRUONGModel");
    }

    public function SayHi(){

        $this->view("HS", [
            "HS"=>"read",
        ]);
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

        $this->view("HS", [
            "HS"=>"read",
            "readhs" => $this->HSModel->ReadHS($idhs),
        ]);
    }

    public function update($idhs){

        $row = $this->TRUONGModel->IDTRUONGHS($idhs);

        $idtruong = $row["IDTRUONG"];

        //View

        $this->view("HS", [
            "HS"=>"update",
            "updatehs" => $this->HSModel->ReadHS($idhs),
            "lop" => $this->LOPModel->LOP($idtruong),
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
            $idtruong = $_POST["idtruong"];
        
        // 2. update database bang gv

        $kq = $this->HSModel->UpdateHS($fullname, $birthday, $email, $idhs, $idlop);

        // 3. show chu thanh cong hay that bai

        $this->view("HS", [
            "HS"=>"update",
            "updatehs" => $this->HSModel->ReadHS($idhs),
            "lop" => $this->LOPModel->LOP($idtruong),
            "result" => $kq,
        ]);

        }
 
    }

    public function delete($idhs){

        //View

        $this->view("HS", [
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

        $this->view("HS", [
            "HS"=>"delete",
            "tths" => $this->HSModel->TTHS($idhs),
            "result" => $kq,
        ]);

        }
 
    }
}
?>
