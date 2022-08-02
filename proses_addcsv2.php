<?php

    include "koneksi.php";

    if(isset($_POST["Import"])){
            
            $filename=$_FILES["file"]["tmp_name"];		

            if($_FILES["file"]["size"] > 0)
            {
                $file = fopen($filename, "r");
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                {

                $sql = "INSERT into tb_asset (hostname,Whoami,serial_number,OS_name,OS_version,system_manufacturer,system_model,type,processor,memory,business_unit,disk_size1,disk_size2,department,lokasi,email) 
                    values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."','".$getData[16]."')";
                    $result = mysqli_query($db, $sql);
                    if(!isset($result))
                    {
                        echo "<script type=\"text/javascript\">
                                alert(\"Invalid File:Please Upload CSV File.\");
                                window.location = \"#.php\"
                            </script>";		
                    }
                    else {
                        echo "<script type=\"text/javascript\">
                            alert(\"CSV File has been successfully Imported.\");
                            window.location = \"#.php\"
                        </script>";
                    }
                }
                
                fclose($file);	
            }
        }	 


 ?>