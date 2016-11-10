
 

$(document).ready(function(){
    
    console.log("Loaded"); 
    
    $(".rating").rating({min:1, max:5, step:1, size:'md'});
    
   $(".status tbody").load("ajax-calls.php");
    
    var updateStatus = function(){
        /*$(".status tbody").load( "ajax-calls.php");
        updateStatus();*/
        
        var saveData = $.ajax({
              type: 'POST',
              url: "ajax-calls.php",
              dataType: "text",
              success: function(resultData) { 
                  $(".status tbody").html(resultData);
                  console.log("Save Complete");
                  
              }
        });
    }
    setInterval(updateStatus,2500);
    
})
