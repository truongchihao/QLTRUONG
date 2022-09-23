<?php
class Home extends Controller{
    function SayHi(){

        $teo = $this->model("GiaoVienModel");
        echo $teo->GetGV();
    }

    function Show($a, $b){

        //Model
        $teo = $this->model("GiaoVienModel");
        $tong = $teo->Tong($a, $b);

        //View

        $this->view("GV", [
            "Page"=>"news",
            "Number"=>$tong,
            "Mau"=>"red",
            "SoThich"=>["A", "B", "C"],
            "GV" => $teo->GiaoVien()
        ]);
    }

    function Login(){
        //View

        $this->view("Login", [
            
        ]);

        
    }


}
?>