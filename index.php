<?php
require_once 'addToTable.php';

$username = $_POST['username'];
$abonement = $_POST['sesionnnumber'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web QR</title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
<style type="text/css">
#canvas{
    display:none;
}
#v{
  width: 470px;
  height: 352px;
}
@page :left {
  margin-left: 3cm;
}

@page :right {
  margin-left: 4cm;
}
  * {
      box-sizing: border-box;
      -moz-box-sizing: border-box;
  }
  .page {
      width: 15cm;
      min-height: 10cm;
      padding: 0cm;
      margin: 1cm auto;
      /*border: 1px #D3D3D3 solid;*/
      /*border-radius: 5px;*/
      background: white;
      /*box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);*/
  }
  .subpage {
      padding: 1cm;
      border: 5px red solid;
      height: 256mm;
      outline: 2cm #FFEAEA solid;
  }
  
  @page {
      size: A4;
      margin: 0;
  }
  @media print {
      .page {
          margin: 0;
          border: initial;
          border-radius: initial;
          width: initial;
          min-height: initial;
          box-shadow: initial;
          background: initial;
          page-break-after: always;
      }
  }
 
  @media print
  {    
      .no-print, .no-print *
      {
          display: none !important;
      }
  }
  .qrcode{
    position: relative;
  }
  .logo{
    position:absolute;
   left:45%;
   top: 36%;
  transform: translateX(-50%);
  -webkit-transform: translateX(-50%);
  }

</style>

</head>

<body>
<form action="" method="POST">
  <div class="row">
      <a href="readqr.php" class="no-print" style="float: right;">Read qr</a>

      <div id="test2" class="col s12">
        <h4 style="color: blue; text-align: center;" class="no-print">Please create a user</h4>
        <div class="container">
          <div class="row">   
            <div class="no-print">
            <div class="col s6">
              <div class="row">
                <div class="input-field col s12">
                  <input  type="text" class="validate" id="mapo"   name="username">
                  <label for="password">User Name</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input  type="text" class="validate" id="mact" name="id">
                  <label for="email">ID user</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input type="number" class="validate" id="soluong"  name='sesionnnumber'>
                  <label for="email">Namber of season tickets</label>
                </div>
              </div>
              <div class="row" style="text-align: right;">
                <a class="waves-effect waves-light btn red" id="btntaoma"><i class="material-icons left">play_for_work</i>
                    <input type="button" name="create" value="create">
                </a>
              </div>
            </div>  
            </div>  
            <div class="col s6">
              <div class="page" id="print">
                <div class="row">
                  <div class="col s12">
                    <div style="border: 2px solid #000; border-radius: 5px; width: 245px;">
                    <div id="qrcode" class="qrcode" style="margin-top: 10px; margin-left: 20px;">
                      <img src="lib/logo.png" class="logo">
                    </div>
                    
                      <div style="margin-top: 10px; margin-left: 20px;">



                        <p id="lblmapo">User Name: </p>
                        <p id="lblsoluong">abonement: </p>
                      </div>
                    </div>
                    <button class="waves-effect waves-light btn green no-print" id="btnin" style="margin-top: 10px; margin-left: 75px;"><i class="material-icons left">print</i>Print QR_code</button>
                      <div><br><br><a class="waves-effect waves-light btn blue" id="btntaoma"><i class="material-icons left">CREATE ACCOUNT</i>
                          <input type="submit" name="createqr" value="create">
                      </a></div>
                  </div>
                  
                </div>  
              </div>              
            </div>
          </div>
        </div>
      </div>   

</div></form>
</body>
  <script type="text/javascript" src="createQR/jquery.min.js"></script>
  <script type="text/javascript" src="createQR/qrcode.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <!-- create qr code -->
  <script type="text/javascript">
    var qrcode = new QRCode(document.getElementById("qrcode"), {
      width : 200,
      height : 200
    });

    function makeCode () {    
      var mapo = $("#mapo").val();      
      var mact = $("#mact").val();      
      var soluong = $("#soluong").val();      
      var elText = mapo+'|' /*+ mact*/ + '|' + soluong+';';
      qrcode.makeCode(elText);

    }

    makeCode();

    $("#btntaoma").
      on("click", function () {
        makeCode();
        var mapo = $("#mapo").val();
        $("#lblmapo").text("Name: " + mapo);
        var mact = $("#mact").val();
        $("#lblmact").text("ID: " + mact);
        var soluong = $("#soluong").val();
        $("#lblsoluong").text("abonement: " + soluong);
     })

    $("#btnin").click(function(event) {
      window.print();
    });

  </script>
</html>