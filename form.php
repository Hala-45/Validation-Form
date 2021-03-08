<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="css/bootstrap.css">
	
</head>
    <body>
        <!--form validation-->
        <?php
       
        $name;$email;$url;$phone;$txtarea;$gender;
          $nameErr="";
        $emailErr="";
        $websiteErr="";
        $genderErr="";
        $phoneErr="";
        if(isset($_POST["signbtn"])){
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["nametxt"])) {
                $nameErr = "Name is required";
              } else {
                $name = $_POST["nametxt"];
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                  $nameErr = "Only letters and white space allowed";
                    
                }
              }

             if (empty($_POST["emailtxt"])) {
                    $emailErr = "Email is required";
              } else {
                 $email = $_POST["emailtxt"];
                 $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                 // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $emailErr = "Invalid email format";
                        
                    }
                  }
                if (empty($_POST["urltxt"])) {
                    $url = "";
                  } else {
                    $url = $_POST["urltxt"];
                    $url = filter_var($url, FILTER_SANITIZE_URL);

                    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                    if (!filter_var($url, FILTER_VALIDATE_URL)) {
                      $websiteErr = "Invalid URL";
                        
                    }
                  }

                if (empty($_POST["nubmertxt"])) {
                      $phoneErr="Phone Is Requried";
                      } else{
            
                    $phone = $_POST["nubmertxt"];
                    
                    if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
                        $phoneErr="Phone Number is not valid";
                      
                       } 
                }
                 if (empty($_POST["abouttxt"])) {
                    $txtarea ="";
                     
                     
                  } else{
                     $txtarea=$_POST["abouttxt"];
                     
                    
                 }
                if (empty($_POST["gender"])) {
                      $gender = ""; 
                      } else{
                     $gender=$_POST["gender"];
                    
                 }
              }


        
        }
        
        
        
        
        
        
        
        
        ?>
        
        
        
        <!--html Form-->
        
        <div class="container">
            <center><h2>Form Application</h2></center>
   <form method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
       
       
       <div class="form-group"> 
       <label>Name</label>
       <input type="text" class="form-control" name="nametxt" placeholder="Enter Your Name" value="<?php echo isset($_POST["nametxt"])?$_POST["nametxt"]:'';?>">
           <span><?php echo"$nameErr"?></span>
       </div> 
       
       
       <div class="form-group"> 
       <label>Email address</label>
           <input type="email" class="form-control" name="emailtxt" placeholder="Enter Your email" value="<?php echo isset($_POST["emailtxt"])?$_POST["emailtxt"]:'';?>" >
           <span><?php echo"$emailErr"?></span></div> 
       
       
       
       
       
       
          <div class="form-group"> 
           <label>FaceBook URL</label>
         <input type="text" class="form-control" name="urltxt" placeholder="Enter Your Facebook URL(https://www.facebook.com/)"  value="<?php echo isset($_POST["urltxt"])?$_POST["urltxt"]:'';?>">
            <span><?php echo"$websiteErr"?></span> </div>
       
       
       
       
       
       
       <div class="form-group">
           <label>Mobile Phone</label>
         <input type="tel" class="form-control" name="nubmertxt" placeholder="Enter Your PhoneNumber (192-5462-1825)"  value="<?php echo isset($_POST["nubmertxt"])?$_POST["nubmertxt"]:'';?>"><span><?php echo"$phoneErr"?></span>  </div>
       
       
       
       
       
    
       <div class="form-group">
           <label>About Me</label>
           <textarea class="form-control"rows="3" name="abouttxt" placeholder="Feel Free To Talk" > <?php echo isset($_POST["abouttxt"])?$_POST["abouttxt"]:'';?></textarea></div> 
       
       
       
       <label>Gender</label><br/>
     
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female<br/>
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male<br/>
         <button type="submit" class="btn btn-primary signin-btn" style="margin-top:10px" name="signbtn">Sign in</button>
            </form> 
          
        </div>   
    </body>
</html>