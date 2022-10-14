<?php
class UPLOAD extends Controller{

    public function __construct(){

        $this->TLModel = $this->model("TLModel");
		$this->LOPModel = $this->model("LOPModel");
    }

    function tailieu(){

        //View
        if(isset($_POST["save"]))
        {
            $idlop = $_POST["idlop"];
            $this->view("GV", [
                "TAILIEU"=>"upload",
                "data"=>$idlop,
            ]);
        }
        
    }

    function uploadtailieu(){

        if(isset($_POST["save"]))
	    {
            $idgv = $_POST["idgv"];
            $idlop = $_POST["idlop"];
            $ten = $_POST["optradio"];

			$tmp_name = $_FILES["myfile"]["tmp_name"];
			$folder = "../quanly/mvc/models/TAILIEU";
			$name = $_FILES["myfile"]["name"];
			$size = $_FILES["myfile"]["size"];
			$path = pathinfo($name);
			$type = strtolower($path['extension']);
            echo $type;
			$filetype = $path['extension'];
			$filename = $path['filename'];
			$uploadOk = 1;
			
			// Check file size
			if ($size > 10000000) {
  				echo '<p id="loi">Kích thước file vượt quá 10mb</p></br>';
                $checksize = 0;
  				$uploadOk = 0;
			}
			
			// Allow certain file formats
			$typefile = array(  'pdf', 
                                'zip', 
                                'rar',
                                'docx',
                                'xlsx',
                                'pptx'
                            );
            if (!in_array($type, $typefile))
            {
  				echo '<p id="loi">Chưa đúng định dạng</p></br>';
                $checktype = 0;
  				$uploadOk = 0;
			}		
			
			if(file_exists($folder.'/'.$name))
  			{
      			for($i=1; $i<1000; $i++)
				{
					$name = $filename.'('.$i.')'.'.'.$filetype;
					if(file_exists($folder.'/'.$name))
					{
						
					}
					else
					{
                        if($uploadOk == 1)
                        {
						if($this->uploadfile($tmp_name, $folder, $name) == 1)
						{
							echo '<p>Upload thành công</p></br>';
                            $thoigian = date("Y-m-d");
                            echo $thoigian;
                            $this->TLModel->InsertTL($ten, $thoigian, $name, $idgv, $idlop);
						}
						else
						{
							echo '<p id="loi">Upload thất bại</p></br>';
						}
						break;
                        }
					}
				}
  			}
			else
			{
                if($uploadOk == 1)
                {
				if($this->uploadfile($tmp_name, $folder, $name) == 1)
				{					
					echo '<p>Upload thành công</p></br>';
                    $thoigian = date("Y-m-d");
                    echo $thoigian;
                    $this->TLModel->InsertTL($ten, $thoigian, $name, $idgv, $idlop);
				}
				else
				{
					echo '<p id="loi">Upload thất bại</p></br>';
				}
                }
			}
		}
	
	}

    function uploadfile($tmp_name, $folder, $name)
	{
		$name = $folder.'/'.$name;
		if(move_uploaded_file($tmp_name, $name))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
}
?>