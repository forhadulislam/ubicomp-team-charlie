<?php
    include_once("config.php");
    
    $func = $_GET['func'];
    
    function getRestroomStatus($con){
        
        $query = "SELECT * FROM restrooms";
        $result = mysqli_query($con, $query);
        $html = "";
        
        while($row = mysqli_fetch_assoc($result)){
            
            $tableStatus = "";
            
            if( $row['toilet-paper'] <= 2){
                
                  $toiletPaperStatus = '<span class="glyphicon glyphicon-remove"></span>';
                  $tableStatus = "danger";
                  
            }else{
                  $toiletPaperStatus = '<span class="glyphicon glyphicon-ok"></span>';
                  
            }
            
            if( $row['handwash'] <= 2){
                  $handwashStatus = '<span class="glyphicon glyphicon-remove"></span>';
                  $tableStatus = "danger";
            }else{
                  $handwashStatus = '<span class="glyphicon glyphicon-ok"></span>';
                  
            }
            
            if( $row['wet-floor'] <= 2){
                  $wetFloorStatus = '<span class="glyphicon glyphicon-remove"></span>';
                  $tableStatus = "danger";
            }else{
                  $wetFloorStatus = '<span class="glyphicon glyphicon-ok"></span>';
                  
            }
            
            if( $row['paper-towel'] <= 2){
                  $paperTowelStatus = '<span class="glyphicon glyphicon-remove"></span>';
                  $tableStatus = "danger";
            }else{
                  $paperTowelStatus = '<span class="glyphicon glyphicon-ok"></span>';
                  
            }
            
            $html .= "<tr class='$tableStatus'><td>" . $row['restroom-name'] . "</td>";
            $html .= "<td>" . $toiletPaperStatus .  "</td>";
            $html .= "<td>" . $handwashStatus . "</td>";
            $html .= "<td>" . $wetFloorStatus . "</td>";
            $html .= "<td>" . $paperTowelStatus . "</td></tr>";
        }
        
        
        return $html;
        
        
        
    }
    
    
    function getRestroomStat($con){
        
        $query = "SELECT `restroom-name`, AVG(`toilet-paper`) AS `toilet-paper`, AVG(`handwash`) AS `handwash`, AVG(`paper-towel`) AS `paper-towel`, AVG(`wet-floor`) AS `wet-floor` FROM `restroomstatus` GROUP BY `restroom-name` ";
        $result = mysqli_query($con, $query);
        $html = "";
       
        while($row = mysqli_fetch_assoc($result)){
    		foreach($row as $k => $v) {
    			if($k != 'restroom-name') {
    				$trow[] = floatval($v);
    			}
    			else {
    				$trow[] = $v;
    			}
    		}
            $jsonData[] =$trow ;
            $trow=[];
        }
        
        return json_encode($jsonData);
    }
    
    function getTitle($con, $id){
        $restroomTitleQuery = "SELECT * FROM restrooms WHERE id=" . $id;
        $getrestroomTitle = mysqli_query($con,$restroomTitleQuery);
        
        $row=mysqli_fetch_array($getrestroomTitle,MYSQLI_ASSOC);

        echo $row['restroom-name'];
        var_dump($row);
    }
    
    
    if( $func == "getRestroomStat" ){
        echo getRestroomStat($con);
    }elseif( $func == "getRestroomStatus" ){
        echo getRestroomStatus($con);
    }elseif( $func == "getTitle" ){
        getTitle($con, $_GET['id']);
    }else{
        echo $func;
    }
    

?>