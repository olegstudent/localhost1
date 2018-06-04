<?php
    //require "webqr.js";

    $id= $_POST['id'];
    $add_data=0;
    $add_data=$_POST['add_data'];

    $link = mysqli_connect('localhost', 'root', '', 'sport_life');



        $query = "SELECT * FROM tickets2 WHERE ID=".$id ;
        $result = mysqli_query($link, $query);
        $data = mysqli_fetch_all($result, 1);

        $old_valid = $data[0]['valid'];
        $old_valid += date("H:i:s") + "   " + date("m.d.y") + "; ";
//". $old_valid . "
        $query2 = 'UPDATE `tickets2` SET `valid` = " loh" WHERE `tickets2`.`ID` = 1';
        $result2 = mysqli_query($link, $query2);
        //$data = mysqli_fetch_all($result2, 1);
/*
        $query = "SELECT * FROM tickets2 WHERE ID= 124";
        $result = mysqli_query($link, $query);
        $data = mysqli_fetch_all($result, 1);

        $uesrnamep = $data[0]['Name'];
        $sessionnumberp = $data[0]['abon'];
        $validationp = $data[0]['valid'];

        $data=0;*/
?>

<div><?echo $id?>123425</div>
