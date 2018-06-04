<?php
$link = mysqli_connect('localhost', 'root', '', 'sport_life');



if(isset($_POST['createqr']))
{
    addtotable();
}

function addtotable()
{
    global $link;

    $name=$_POST['username'];
    $id=$_POST['id'];
    $sesionnnumber=$_POST['sesionnnumber'];
    $curdate=date("Y-m-d");
    //$enddate=date("Y-m-d")("Y-m-d", strtotime("+30 day"));


    $query='INSERT INTO tickets2  VALUES ( NULL, "'.$id.'", "'.$name.'", "'.$sesionnnumber.'","'.$curdate.'", " ", "2018-10-12")';
    mysqli_query($link, $query);
}

//$abn=11
//$old_id = 1;
 //$query='UPDATE tickets SET abon="'.$abn.'" WHERE ID = old_id';
