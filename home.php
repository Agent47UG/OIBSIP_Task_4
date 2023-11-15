<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">

        <div class="right-links">
            <?php        
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }
          
            ?>
        </div>
    </div>
    <main>

       <div class="main-box top">
            <div class="main-txt">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            </div>
            <div class="main-txt">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
          <div class="main-txt-last">
                <p>And you are <b><?php echo $res_Age ?> years old</b>.</p> 
          </div>
       </div>

       <a href="php/logout.php"> <button class="btn-logout">Log Out</button> </a>

    </main>
</body>
</html>