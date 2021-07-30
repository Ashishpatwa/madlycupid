
    $(window).bind('beforeunload', function() {
        var  inactive = "inactive";
 $.post('pinactive.php',{inactive:inactive},function(data,status){
}); 
    });
