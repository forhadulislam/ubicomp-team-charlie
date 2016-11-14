<?php
    session_start();
    include_once("config.php");
    include_once("header.php");
    $query = "SELECT * FROM restrooms";
    $result = mysqli_query($con, $query);
    $message = "";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION["newsession"]= $_POST['restroom-name'];
        if($_SESSION["newsession"]){
            $message = "Current restroom updated!!!";
        }
    }
?>
        <div class="feedback col-md-6 col-md-offset-3">
          <h2>Set Restroom</h2>
            <?php if( $message ){ echo "<div class='alert alert-success'>$message</div>"; } ?>
            <form class="set-restroom-form" method="post">
                
                <div class="form-group">
                  <label for="sel1">Current restroom</label>
                  <select class="form-control" id="restroom" name="restroom-name">
                    <?php 
                      while($row = mysqli_fetch_assoc($result)){
                          if($row['id'] == $_SESSION["newsession"] ){ $selected = "selected"; }else{ $selected = ""; }
                          echo "<option $selected value=$row[id]>" . $row['restroom-name'] . "</option>";
                      }
                    ?>
                  </select>
                </div>
                
                <button type="submit" class="btn btn-default">Submit</button>
            
            </form>
            
            </div>
            
<?php
    include_once("footer.php");
?>