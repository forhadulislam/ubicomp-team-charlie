<?php
    include_once("config.php");
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $restroom = $_POST["restroom-name"]; 
        $toiletpaper = $_POST["toilet-paper"]; 
        $handwash = $_POST['handwash'];
        $wetfloor = $_POST['wet-floor'];
        $papertowel = $_POST['paper-towel'];

        $result_update = mysqli_query($con,"UPDATE restrooms SET `toilet-paper`='".$toiletpaper."',`handwash`='".$handwash."',
                                `wet-floor`='".$wetfloor."',`paper-towel`='".$papertowel."' WHERE id='".$restroom."'");

        if( $result_update ){ 
            echo "Success";
        }else{
            echo 'Error';
        }
    }
    
    include_once("header.php");
    
    $query = "SELECT * FROM restrooms";
    $result = mysqli_query($con, $query);
    
    
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
        
        
        <div class="success">
          
        </div>
      
<?php
    include_once("footer.php");
?>    