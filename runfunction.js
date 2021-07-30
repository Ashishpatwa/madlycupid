setInterval(runfunction,1000);

function runfunction(){
    $.post("datachat.php",{},function(data,status){
     
     document.getElementsByClassName('discoverpeople')[0].innerHTML = data;

    });
    $.post("notifiiupdate.php",{},function(data,status){
     
        document.getElementsByClassName('notifiiupdate')[0].innerHTML = data;
   
       });
    $.post("refreshnotificaton.php",{},function(data,status){
     
        document.getElementsByClassName('dropdown-content')[0].innerHTML = data;
   
       });
       $.post("likeupdate.php",{},function(data,status){
     
        document.getElementsByClassName('likeupdate')[0].innerHTML = data;
   
       });
       $.post("visitorupdate.php",{},function(data,status){
     
        document.getElementsByClassName('visitorupdate')[0].innerHTML = data;
   
       });
       $.post("favupdate.php",{},function(data,status){
     
        document.getElementsByClassName('favupdate')[0].innerHTML = data;
   
       });
       $.post("requpdate.php",{},function(data,status){
     
        document.getElementsByClassName('requpdate')[0].innerHTML = data;
   
       });
    $.post("refreshprofile.php",{},function(data,status){
        document.getElementsByClassName('section')[0].innerHTML = data;
   
       });
       $.post("upperlogo.php",{},function(data,status){
        document.getElementsByClassName('upperlogo')[0].innerHTML = data;
   
       });
    
       $.post("homedatachat.php",{},function(data,status){
        
        document.getElementsByClassName('imageport')[0].innerHTML = data;

       });
       $.post("homedatachatindex.php",{},function(data,status){
        
        document.getElementsByClassName('imageportindex')[0].innerHTML = data;

       });
    
}