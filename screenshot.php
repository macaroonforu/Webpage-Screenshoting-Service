<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-color: white; 
        }
        p{
        text-align: center; 
        margin-top:10px; 
        font-size: 24px; 
        }
    </style>
</head>
<body>
   <?php 
   if(!empty($_POST['url'])){
    $url = $_POST["url"]; 
    $fp = fopen("lock.txt", "w"); 
    if (flock($fp, LOCK_EX)){
        echo '<p style="font-style:italic;">You entered this url: '; 
        echo $url . '</p>';
        $command = "wkhtmltoimage --crop-w 1024 --crop-h 2048 " . $url . "  /var/www/html/screenshot/php.png"; 
        exec($command, $out, $status); 
        #echo "<p>$out</p>";
       #echo "<p>Exited with status code: $status</p>";
       
        $command2 = "convert -resize 50% /var/www/html/screenshot/php.png /var/www/html/screenshot/php.png"; 
        shell_exec($command2); 
        
        list($width, $height, $type, $attr) = getimagesize("/var/www/html/screenshot/php.png"); 
        list($width2, $height2, $type2, $attr2) = getimagesize("/var/www/html/screenshot/php.png"); 
        
        #echo $width; 
        #echo $height; 
        #echo " "; 
        #echo $width2; 
 
        if ($height === 1024){
        echo '<img style="display:block;margin-left:auto;margin-right:auto;margin-bottom:20px;"src="/screenshot/php.png">'; 
        }
        else{
        echo '<div><p style="font-size:80px;color:darkblue;text-align:center;">Please enter
        a valid URL.</p></div>'; 
        }
        flock($fp, LOCK_UN); 
    }
    fclose($fp); 
   }

  else{
    echo  '<div><p style="font-size:80px;color:darkblue;text-align:center;">You left the URL field blank!</p></div>';
  }
  echo '<div><a href="screenshotindex.php">'; 
    echo '<button style="font-size:80px;background: none; color:darkblue;margin:auto; 
    display:block;">Go Back</button>'; 
    echo '</a></div>';
  

  
   ?>
</body>
</html>
