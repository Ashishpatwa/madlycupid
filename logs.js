function logs()
    {
        var  inactive = "inactive";
 $.post('pinactive.php',{inactive:inactive},function(data,status){
}); 
window.location.href='mainlogout.php';
    }