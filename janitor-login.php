<?php
    session_start();
    include_once("config.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST["username"]; 
        $password = sha1($_POST["password"]); 

        $result1 = mysqli_query($con,"SELECT username, password FROM janitor WHERE username = '".$username."' AND  password = '".$password."'");

        if(mysqli_num_rows($resul_update) > 0 ){ 
            $_SESSION["logged_in"] = true; 
            $_SESSION["admin"] = $username;
            
            header("Location: janitor-home.php");
        }else{
            echo 'The username or password are incorrect!';
        }
    }
    include_once("header.php");
?>



<h3>Janitor Login</h3>

        <form method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        
        
<?php
    include_once("footer.php");
?> 