<?php
    include_once("config.php");
    
    $status = false;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $restroom = $_POST['restroom-name']; 
        $toiletpaper = $_POST['toilet-paper']; 
        $handwash = $_POST['handwash'];
        $wetfloor = $_POST['wet-floor'];
        $papertowel = $_POST['paper-towel'];

        $result_update = mysqli_query($con,"INSERT INTO `restroomstatus` (`restroom-name`, `toilet-paper`, `handwash`, `wet-floor`, `paper-towel`) 
			VALUES ('$restroom','$toiletpaper','$handwash',$wetfloor,'$papertowel')");

        if( $result_update ){ 
            $status = "success";
        }else{
            $status = "error";
        }
    }
    
    include_once("header.php");
    
    $query = "SELECT * FROM restrooms";
    $result = mysqli_query($con, $query);
    
    
?>
      <?php
        if( !$status ){
      ?>
        <div class="feedback col-md-6 col-md-offset-3">
          <h2>Restroom feedback</h2>
      
          <form class="feedback-form" method="post">
            
            <div class="form-group">
              <label for="sel1">Current restroom</label>
              <select class="form-control" id="restroom" name="restroom-name">
                <?php 
                  while($row = mysqli_fetch_assoc($result)){
                      echo "<option value=$row[id]>" . $row['restroom-name'] . "</option>";
                  }
                ?>
              </select>
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Was there enough toilet paper ? </label>
              <div>
                Bad <input required name="toilet-paper" id="toilet-paper" type="hidden" class="rating" min=1 max=5 step=1 data-size="sm" data-rtl="false"> Excellent
              </div>
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Was there enough handwash ? </label>
              <div>
                Not Enough <input required name="handwash" id="handwash" type="hidden" class="rating" min=1 max=5 step=1 data-size="sm" data-rtl="false"> Enough
              </div>
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Was the floor wet ? </label>
              <div>
                Not wet <input required name="wet-floor" id="wet-floor" type="hidden" class="rating" min=1 max=5 step=1 data-size="sm" data-rtl="false"> Wet
              </div>
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Was there enough paper towel ? </label>
              <div>
                Not Enough <input required name="paper-towel" id="paper-towel" type="hidden" class="rating" min=1 max=5 step=1 data-size="sm" data-rtl="false"> Enough
              </div>
            </div>
            
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
        
      <?php
        }
      ?>
      <?php
        if( $status ){
      ?>
        <div class="status-message col-md-6 col-md-offset-3">
            <?php
              if($status == "success"){ 
            ?>
            <div class="success">
              <h2> <span class="glyphicon glyphicon-ok"></span> </h2>
              <h2>Thanks for your feedback!</h2>
              <meta http-equiv="refresh" content="15">
            </div>
            <?php
              }else{
            ?>
              <h2 class="error">Sorry an error occured!! Please try again</h2>
              <meta http-equiv="refresh" content="15">
            <?php } ?>
        </div>
      <?php
        }
      ?>
<?php
    include_once("footer.php");
?>    
