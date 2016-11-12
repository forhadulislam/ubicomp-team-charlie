<?php
    include_once("config.php");
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $restroom = $_POST['restroom-name']; 
        $toiletpaper = $_POST['toilet-paper']; 
        $handwash = $_POST['handwash'];
        $wetfloor = $_POST['wet-floor'];
        $papertowel = $_POST['paper-towel'];

        $result_update = mysqli_query($con,"INSERT INTO `restroomstatus` (`restroom-name`, `toilet-paper`, `handwash`, `wet-floor`, `paper-towel`) 
			VALUES ('$restroom','$toiletpaper','$handwash','5','$papertowel')");

        if( $result_update ){ 
            echo "Success";
        }else{
            echo "Error";
        }
    }
    
    include_once("header.php");
    
    $query = "SELECT * FROM restrooms";
    $result = mysqli_query($con, $query);
    
    
?>

        <div class="feedback col-md-6 col-md-offset-3">
          <h2>Restroom feedback</h2>
      
          <form class="" method="post">
            
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
                <input name="toilet-paper" type="hidden" class="rating" min=1 max=5 step=1 data-size="sm" data-rtl="false">
              </div>
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Was there enough handwash ? </label>
              <div>
                <input name="handwash" type="hidden" class="rating" min=1 max=5 step=1 data-size="sm" data-rtl="false">
              </div>
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Was the floor wet ? </label>
              <div>
                <input name="wetfloor" type="hidden" class="rating" min=1 max=5 step=1 data-size="sm" data-rtl="false">
              </div>
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Was there enough paper towel ? </label>
              <div>
                <input name="paper-towel" type="hidden" class="rating" min=1 max=5 step=1 data-size="sm" data-rtl="false">
              </div>
            </div>
            
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      
<?php
    include_once("footer.php");
?>    
