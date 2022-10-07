<?php
class HS extends Controller{

    function Home(){

        //View

        $this->view("HS", [
            "Page"=>"rong",
        ]);
    }
}
?>