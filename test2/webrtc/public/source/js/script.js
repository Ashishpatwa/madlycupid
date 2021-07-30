// When the DOM is ready
document.addEventListener("DOMContentLoaded", function(event) {
    var peer_id;
    var username;
    var conn;
    var isRecording = false;
    var MSG_START_RECORDING = "START_RECORDING";
    var MSG_STOP_RECORDING = "STOP_RECORDING";

   console.log("qid=" + qid);
         if (qid == "instructor") {
          document.getElementById("peer-id-label2").innerHTML = "student";
 	  document.getElementById("peer_id").value =  "student";
 
	  document.getElementById("label1").textContent =  "Instructor";
	  document.getElementById("connected_peer").textContent =  "Student";
       } else {
          document.getElementById("peer-id-label2").innerHTML = "instructor";
 	  document.getElementById("peer_id").value =  "instructor";
	  document.getElementById("label1").textContent =  "Student";
	  document.getElementById("connected_peer").textContent =  "Instructor";
      }
   /**
     * Important: the host needs to be changed according to your requirements.
     * e.g if you want to access the Peer server from another device, the
     * host would be the IP of your host namely 192.xxx.xxx.xx instead
     * of localhost.
     *
     * The iceServers on this example are public and can be used for your project.
     */
    var peer = new Peer(qid, {
        host: "yourdomain.com",
        port: 9000,
        path: '/peerjs',
        debug: 3,
        config: {
            'iceServers': [
                { url: 'stun:108.177.98.127:19302' },
                {
                    url: 'turn:numb.viagenie.ca',
                    credential: 'muazkh',
                    username: 'webrtc@live.com'
                }
	       
            ]
        }
    });

    // Once the initialization succeeds:
    // Show the ID that allows other user to connect to your session.
    peer.on('open', function () {
        document.getElementById("peer-id-label").innerHTML = peer.id;
 
	// if this is student, start video session
	if (qid == "student") {
	    document.getElementById("connect-to-peer-btn").click();
	}		
    });

    // When someone connects to your session:
    //
    // 1. Hide the peer_id field of the connection form and set automatically its value
    // as the peer of the user that requested the connection.
    // 2.
    peer.on('connection', function (connection) {
        conn = connection;
        peer_id = connection.peer;
       
        // Use the handleMessage to callback when a message comes in
        conn.on('data', handleMessage);

        // Hide peer_id field and set the incoming peer id as value
        document.getElementById("peer_id").className += " hidden";
        document.getElementById("peer_id").value = peer_id;
        //document.getElementById("connected_peer").innerHTML = connection.metadata.username;
	document.getElementById("btnClose").style.display = "";
        
	document.getElementById("btnClose").onclick = function() { 
	        var closeNow = false;
		if (isRecording && qid == "instructor") {
		  $('#btnRecord').trigger("click");
		}
		else if (isRecording && qid == "student") {
		  	      // msg to student
			var data = {
			    from: qid,
			    text: MSG_STOP_RECORDING
			};
		} else {
		  closeNow = true;
		}
	
		peer.disconnect(); peer.destroy();
                if (closeNow) {
			if (qid == "instructor")
				window.location.href="/instructor";
			else if (qid == "student")
				window.location.href="/student";
		}
        }
     	if (qid == "instructor") {
	 document.getElementById("connect-to-peer-btn").click();
	} else if (qid == "student") {
	 //document.getElementById("call").click();
	}

	if (qid == "instructor")
		rFileName = "instructor.webm";
	else if (qid == "student")
		rFileName = "student.webm";

	if (qid == "instructor")	
		document.getElementById("btnRecord").style.display = "";
    });

   //3
  peer.on("close", function() {
        alert("Peer Session has been closed or disconnected"); 
        peer.destroy();
        doRecorderStop();
	});
  
  peer.on("disconnect", function() {
 
        alert("Peer Session has been closed or disconnected"); 
        peer.destroy();
	doRecorderStop();
  });

    peer.on('error', function(err){
        alert("An error occurred with peer: " + err);
        console.error(err);
        window.location.reload(); 
    });



  document.getElementById("btnRecord").addEventListener("click", function(){
       if (!isRecording) {
           isRecording = true;
           $("#btnRecord").text("Stop Recording");
           startRecording(window.localStream, lengthInMMS);

  	      // msg to student
		var data = {
		    from: qid,
		    text: MSG_START_RECORDING
		};

		// Send the message with Peer
		conn.send(data);


       } else {
	      // send msg to student 
		var data = {
		    from: qid,
		    text: MSG_STOP_RECORDING
		};

		// Send the message with Peer
		conn.send(data);


           isRecording = false; 
           $("#btnRecord").text("Start Recording");
	   doRecorderStop();
	}
  });
    /**
     * Handle the on receive call event
     */
    peer.on('call', function (call) {
        var acceptsCall = confirm("Videocall incoming, do you want to accept it ?");

        if(acceptsCall){
            // Answer the call with your own video/audio stream
            call.answer(window.localStream);

            // Receive data
            call.on('stream', function (stream) {
                // Store a global reference of the other user stream
                window.peer_stream = stream;
                // Display the stream of the other user in the peer-camera video element !
                onReceiveStream(stream, 'peer-camera');
            });

            // Handle when the call finishes
            call.on('close', function(){
                alert("The videocall has finished");
	        doRecorderStop();
	    });

            // use call.close() to finish a call
        }else{
            console.log("Call denied !");
        }
    });

    /**
     * Starts the request of the camera and microphone
     *
     * @param {Object} callbacks
     */
    function requestLocalVideo(callbacks) {
        // Monkeypatch for crossbrowser geusermedia
        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia;

        // Request audio an video
        navigator.getUserMedia({ audio: true, video: true }, 
		callbacks.success , callbacks.error
	);
	 
}

    /**
     * Handle the providen stream (video and audio) to the desired video element
     *
     * @param {*} stream
     * @param {*} element_id
     */
    function onReceiveStream(stream, element_id) {
        // Retrieve the video element according to the desired
        var video = document.getElementById(element_id);
        // Set the given stream as the video source
        //video.src = window.URL.createObjectURL(stream);

        video.srcObject =stream;
	video.onloadedmetadata = function(e) {video.play();}
	
        // Store a global reference of the stream
        window.peer_stream = stream;
    }

    /**
     * Appends the received and sent message to the listview
     *
     * @param {Object} data
     */
    function handleMessage(data) {
         if (data.text == MSG_START_RECORDING) {
	     startRecording(window.localStream, lengthInMMS);
	     return;
	 }
         else if (data.text == MSG_STOP_RECORDING) {
	     doRecorderStop();
	     return;
	 }
	

	 var orientation = "text-left";

        // If the message is yours, set text to right !
        if(data.from == username){
            orientation = "text-right"
        }
	var textClass = "success";
	if (data.from == "instructor")
		textClass = "danger";

        var messageHTML =  '';
        messageHTML += '<span class="' + textClass + '"><b>'+ data.from +'</b>: ' + data.text + '</span><br>';

        document.getElementById("messages").innerHTML += messageHTML;
    }

    /**
     * Handle the send message button
     */
    document.getElementById("send-message").addEventListener("click", function(){
        // Get the text to send
        var text = document.getElementById("message").value;

        // Prepare the data to send
        var data = {
            from: qid,
            text: text
        };

        // Send the message with Peer
        conn.send(data);

        // Handle the message on the UI
        handleMessage(data);

        document.getElementById("message").value = "";
    }, false);

    /**
     *  Request a videocall the other user
     */
    document.getElementById("call").addEventListener("click", function(){
        console.log('Calling  ' + peer_id);
        console.log(peer);

	var options = {
           'constraints': {
		'mandatory': {
		    'OfferToReceiveAudio':true,
		    'OfferToReceiveVideo':true
		}	
	    }
        }
        var call = peer.call(peer_id, window.localStream, options);

        call.on('stream', function (stream) {
	   console.log("Call.on('stream')");
            window.peer_stream = stream;

            onReceiveStream(stream, 'peer-camera');
        });
    }, false);

    /**
     * On click the connect button, initialize connection with peer
     */
    document.getElementById("connect-to-peer-btn").addEventListener("click", function(){
        username = document.getElementById("name").value;
        peer_id = document.getElementById("peer_id").value;

        if (peer_id) {
            conn = peer.connect(peer_id, {
                metadata: {
                    'username': username
                }
            });

            conn.on('data', handleMessage);
        }else{
            alert("You need to provide a peer to connect with !");
            return false;
        }

        document.getElementById("chat").className = "";
        document.getElementById("connection-form").className += " hidden";
    }, false);

    /**
     * Initialize application by requesting your own video to test !
     */
    requestLocalVideo({
        success: function(stream){
            window.localStream = stream;
            onReceiveStream(stream, 'my-camera');
		  preview.srcObject = stream;
	         downloadButton.href = window.localStream;
		 mycamera.captureStream = mycamera.captureStream || mycamera.mozCaptureStream;
		if (qid == "student") {
	 		document.getElementById("call").click();
		}
	         //return new Promise(resolve => preview.onplaying = resolve);
        },
        error: function(err){
            alert("Cannot get access to your camera and video !");
            console.error(err);
        }
    });


}, false);