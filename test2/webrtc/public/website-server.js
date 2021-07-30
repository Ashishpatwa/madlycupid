/**
 * This script starts a https server accessible at https://localhost:8443
 * to test the chat
 *
 * @author Carlos Delgado
 */
var fs     = require('fs');
var http   = require('http');
var https  = require('https');
var path   = require("path");
var os     = require('os');
var ifaces = os.networkInterfaces();
var moment = require("moment");
var inspect = require('util').inspect;
var bodyParser = require('body-parser');
var util = require("util");
var multiparty = require("multiparty");
const {exec} = require("child_process");

var FILEPATH = "/var/www/webrtc/public/data";

// Public Self-Signed Certificates for HTTPS connection
var privateKey  = fs.readFileSync('./../certificates/privkey.pem', 'utf8');
var certificate = fs.readFileSync('./../certificates/cert.pem', 'utf8');

var credentials = {key: privateKey, cert: certificate};
var express = require('express');
var app = express();

//app.use(bodyParser.urlencoded({limit: '200mb', extended: true}));


app.use(express.json());
app.use(express.urlencoded({limit: '200mb'}));

var httpServer = http.createServer(app);
var httpsServer = https.createServer(credentials, app);

function RecFile(name, size, date) {
 this.name = name;
 this.size = size;
 this.date = date;
}

/**
 *  Show in the console the URL access for other devices in the network
 */
Object.keys(ifaces).forEach(function (ifname) {
    var alias = 0;

    ifaces[ifname].forEach(function (iface) {
        if ('IPv4' !== iface.family || iface.internal !== false) {
            // skip over internal (i.e. 127.0.0.1) and non-ipv4 addresses
            return;
        }
        
        console.log("");
        console.log("Welcome to the Chat Sandbox");
        console.log("");
        console.log("Test the chat interface from this device at : ", "https://localhost:8443");
        console.log("");
        console.log("And access the chat sandbox from another device through LAN using any of the IPS:");
        console.log("Important: Node.js needs to accept inbound connections through the Host Firewall");
        console.log("");

        if (alias >= 1) {
            console.log("Multiple ipv4 addreses were found ... ");
            // this single interface has multiple ipv4 addresses
            console.log(ifname + ':' + alias, "https://"+ iface.address + ":8443");
        } else {
            // this interface has only one ipv4 adress
            console.log(ifname, "https://"+ iface.address + ":8443");
        }

        ++alias;
    });
});

// Allow access from all the devices of the network (as long as connections are allowed by the firewall)
var LANAccess = "0.0.0.0";
// For http
httpServer.listen(8080, LANAccess);
// For https
httpsServer.listen(8443, LANAccess);

app.get('/', function (req, res) {
    res.sendFile(path.join(__dirname+'/index.html'));
});

app.get('/instructor', function (req, res) {
    res.sendFile(path.join(__dirname+'/instructor.html'));
});


app.get('/student', function (req, res) {
    res.sendFile(path.join(__dirname+'/student.html'));
});



app.get('/chatsession', function (req, res) {
    res.sendFile(path.join(__dirname+'/chatsession.html'));
});

app.get('/create-instructor-file', function (req, res) {
   console.log("create-instructrr-file"); 
    if (fs.existsSync("/tmp/vc-instructor-key.dat")) 
	fs.unlinkSync("/tmp/vc-instructor-key.dat");
    fs.writeFile("/tmp/vc-instructor-key.dat", "dummy",function(err) {
    if(err) {
        return res.json({status: "ERROR", msg: "Could not create instructor file"});
    }
    return res.json({status: "OK", msg: "OK"});
   }); 
});


app.get('/check-instructor-file', function (req, res) {
    if (!fs.existsSync("/tmp/vc-instructor-key.dat")) {
        return res.json({status: "ERROR", msg: "Instructor file does not exist"});
    } else {
	// if its more than 10 min old then it is stale
	var stats = fs.statSync("/tmp/vc-instructor-key.dat");
        var ctime = stats.ctime;
        var localtime = moment();
	var filetime = moment(ctime);
        var diffInMin = localtime.diff(filetime, "minutes");
	if (diffInMin > 10)
        	return res.json({status: "ERROR", msg: "Instructor file has expired. Please ask instructor to login first"});
	return res.json({status: "OK", msg: localtime +"," + filetime});
    }
});

app.get('/delete-instructor-file', function (req, res) {
    if (fs.existsSync("/tmp/vc-instructor-key.dat")) {
        fs.unlinkSync("/tmp/vc-instructor-key.dat");
    } 
    return res.json({status: "OK", msg: ""});
});


app.get('/create-recording-flag', function (req, res) {
   console.log("create-recording-flag"); 
    if (fs.existsSync("/tmp/vc-recording-flag.dat")) 
	fs.unlinkSync("/tmp/vc-recording-flag.dat");
    fs.writeFile("/tmp/vc-recording-flag.dat", "dummy",function(err) {
    if(err) {
        return res.json({status: "ERROR", msg: "Could not create recording flag file"});
    }
    return res.json({status: "OK", msg: "OK"});
   }); 
});




app.get('/check-recording-flag', function (req, res) {
    if (!fs.existsSync("/tmp/vc-recording-flag.dat")) {
        return res.json({status: "ERROR", msg: "Recording flag does not exist"});
    } else {
	return res.json({status: "OK", msg: localtime +"," + filetime});
    }
});

app.get('/delete-recording-flag', function (req, res) {
    if (fs.existsSync("/tmp/vc-recording-flag.dat")) {
        fs.unlinkSync("/tmp/vc-recording-flag.dat");
    } 
    return res.json({status: "OK", msg: ""});
});



app.post('/save-recording', function (req, res) {
   console.log("save-recording"); 
   var fname = req.body.fname;
   console.log("Saving " + req.body.fname);
   var base64Data = req.body.file.replace(/^data:(.*?);base64,/,""); 
   base64Data = base64Data.replace(/ /g, '+'); 
   
   var webmFile =  Buffer.from(base64Data, "base64");
   fs.writeFile("/var/webrtc/public/data/"+ fname, webmFile, function(err) {
       if (err) {
         console.log("File write error:" + err);
         reject(err);
       } else {
          console.log("File write success!!");
               
       } // if (err) else
   
   });
   return res.json({status: "OK", msg: "OK"});
});


app.get('/list', function (req, res) {
	res.sendFile(path.join(__dirname+'/list.html'));
});

app.get('/list-recordings', function (req, res) {
	var fArray = new Array();
	var items = fs.readdirSync(FILEPATH) ;
	console.log("items=" + items.length);
            for (var i=0; i < items.length; i++) {
                if (items[i].endsWith(".webm")) {
		   var f = FILEPATH +"/" + items[i];
		   var stats = fs.statSync(f);
                   var recFile = new RecFile(items[i], stats["size"], stats["ctime"]);
		   fArray.push(recFile); 
	 
		}
            }
	       
	   
   	return res.json({status: "OK", data: JSON.stringify(fArray)});

});



// Expose the css and js resources as "resources"
app.use('/resources', express.static('./source'));