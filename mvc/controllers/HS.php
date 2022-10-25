<?php
class HS extends Controller{

    public function __construct(){

        $this->PCModel = $this->model("PCModel");
        $this->TLModel = $this->model("TLModel");
    }

    function Home(){

        //View

        $this->view("HS", [
            "Page"=>"rong",
        ]);
    }

    function MON($idhs){

        //View
        //$idgv=preg_quote($idgv);
        if(is_numeric($idhs))
        {
            $this->view("HS", [
                "Page"=>"TABLEHSLOP",
                "HSLOP" => $this->PCModel->dslophoc($idhs),
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }
        
    }

    function TAILIEU($idhs, $idgv, $idlop){

        //View
        // $idgv=preg_quote($idgv);
        // $idlop=preg_quote($idlop);

        if(is_numeric($idgv) AND is_numeric($idlop) AND is_numeric($idhs))
        {
            $result = $this->PCModel->dslophoc($idhs);
            $row = mysqli_fetch_array($result);

            $result1 = $this->TLModel->readtl($idgv, $idlop);
            $result2 = $this->TLModel->readbt($idgv, $idlop);


            $this->view("HS", [
            "Page"=>"TAILIEU",
            "LOPHS"=>$row,
            "TL"=>$result1,
            "BT"=>$result2,
            ]);
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }

        
    }
}
?>