
$(document).ready(function () {
		var idleState = true;
		var idleTimer = null;
        var inactive = "inactive";
        var active = "active";
        var check = true;
        $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function () {
            clearTimeout(idleTimer);
            if (idleState == true) { 
            
                if(check == true)
                {
                    $.post('cactive.php',{active:active},function(data,status){
                    check = false;
                }); 
                }        
            }
            idleState = false;
            idleTimer = setTimeout(function () {
                $.post('pinactive.php',{inactive:inactive},function(data,status){
                    check = true;
                }); 
                idleState = true; }, 180000);
        });
        $("body").trigger("mousemove");
    });
