<?php
class LOGIN extends Controller{

    public function __construct(){

        $this->ACModel = $this->model("ACModel");
        $this->NQLModel = $this->model("NQLModel");
        $this->GVModel = $this->model("GVModel");
        $this->HSModel = $this->model("HSModel");
        $this->PCModel = $this->model("PCModel");
    }

    function TK(){

        // 1. Get data NQL nhap
        

        if(isset($_POST["save"])){
            
            $TK = $_POST["username"];
            $MK = $_POST["password"];
            $MK = md5($MK);
        
        // 2. kiem tra database co tai khoan mat khau khong

        $kq = $this->ACModel->KiemTra($TK, $MK);

        if($kq=='khongco'){

            $this->view("Login", [
                "Page"=>"FormLogin",
                "data"=>$kq,
            ]);
        }

        if($kq!='khongco'){

            $idac = $kq["IDAC"];

            if(strstr($TK,'QL')){

                
                $ttnql = $this->NQLModel->TTNQL($idac);

                $this->view("NQL", [
                    "Page"=>"rong",
                    "ttnql"=> $ttnql,

                ]);
            }
            if(strstr($TK,'GV')){

                $ttgv = $this->GVModel->GVTT($idac);

                $this->view("GV", [
                    "Page"=>"rong",
                    "ttgv"=> $ttgv,

                ]);
            }

            if(strstr($TK,'HS')){

                $tths = $this->HSModel->HSTT($idac);

                $this->view("HS", [
                    "Page"=>"rong",
                    "tths"=> $tths,

                ]);
            }
        }
        }
        unset($_POST["username"]);
        unset($_POST["password"]);
        
    }

}
?>