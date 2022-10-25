<h1>MON <?php 
        if(isset($data["LOPHS"]) && $data["LOPHS"]["IDHS"] == $_SESSION["tths"]["IDHS"]){
            $tthslop = $data["LOPHS"];
            echo $tthslop["TEN_MON"];
        }
        else
        {
            header("location: http://localhost/quanly/Home/Login");
        }
        ?>
</h1>
<div class="container box">
    <div class="border border-success border-end-0 border-start-0 border-top-0">
        <h3>Tài liệu</h3>

    </div>
    <div class="m-5">
        <table width="500">
  			<tbody>
    			<tr>
      				<td></td>
      				<td></td>
					<td></td>			
    			</tr>
                <?php
                if(isset($data['TL']))
                {
                    while($row = mysqli_fetch_array($data['TL']))
                    {
                            $file = $row['NAME_FILE'];
                            $idgv = $row['IDGV'];
                            $idlop = $row['IDLOP'];
                            echo '<tr>
      							<td><p>'.$file.'</p></td>
      							<td><a download="'.$file.'" href='.$file.'">Tải file</a></td>
    						</tr>';
                    }
                }
                ?>
	  	    </tbody>
		</table>
    </div>

    <div class="border border-primary border-end-0 border-start-0 border-top-0">
        <h3>Bài tập</h3>
    </div>
    <div class="m-5">
        <table width="500">
  			<tbody>
    			<tr>
      				<td></td>
      				<td></td>
					<td></td>			
    			</tr>
                <?php
                if(isset($data['BT']))
                {
                    while($row = mysqli_fetch_array($data['BT']))
                    {
                            $file = $row['NAME_FILE'];
                            $idgv = $row['IDGV'];
                            $idlop = $row['IDLOP'];
                            echo '<tr>
      							<td><p>'.$file.'</p></td>
      							<td><a download="'.$file.'" href='.$file.'">Tải file</a></td>
    						</tr>';
                    }
                }
                ?>
	  	    </tbody>
		</table>
    </div>

<div>