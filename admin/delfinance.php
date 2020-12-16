<?php

    require('DBConnect.php');
    require('logincheck.php');

    

    if(isset($_GET["year"])){

        $query = "SELECT * from finance WHERE finance_id =".$_GET["year"]." ;";
        $result = mysqli_query($connection, $query);
    
        if (mysqli_num_rows($result) == 1){
            
            $query = "DELETE FROM finance WHERE finance_id =".$_GET["year"]." ;";
            $result = mysqli_query($connection, $query);

            if (mysqli_query($connection, $query)){
                header('Location: finances.php?delete=successful');
            }
            else{
                header('Location: finances.php?delete=unsuccessful');
            }

        }
        else{
            header('Location: finances.php');
        }

    }
    else{
        header('Location: finances.php');
    }
    



    


?>