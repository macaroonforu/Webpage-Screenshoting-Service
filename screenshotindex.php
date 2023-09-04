<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-color: white;  
        }
        .center{
            background-color: white; 
            padding: 10px 10px; 
            border: 3px dotted white; 
            text-align: center; 
            font-size: 56px; 
            color; darkblue; 
            text-shadow: 2px 2px #ffffff; 
            position: absolute; 
            top: 50%; 
            left: 50%; 
            -ms-transform: translateX(-50%) translateY(-50%); 
            -webkit-transform: translate(-50%, -50%); 
            transform: translate(-50%, -50%); 
        }
        input[type=text]{
            width: 400px; 
            height: 50px; 
            border: 3px solid darkblue; 
            font-size: 56px; 
            color: darkblue; 
            background-color: yellow; 
            padding: 10px 10px; 
        }
        #id1{
            display: none; 
            margin-left: auto; 
            margin-right:auto; 
        }
        p{
        font-size: 56px; 
        color: darkblue; 
        text-align: center; 
        } 
    </style>
</head>
<body>
    <p>Web Screenshot Tool</p>
    <img id="id1" src="animation.gif" style="display:none">
    <script>
    	document.getElementById("id1").style.display = "none"; 
        function sub(){
            document.getElementById("id1").style.display = "block"; 
        }
    </script>
    <div class="center">
        <form name="form1" method="post" action="screenshot.php" onsubmit="sub()">
            URL: <input type="text" name="url">
        </form>
    </div>
</body>
</html>
