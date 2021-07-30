$('#sublg').click(function(){
    var name = $('#namel').val();
    var password = $('#passwordl').val();
    var active = "active";

    if(name!="" && password!="")
    {
    $.post("login.php",{name:name,password:password},
    function(data)
    {
        document.getElementsByClassName('lanyclass')[0].innerHTML = data;
        
        if(data.length <= 18)
        {
            $('#namel').val("");
            $('#passwordl').val("");
            $.post('cactive.php',{active:active},function(data,status){
              
                }); 
         //   $('input[type="radio"]:checked').checked = false; 
           $('#hidelogin').hide();
           $('#hidesign').hide();
           $('#hidelog').show(); 
           $('#icondetails').show();
           setTimeout(function () {
        location.reload(true); 
      }, 800); 
           
              
                $('#1011').slideUp(1000);
                $('.lanyclass').hide(1500);

        }
       else
       {
       $('#namel').val("");
       $('#passwordl').val("");
       $('#namel').focus();
       }
        
    }
    );
    }
    else
    {
        if(name=="")
        {
            document.getElementsByClassName('lanyclass')[0].innerHTML = "fill username";
            $('#namel').focus();
        }
        else if(password=="")
        {
            document.getElementsByClassName('lanyclass')[0].innerHTML = "fill Password";
            $('#passwordl').focus();
        }
        
    }
    return false;
});