
let preview = document.getElementById("preview");
let recording = document.getElementById("recording");
let startButton = document.getElementById("startButton");
let stopButton = document.getElementById("stopButton");
let downloadButton = document.getElementById("downloadButton");
let logElement = document.getElementById("log");
let mycamera = document.getElementById("my-camera");
var recorder = null;

let recordingTimeMS = 5000;
let lengthInMMS = 300000;
var recordedChunks = [];
var rFileName = '';

var recStart = null;
var timerRec = null;

mycamera.onplay = function() {
  console.log("mycamera.onplay()");
  mycamera.captureStream = mycamera.captureStream || mycamera.mozCaptureStream;
}

function log(msg) {
  //logElement.innerHTML += msg + "\n";
	console.log("recorder-" +msg);
}

function wait(delayInMS) {
  return new Promise(resolve => setTimeout(resolve, delayInMS));
}

function startRecording(stream, lengthms) {
 console.log("startRecording()"); 
 
  recorder = new MediaRecorder(stream);
  let data = [];

  recorder.ondataavailable = handleDataAvailable;
  recorder.start();
  log(recorder.state + " for " + (lengthms/1000) + " seconds...");

  let stopped = new Promise((resolve, reject) => {
    recorder.onstop = resolve;
    recorder.onerror = event => reject(event.name);
  });

  let recorded = wait(lengthms).then(
    () => recorder.state == "recording" && recorder.stop()
  )

  recStart = moment();
  timerRec = setInterval(recTimer, 1000);
}

function handleDataAvailable(event) {
 console.log("handleDataAvailable start");
 if (event.data.size > 0) {
   console.log("dta size=" + event.data.size);
   recordedChunks.push(event.data);

 mStop();
 }
}

function doRecorderStop() {
  if (timerRec != null)
    clearInterval(timerRec);
  $('#divTimer').html("");

  if (recorder != null)
   recorder.stop();

  $.get("/delete-instructor-file", function(data) {
        
  });
}


function mStop() {
   console.log("mStop()");
   var saveFile = moment().format("MMDDYYYY_hhmm_") + rFileName;
   console.log("saving " + saveFile);     
   $('#divWait').show();
   let recordedBlob = new Blob(recordedChunks, { type: "video/webm" });
    recording.src = URL.createObjectURL(recordedBlob);
    downloadButton.href = recording.src;
    downloadButton.download = saveFile;

    //document.getElementById("divDownload").style.display = "";
    var reader = new window.FileReader();
    reader.readAsDataURL(recordedBlob);
    console.log("reader started");
    reader.onloadend = function() {
       console.log("reader.onloadend()");
       base64data = reader.result;
	
    var post = "fname=" + saveFile + "&file=" + base64data;
	    $.ajax({
	       url: "/save-recording",
	       data: post,
	       processData: false,
	       type: "POST",
	       success: function(data) {
                 $('#divWait').hide();  
		 alert("Recording has been saved successfully");
	        goBack(); 
	       },
	       error: function(err) {
                 $('#divWait').hide();  
		  alert("error" + err);
	       }
	    });	
        
     };
   	
}
function stop(stream) {
  stream.getTracks().forEach(track => track.stop());
}


//stopButton.addEventListener("click", function() {
 function stopRecording() {	
  stop(preview.srcObject);
 }
//}, false);

function recTimer() {
   var sysTime = moment();
   var hrs = moment.utc(sysTime.diff(recStart)).format("HH");
   var mins = moment.utc(sysTime.diff(recStart)).format("mm");
   var secs = moment.utc(sysTime.diff(recStart)).format("ss");
   console.log(hrs + ":" + mins + ":" + secs);
   $('#divTimer').html(hrs + ":" + mins + ":" + secs);
}

function goBack() {
}