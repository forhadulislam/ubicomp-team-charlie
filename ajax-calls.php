<?php
    include_once("config.php");
    
    function getRestroomStatus($con){
        
        $query = "SELECT `restroom-name`, AVG(`toilet-paper`) AS `toilet-paper`, AVG(`handwash`) AS `handwash`, AVG(`paper-towel`) AS `paper-towel`, AVG(`wet-floor`) AS `wet-floor` FROM `restroomstatus` GROUP BY `restroom-name` ";
        $result = mysqli_query($con, $query);
        $html = "";
        
        while($row = mysqli_fetch_assoc($result)){
            //$jsonData[] = $row;
            
            if( $row['wet-floor'] == "yes"){
                $table_class = "danger";
            }else{
                $table_class = "";
            }
            
            $html .= "<tr class='$table_class'><td>" . $row['restroom-name'] . "</td>";
            $html .= "<td>" . $row['toilet-paper'] . "</td>";
            $html .= "<td>" . $row['handwash'] . "</td>";
            $html .= "<td>" . $row['wet-floor'] . "</td></tr>";
        }
        
        
        //return json_encode($jsonData);
        
        return $html;
        
        
    }
    
    echo getRestroomStatus($con);

?>