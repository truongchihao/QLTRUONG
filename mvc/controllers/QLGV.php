<?php
class QLGV extends Controller{

    public function __construct(){

        $this->GVModel = $this->model("GVModel");
        $this->MHModel = $this->model("MHModel");
        $this->ACModel = $this->model("ACModel");
    }

    public function fetchgv($idmon){

        //$idmon=preg_quote($idmon);

        if(is_numeric($idmon))
        {
            $result = $this->GVModel->GVIDMON($idmon);
            $rowcount=mysqli_num_rows($result);

            //View

            $this->view("fetchgv", [
                "idmon" => $idmon,
                "rowcount" => $rowcount,
                "readgv" => $result,
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }

    public function read($idgv){

        //View
        //$idgv=preg_quote($idgv);

        if(is_numeric($idgv))
        {
            $this->view("NQL", [
                "GV"=>"read",
                "readgv" => $this->GVModel->ReadGV($idgv),
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }

    public function update($idgv){

        //View
        //$idgv=preg_quote($idgv);

        if(is_numeric($idgv))
        {
            $this->view("NQL", [
                "GV"=>"update",
                "updategv" => $this->GVModel->ReadGV($idgv),
                "monhoc" => $this->MHModel->MH(),
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }

    public function UpdateGV(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $fullname = $_POST["fullname"];
            $birthday = $_POST["birthday"];
            $email = $_POST["email"];
            $idmon = $_POST["chuyenmon"];
            $chucvu = $_POST["chucvu"];
            $idgv = $_POST["idgv"];
        
        // 2. update database bang gv

        $kq = $this->GVModel->UpdateGV($fullname, $birthday, $email, $idmon, $chucvu, $idgv);

        // 3. show chu thanh cong hay that bai

        $this->view("NQL", [
            "GV"=>"update",
            "updategv" => $this->GVModel->ReadGV($idgv),
            "monhoc" => $this->MHModel->MH(),
            "result" => $kq,
        ]);

        }
 
    }

    public function delete($idgv){

        //View
        //$idgv=preg_quote($idgv);

        if(is_numeric($idgv))
        {
            $this->view("NQL", [
                "GV"=>"delete",
                "ttgv" => $this->GVModel->TTGV($idgv),
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }

    public function DeleteGV(){

        // 1. Get data NQL nhap

        if(isset($_POST["save"])){
            
            $idgv = $_POST["idgv"];
            $idac = $_POST["idac"];
        
        // 2. update database bang gv

        $kq1 = $this->GVModel->DeleteGV($idgv);
        $kq2 = $this->ACModel->DeleteAC($idac);

        if($kq1==$kq2){
            $kq=true;
        }else{
            $kq=false;
        }
        // 3. show chu thanh cong hay that bai

        $this->view("NQL", [
            "GV"=>"delete",
            "ttgv" => $this->GVModel->TTGV($idgv),
            "result" => $kq,
        ]);

        }
 
    }
}
?>
