<?php
class QLLOP extends Controller{

    public function __construct(){

        $this->LOPModel = $this->model("LOPModel");
        $this->KHOIModel = $this->model("KHOIModel");
        $this->TRUONGModel = $this->model("TRUONGModel");
    }

    public function SayHi(){

        $this->view("GV", [
            "GV"=>"read",
        ]);
    }

    public function fetchlop($idtruong){

        $result = $this->LOPModel->read($idtruong);
        $rowcount=mysqli_num_rows($result);

        //View

        $this->view("fetchlop", [
            "idtruong" => $idtruong,
            "rowcount" => $rowcount,
            "readlop" => $result,
        ]);
    }

    public function insert($idtruong){

        //View

        $this->view("LOP", [
            "LOP"=>"insert",
            "khoi" => $this->KHOIModel->KHOI($idtruong),
        ]);
    }

    public function InsertLOP(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $tenlop = $_POST["tenlop"];
            $soluong = $_POST["soluong"];
            $idkhoi = $_POST["idkhoi"];
            $idtruong = $_POST["idtruong"];
            
        
        // 2. update database bang gv

        $kq = $this->LOPModel->InsertLOP($tenlop, $soluong, $idkhoi);

        // 3. show chu thanh cong hay that bai

        $this->view("LOP", [
            "LOP"=>"insert",
            "khoi" => $this->KHOIModel->KHOI($idtruong),
            "result" => $kq,
        ]);

        }
 
    }

    public function read($idgv){

        //View

        $this->view("GV", [
            "GV"=>"read",
            "readgv" => $this->GVModel->ReadGV($idgv),
        ]);
    }

    public function update($idlop){

        $row = $this->TRUONGModel->IDTRUONGLOP($idlop);

        $idtruong = $row["IDTRUONG"];

        if($idlop!=$idtruong*111111)
        {
            //View

        $this->view("LOP", [
            "LOP"=>"update",
            "updatelop" => $this->LOPModel->ReadLOP($idlop),
            "khoi" => $this->KHOIModel->KHOI($idtruong),
        ]);
        }else{

            $this->view("NQL", [
                "Page"=>"TABLELOP",
                "thongbao"=>'loi',
            ]);

        }
        
    }

    public function UpdateLOP(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $tenlop = $_POST["tenlop"];
            $soluong = $_POST["soluong"];
            $idkhoi = $_POST["idkhoi"];
            $idlop = $_POST["idlop"];
            $idtruong = $_POST["idtruong"];
        
        // 2. update database bang gv

        $kq = $this->LOPModel->UpdateLOP($tenlop, $soluong, $idkhoi, $idlop);

        // 3. show chu thanh cong hay that bai

        $this->view("LOP", [
            "LOP"=>"update",
            "updatelop" => $this->LOPModel->ReadLOP($idlop),
            "khoi" => $this->KHOIModel->KHOI($idtruong),
            "result" => $kq,
        ]);

        }
 
    }

    public function delete($idlop){

        $row = $this->TRUONGModel->IDTRUONGLOP($idlop);

        $idtruong = $row["IDTRUONG"];

        if($idlop!=$idtruong*111111)
        {
            //View

        $this->view("LOP", [
            "LOP"=>"delete",
            "ttlop" => $this->LOPModel->TTLOP($idlop),
        ]);
        }else{

            $this->view("NQL", [
                "Page"=>"TABLELOP",
                "thongbao"=>'loixoa',
            ]);

        }

        
    }

    public function DeleteLOP(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $idlop = $_POST["idlop"];
        
        // 2. update database bang gv

        $kq = $this->LOPModel->DeleteLOP($idlop);

        // 3. show chu thanh cong hay that bai

        $this->view("LOP", [
            "LOP"=>"delete",
            "ttlop" => $this->LOPModel->TTLOP($idlop),
            "result" => $kq,
        ]);

        }
 
    }
}
?>
