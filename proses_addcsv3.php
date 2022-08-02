<?php

include "koneksi.php";

        if(isset($_POST['Import'])){
            $dataname   = $_FILES['file']['name'];
            $datatmp    = $_FILES['file']['tmp_name'];
            $exe        = pathinfo($dataname, PATHINFO_EXTENSION);
            $folder     = 'file/';

            if($exe=='csv'){
                $upload = move_uploaded_file($datatmp, $folder.$dataname);
                if($upload){
                    $open = fopen($folder.$dataname, 'r');
                    while(($row = fgetcsv($open, 1200))!==FALSE ){
                        $sql = "INSERT INTO tb_asset VALUES ('".$row[0]."','".$row[1]."','".$row[2]."','".$row[3]."','".$row[4]."','".$row[5]."','".$row[6]."','".$row[7]."','".$row[8]."','".$row[9]."','".$row[10]."','".$row[11]."','".$row[12]."','".$row[13]."','".$row[14]."','".$row[15]."','".$row[16]."')";
                        mysqli_query($db,$sql);
                    }
                }else{
                    echo"Gagal diupload";
                }
            }else{
                echo"Bukan File CSV";
            }
        }
?>