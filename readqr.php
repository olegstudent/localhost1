<?php
?>
<!DOCTYPE html>
<!-- media.navigator.permission.disabled -->
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
.grayscale{

    -webkit-filter:grayscale(1);

    -moz-filter:grayscale(1);

    -o-filter:grayscale(1);

    -ms-filter:grayscale(1);

    filter:grayscale(1);

}

 

.sepia{

    -webkit-filter:sepia(0.8);

    -moz-filter:sepia(0.8);

    -o-filter:sepia(0.8);

    -ms-filter:sepia(0.8);

    filter:sepia(0.8);

}

.blur{

    -webkit-filter:blur(3px);

    -moz-filter:blur(3px);

    -o-filter:blur(3px);

    -ms-filter:blur(3px);

    filter:blur(3px);

}

 

.brightness{

    -webkit-filter:brightness(0.3);

    -moz-filter:brightness(0.3);

    -o-filter:brightness(0.3);

    -ms-filter:brightness(0.3);

    filter:brightness(0.3);

}

 

.contrast{

    -webkit-filter:contrast(0.5);

    -moz-filter:contrast(0.5);

    -o-filter:contrast(0.5);

    -ms-filter:contrast(0.5);

    filter:contrast(0.5);

}

 

.hue-rotate{

    -webkit-filter:hue-rotate(90deg);

    -moz-filter:hue-rotate(90deg);

    -o-filter:hue-rotate(90deg);

    -ms-filter:hue-rotate(90deg);

    filter:hue-rotate(90deg);

}

 

.hue-rotate2{

    -webkit-filter:hue-rotate(180deg);

    -moz-filter:hue-rotate(180deg);

    -o-filter:hue-rotate(180deg);

    -ms-filter:hue-rotate(180deg);

    filter:hue-rotate(180deg);

}

 

.hue-rotate3{

    -webkit-filter:hue-rotate(270deg);

    -moz-filter:hue-rotate(270deg);

    -o-filter:hue-rotate(270deg);

    -ms-filter:hue-rotate(270deg);

    filter:hue-rotate(270deg);

}

 

.saturate{

    -webkit-filter:saturate(10);

    -moz-filter:saturate(10);

    -o-filter:saturate(10);

    -ms-filter:saturate(10);

    filter:saturate(10);

}

 

.invert{

    -webkit-filter:invert(1);

    -moz-filter:invert(1);

    -o-filter: invert(1);

    -ms-filter: invert(1);

    filter: invert(1);

}



</style>
<script type="text/javascript" src="createQR/jquery.min.js"></script>

<script type="text/javascript" charset="utf-8" src="lib/llqrcode.js"></script>
<!-- <script type="text/javascript">load();</script> -->


<script type="text/javascript" charset="utf-8" src="lib/webqr.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
  <div class="row">
          <a href="login.php" style="float: right;">create qr</a>
      <div id="test1" class="col s12">
        <div class="container">
          <div class="row">
            <h4 style="color: blue; text-align: center;">put your qr</h4>
            <div style="margin: 0 auto; text-align: center; width: 500px" class="z-depth-2">
              <div id="mainbody" style="display: inline;">
              
              <td><img class="selector" id="webcamimg" onclick="setwebcam()" align="left" style="opacity: 1;"></td>
              <td><img class="selector" id="qrimg" onclick="setimg()" align="right" style="opacity: 0.2;"></td></tr>
              <tr><td colspan="2" align="center">
              <div id="outdiv" style="margin-top: 15px; padding: 10px; margin-left: 0px;"><video id="v" autoplay=""></video></div></td></tr>
              </tbody></table>
              </td>
              </tr>
              <tr><td colspan="3" align="center">

              </td></tr>
              <tr><td colspan="3" align="center">
              <div style="text-align:  right; margin-right: 10px;">
                <a class="waves-effect waves-light btn blue" id="loginbutton" onclick="load();"><i class="material-icons left">play_circle_outline</i>LogIn</a>
                <a class="waves-effect waves-light btn red" onclick="stop();"><i class="material-icons left">not_interested</i>Close</a>
              </div>
              <div class="card-panel grey lighten-5 z-depth-1">

                  
              <div id="username" name="username" style="padding-top: 10px;">  <span ></span> </div>
              <div id="mact" ></div>
              <!--<div id="sessionnumber" style="padding-bottom: 10px;" name="sessionnumber"><span></span></div>
              <div id="validation" name="validation" style="padding-bottom: 10px;" ><span></span></div>-->
			  <br>
			  <div id="info"></div>
			  <div id="infoValid"></div>
			  <button class="waves-effect waves-light btn green" id="showB">Show information</button>
            
          </div>
              

              <canvas id="canvas" width="470" height="353"></canvas>
            </div>
                
          </div> 
        </div>        
      </div>
         
    </div>
  
  
<script>
$(document).ready(function(){
			$('#showB').on('click', function(e){		
				var tmp = $('#user').text();
				var formData = new FormData();
				formData.append('IDclient', tmp);
					$.ajax({
						url: "lib/infodata.php",
						method: "POST",
						data: formData,
						contentType:false,
						cache:false,
						processData: false,
						dataType: 'JSON',
						success: function(data)
						{
							//$('#infoAbon').text(data[0]);
							//$('#infoValid').text(data[1]);
							/*  $.each(data, function(index,value)
							{
								$('#info').text(value);
							});  */
							var output = "";
							
							$.each(data, function(key,value){
								
								output+= value + "<br>";
							});
							$('#info').html(output);
						}
					});
			}); 
});
</script>

</body>
  
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
 
</html>