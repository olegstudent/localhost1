// QRCODE reader Copyright 2011 Lazar Laszlo
// http://www.webqr.com

var gCtx = null;
var gCanvas = null;
var c=0;
var stype=0;
var gUM=false;
var webkit=false;
var moz=false;
var v=null;
//var userid;

var imghtml='<div id="qrfile"><canvas id="out-canvas" width="470" height="352"></canvas>'+
    '<div id="imghelp">drag and drop a QRCode here'+
	'<br>or select a file'+
	'<input type="file" onchange="handleFiles(this.files)"/>'+
	'</div>'+
'</div>';

var vidhtml = '<video id="v" autoplay></video>';

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}
function drop(e) {
  e.stopPropagation();
  e.preventDefault();

  var dt = e.dataTransfer;
  var files = dt.files;
  if(files.length>0)
  {
	handleFiles(files);
  }
  else
  if(dt.getData('URL'))
  {
	qrcode.decode(dt.getData('URL'));
  }
}

function handleFiles(f)
{
	var o=[];
	
	for(var i =0;i<f.length;i++)
	{
        var reader = new FileReader();
        reader.onload = (function(theFile) {
        return function(e) {
            gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

			qrcode.decode(e.target.result);
        };
        })(f[i]);
        reader.readAsDataURL(f[i]);	
    }
}

function initCanvas(w,h)
{
    gCanvas = document.getElementById("canvas");
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
}


function captureToCanvas() {
    if(stype!=1)
        return;
    if(gUM)
    {
        try{
            gCtx.drawImage(v,0,0);
            try{
                qrcode.decode();
            }
            catch(e){       
                console.log(e);
                setTimeout(captureToCanvas, 20);
            };
        }
        catch(e){       
                console.log(e);
                setTimeout(captureToCanvas, 20);
        };
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function read(a)
{
    // var html="<br>";
    // // if(a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
    // //     html+="<a target='_blank' href='"+a+"'>"+a+"</a><br>";
    // html+="<b>"+htmlEntities(a)+"</b><br><br>";
    var string = a,
        arr = string.split('|'),
        i;

    for(i in arr){
        
        document.getElementById("username").innerHTML= "<b><u>User Name:</u> <span id=user>" + arr[0] + "</span></b>";
        //document.getElementById("sessionnumber").innerHTML= "<b><u>Abonement:</u> " + arr[2] + "</b>";

       //userid = arr[1];

     /* $.ajax({
            type: "POST",
            url: "infodata.php",
            data: 'id'
       });*/

      //document.location.href='http://localhost/lib/getdata.php';
       // window.open("http://localhost/lib/getdata.php");

        //document.getElementById("session").innerHTML= "<b><u>Abonement:</u> " + "<?php echo $usernamep ?>" + "</b>";
		/*var myObj, x, txt="";
		var obj = {"userid":arr[1]};
		var dbParam = JSON.stringify(obj);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function()
		{
			if (this.readyState == 4 && this.status == 200) {
				myObj = JSON.parse(this.responseText);
				for (x in myObj) {
					txt += myObj[x].name + "<br>";
				}
				document.getElementById("sessionnumber").innerHTML = "DB User Name:" + txt;
			}
		};
		
		xmlhttp.open("POST", "infodata.php", true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("x=" + dbParam);*/
	//id_client();	
		
	//	$(document).ready(function(){
		//	$('#loginbutton').on('click', function(e){
	//function id_client(){		
	//			var tmp = arr[1];
	//			var formData = new FormData();
	//			formData.append('IDclient', tmp);
	//				$.ajax({
	//					url: "infodata.php",
	//					method: "POST",
	//					data: formData,
	//					contentType:false,
	//					cache:false,
	//					processData: false,
	//					success: function(data)
	//					{
	//						$('#sessionnumber').text(data);
	//					}
	//				});
	//		});
		//});
		

    }
	
    var audio = new Audio('lib/beep.ogg');
    audio.play();
    
}	

  /* function id_client(){		
				var tmp = 'aaa';//arr[1];
				var formData = new FormData();
				formData.append('IDclient', tmp);
					$.ajax({
						url: "infodata.php",
						method: "POST",
						data: formData,
						contentType:false,
						cache:false,
						processData: false,
						success: function(data)
						{
							$('#IDC').text(data);
						}
					});
			});   */

function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}
var myStream;
function success(stream) {
    v.src = window.URL.createObjectURL(stream);
    gUM=true;
    setTimeout(captureToCanvas, 20);
    myStream = stream;
}
function stop()	{
   var track = myStream.getTracks()[0];  // if only one media track
// ...
track.stop();
}

function error(error) {
    gUM=false;
    return;
}

function load()
{
	if(isCanvasSupported() && window.File && window.FileReader)
	{
		initCanvas(800, 600);
		qrcode.callback = read;
		document.getElementById("mainbody").style.display="inline";
        setwebcam();
        // Custom video filters
        //    var iFilter = 0;
        //    var filters = [
        //        'grayscale',
        //        'sepia',
        //        'blur',
        //        'brightness',
        //        'contrast',
        //        'hue-rotate',
        //        'hue-rotate2',
        //        'hue-rotate3',
        //        'saturate',
        //        'invert',
        //        'none'
        //    ];
        // v.className = '';
        // canvas.className = '';
        // // var effect = filters[iFilter++ % filters.length]; // Loop through the filters.
        // // if (effect) {
        //     v.classList.add('invert');
        //     canvas.classList.add('invert');
	}
	else
	{
		document.getElementById("mainbody").style.display="inline";
		document.getElementById("mainbody").innerHTML='<p id="mp1">QR code scanner for HTML5 capable browsers</p><br>'+
        '<br><p id="mp2">sorry your browser is not supported</p><br><br>'+
        '<p id="mp1">try <a href="http://www.mozilla.com/firefox"><img src="firefox.png"/></a> or <a href="http://chrome.google.com"><img src="chrome_logo.gif"/></a> or <a href="http://www.opera.com"><img src="Opera-logo.png"/></a></p>';
	}
}

function setwebcam()
{
    document.getElementById("username").innerHTML="";
    document.getElementById("mact").innerHTML="";
	//document.getElementById("sessionnumber").innerHTML="";
    if(stype==1)
    {
        setTimeout(captureToCanvas, 20);    
        return;
    }
    
    var n=navigator;
    document.getElementById("outdiv").innerHTML = vidhtml;
    v=document.getElementById("v");

    if(n.getUserMedia)
        n.getUserMedia({video: true, audio: false}, success, error);
    else
    if(n.mediaDevices.getUserMedia)
        n.mediaDevices.getUserMedia({video: { facingMode: "environment"} , audio: false})
            .then(success)
            .catch(error);
    else
    if(n.webkitGetUserMedia)
    {
        webkit=true;
        n.webkitGetUserMedia({video:true, audio: false}, success, error);
    }
    else
    if(n.mozGetUserMedia)
    {
        moz=true;
        n.mozGetUserMedia({video: true, audio: false}, success, error);
    }
   

        
    // }
    //document.getElementById("qrimg").src="qrimg2.png";
    //document.getElementById("webcamimg").src="webcam.png";
    document.getElementById("qrimg").style.opacity=0.2;
    document.getElementById("webcamimg").style.opacity=1.0;

    stype=1;
    setTimeout(captureToCanvas, 20);
}
function setimg()
{
	document.getElementById("result").innerHTML="";
    if(stype==2)
        return;
    document.getElementById("outdiv").innerHTML = imghtml;
    //document.getElementById("qrimg").src="qrimg.png";
    //document.getElementById("webcamimg").src="webcam2.png";
    document.getElementById("qrimg").style.opacity=1.0;
    document.getElementById("webcamimg").style.opacity=0.2;
    var qrfile = document.getElementById("qrfile");
    qrfile.addEventListener("dragenter", dragenter, false);  
    qrfile.addEventListener("dragover", dragover, false);  
    qrfile.addEventListener("drop", drop, false);
    stype=2;
}
