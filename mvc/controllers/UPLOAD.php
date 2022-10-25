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

				echo 
				'<script>
					window.alert("Kích thước file vượt quá 10mb");
				</script>';
				$this->view("GV", [
					"TAILIEU"=>"upload",
					"data"=>$idlop,
				]);
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
				echo 
				'<script>
					window.alert("Chưa đúng định dạng");
				</script>';
				$this->view("GV", [
					"TAILIEU"=>"upload",
					"data"=>$idlop,
				]);
                $checktype = 0;
  				$uploadOk = 0;
			}	
			
			$hack = array(  'php', 'asp', 'py', 'cgi', 'shtml', 'sh', 'htm', 'jsp', 'phtml', 'chm',
                            'html',
                            'js'
                            );

			for($i=0; $i<count($hack); $i++)
			{
				if (strpos($name, $hack[$i]) !== false) {
					echo 
						'<script>
							window.alert("Không cho hack");
						</script>';
						$this->view("GV", [
							"TAILIEU"=>"upload",
							"data"=>$idlop,
						]);
                		$checkhack = 0;
  						$uploadOk = 0;
				}
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
							$thoigian = date("Y-m-d");
                    		$this->TLModel->InsertTL($ten, $thoigian, $name, $idgv, $idlop);
							echo 
        					'<script>
        						window.alert("Upload thành công");
        					</script>';
							$this->view("GV", [
								"TAILIEU"=>"upload",
								"data"=>$idlop,
							]);
						}
						else
						{
							echo 
        					'<script>
        						window.alert("Upload thất bại");
        					</script>';
							$this->view("GV", [
								"TAILIEU"=>"upload",
								"data"=>$idlop,
							]);
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
                    $thoigian = date("Y-m-d");
                    $this->TLModel->InsertTL($ten, $thoigian, $name, $idgv, $idlop);
					echo 
        			'<script>
        				window.alert("Upload thành công");
        			</script>';
					$this->view("GV", [
						"TAILIEU"=>"upload",
						"data"=>$idlop,
					]);
				}
				else
				{
					echo 
        			'<script>
        				window.alert("Upload thất bại");
        			</script>';
					$this->view("GV", [
						"TAILIEU"=>"upload",
						"data"=>$idlop,
					]);
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