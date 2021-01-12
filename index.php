<!DOCTYPE html>
<html>
<head>
	<title>chaterminal</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<style>
    /* selector */
    ::selection {
    color: black;
    background: rgba(249, 166, 32, 0.99);
    }
    /* width */
    ::-webkit-scrollbar {
    width: 20px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
    background: #292F36; 
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
    background: #FFFFFF; 
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
    background: #FFFFFF; 
    }
</style>
<body style="background-color:#292F36; color:#FFFFFF; font-family:Courier; margin: 5% 10% 0%; padding: 0; font-size: 200%">
<!--<form action="/" method="GET" autocomplete="off">
  <div style="display: flex; font-size: inherit">
    <label for="room" style="flex-grow: 3; font-size: inherit">Room:</label>
    <input type="text" name="room" placeholder="Room . . ." style="background-color:black; color: white; font-family:Courier; flex-grow: 97; border: 1px solid gray; padding: 3px; font-size: inherit">
  </div>
  <br>
  <div style="display: flex; font-size: inherit">
    <input type="submit" value="Refresh" style="background-color:black; color: white; font-family:Courier; border: 1px solid gray; padding: 3px; color: gray; font-size: inherit; flex-grow: 1">
  </div>
</form>
<br>-->
<form action="post.php" method="POST" autocomplete="off">
  <div style="display: flex; font-size: inherit">
    <label for="user" style="flex-grow: 3; font-size: inherit">User:</label>
    <input type="text" name="user" placeholder=". . ." value="<?php echo ''.isset($_GET['user']) && !empty($_GET['user']) ? htmlspecialchars($_GET['user']) : '""'.'' ?>" style="background-color:#292F36; color: #FFFFFF; font-family:Courier; flex-grow: 97; border: 1px solid #FFFFFF; padding: 3px; font-size: inherit">
  </div>
  <br>
  <div style="display: flex; font-size: inherit">
    <label for="room" style="flex-grow: 3; font-size: inherit">Room:</label>
    <input type="text" name="room" placeholder=". . ." value="<?php echo ''.isset($_GET['room']) && !empty($_GET['room']) ? htmlspecialchars($_GET['room']) : '""'.'' ?>" style="background-color:#292F36; color: #FFFFFF; font-family:Courier; flex-grow: 97; border: 1px solid #FFFFFF; padding: 3px; font-size: inherit">
  </div>
  <br>
  <div style="display: flex; font-size: inherit">
    <label for="body" style="flex-grow: 3; font-size: inherit">Mesg:</label>
    <input type="text" name="body" placeholder=". . ." autofocus style="background-color:#292F36; color: #FFFFFF; font-family:Courier; flex-grow: 97; border: 1px solid #FFFFFF; padding: 3px; font-size: inherit">
  </div>
  <div style="display: flex; font-size: inherit; visibility: hidden; margin: 0; padding: 0">
    <input type="submit" value="Submit" style="background-color:#292F36; font-family:Courier; flex-grow: 1; border: 1px solid #FFFFFF; padding: 0px; margin: 0; color: #FFFFFF; font-size: inherit; flex-grow: 1; visibility: hidden">
  </div>
</form>
<div id="msgs"></div>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $("#msgs").load("<?php echo "get.php/?room=" . urlencode($_GET['room']) ?>");
        setInterval(function(){
            $("#msgs").load("<?php echo "get.php/?room=" . urlencode($_GET['room']) ?>");
        }, 1000);
    });
</script>
</body>
</html>