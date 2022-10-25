<?php
if(isset($data["ketqua"]) AND isset($data["IDGV"]) AND isset($data["IDLOP"]))
{
    $idgv = $data["IDGV"];
    $idlop = $data["IDLOP"];
    $ketqua = $data["ketqua"];
    echo $idgv;
    echo $idlop;
    echo $ketqua;
    if($ketqua == "true")
    {
        header("location: http://localhost/quanly/GV/LOPDAY/$idgv/$idlop");
    }
}
else
{
    header("location: http://localhost/quanly/Home/Login");
}
?>