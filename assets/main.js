
 

$(document).ready(function(){
    
    if( $('.rating').length ){
         $(".rating").rating({min:1, max:5, step:1, size:'md'});
    } 
    
    
    
    $(".status tbody").load("ajax-calls.php?func=getRestroomStatus");
    
    $(".feedback-form").submit(function(){
       var toiletPaper = $("#toilet-paper").val();
       var handwash = $("#handwash").val();
       var wetFloor = $("#wet-floor").val();
       var paperTowel = $("#paper-towel").val();
       
       if( !paperTowel || !handwash || !wetFloor || !paperTowel){
           alert("Please give complete feedback!!!");
           return false;
       }
       
    });
    
    var updateStatus = function(){
        
        var saveData = $.ajax({
              type: 'GET',
              data: { func: "getRestroomStatus"},
              url: "ajax-calls.php",
              dataType: "text",
              success: function(resultData) { 
                  $(".status tbody").html(resultData);
                  console.log("Save Complete");
                  console.log(resultData);
              }
        });
    }
    
    var updateStat = function(){
        
        var saveData = $.ajax({
              type: 'GET',
              data: { func: "getRestroomStat"},
              url: "ajax-calls.php",
              dataType: "text",
              success: function(resultData) { 
                  $(".stat tbody").html(resultData);
                  console.log("Save Complete");
              }
        });
    }
    
    setInterval(updateStat,2500);
    setInterval(updateStatus,2500);
    
})
