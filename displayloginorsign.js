//display login as a block in sigin
    /*function displayregister()
    {
        if(document.myregister.style.display=='none')
        document.myregister.style.display='block';
        else
        document.myregister.style.display='none';

    }
    // display sigin as a block in login
    function displayaccount()
    {
        if(document.mysignin.style.display=='none')
        document.mysignin.style.display='block';
        else
        document.mysignin.style.display='none';
    }*/
    // display login and close signin if open
    function displaylogin()
    {
        document.getElementById('1011').style.display='block';
        
    }    
       /* if(document.getElementById('1011').style.display=='block')
        document.getElementById('1011').style.display='none';
        else
        {
        document.getElementById('111').style.display='none';
        document.getElementById('1011').style.display='block';
        }*/
    
    // display sigin and close login if open
   function displaysign()
    {
        $.post("mainlogout.php",function(data){
           
        });
       
    }    
        /*if(document.getElementById('111').style.display=='block')
        document.getElementById('111').style.display='none';
        else
        {
        document.getElementById('111').style.display='none';
        document.getElementById('111').style.display='block';
        }*/