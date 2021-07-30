$('#sub').click(function(){
    var name = $('#name').val();
    var fname = $('#fname').val();
    var gender1 = $('input[name="gender"]:checked').length;
    var gender = $('input[name="gender"]:checked').val();
    var age = $('#age').val();
    var password = $('#password').val();
    var password1 = $('#password1').val();
    var active = "active";
    var man_array = ["men3.png", "men4.png", "men5.png"];
    var woman_array = ["women1.png","women2.png","women3.png","women4.png", "women5.png"];
    var pic = "local2.jpg";
    var city = $('#citys').val();
    


    if(name!="" && fname!="" && gender1!=0 && password!="" && password1!="" && password==password1 && (age >= 13 && age <= 80))
    {
        if (gender == "male") {
            var num = Math.floor( Math.random() * man_array.length );
            var pic = man_array[ num ];
        }
        else
        {
            var num = Math.floor( Math.random() * woman_array.length );
            var pic = woman_array[ num ];
        }
        
    $.post("index2.php",{name:name,fname:fname,gender:gender,age:age,password:password,pic:pic,city:city},
    function(data)
    {
        document.getElementsByClassName('anyclass')[0].innerHTML = data;
        
        if(data.length <= 20)
        {
            $('#name').val("");
            $('#fname').val("");
            $('#age').val("");
            $.post('cactive.php',{active:active},function(data,status){
              
            });
 
            $('#password').val("");
            $('#password1').val("");
            $('#icondetails').show();
            $('#hidelog').show();
        
         //   $('input[type="radio"]:checked').checked = false; 
           $('#hidelogin').hide();
           $('#hidesign').hide(); 
           setTimeout(function () {
        location.reload(true); 
           }, 800); 
              
                $('#1011').slideUp(1000);
                $('.anyclass').hide(1500);

        }
       else
         $('#name').focus();
        
    }
    );
    }
    else
    {
        if(name=="")
        {
            document.getElementsByClassName('anyclass')[0].innerHTML = "fill username";
            $('#name').focus();
        }
        else if(fname=="")
        {
            document.getElementsByClassName('anyclass')[0].innerHTML = "fill Name";
            $('#fname').focus();
        }
       else if(gender1==0)
        {
            document.getElementsByClassName('anyclass')[0].innerHTML = "fill gender";
            $('input[name="gender"]').focus();
        }
        else if( age < 13 || age > 80)
        {
            document.getElementsByClassName('anyclass')[0].innerHTML = "Age should be in range 13 to 80 ";
            $('input[name="number"]').focus();
        }
        else if(password=="")
        {
            document.getElementsByClassName('anyclass')[0].innerHTML = "fill Password";
            $('#password').focus();
        }
        else if(password1=="")
        {
            document.getElementsByClassName('anyclass')[0].innerHTML = "fill Rewrite Password";
            $('#password1').focus();
        }
        else if(password1!=password)
        {
            document.getElementsByClassName('anyclass')[0].innerHTML = "fill same Password";
            $('#password').val("").focus();
            $('#password1').val("");
        }
        
    }
    return false;
});