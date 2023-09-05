$(document).on({
    ajaxStart: function(){
        $("#spinner-div").fadeIn(300); 
    },
    ajaxStop: function(){ 
        $("#spinner-div").fadeOut(300); 
    }    
});