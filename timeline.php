<!DOCTYPE html>
<html>
<head>
<title>Kini's Food Diary</title>
<link rel="shortcut icon" href="http://kini.nkmr.io/fooddiary/icon.ico" type="image/x-icon"/>

</head>
<style  type="text/css">
body {
	background-color:rgb(192, 192, 192);
	margin:15px;
	padding:0;
	font-family:"HPE";
}
div{ line-height:150px}
.linkall {
    display: flex;
    position: absolute;
    top: 120px;
    right:55px;
    transform: translate(-50%, -50%);
}
.link {
	display:inline-block;
	position:relative;
}
.word {
    display: flex;
    position: absolute;
    top: 150px;
    right:-80px;
    transform: translate(-50%, -50%);
}

a {
    position: relative;
    text-decoration: none;
    padding: 10px;
    font-size: 12px;
    color: #000;
    line-height: 0.2;
    transition: 0.2s all linear;
    cursor: pointer;
}

a::before {
    content: "";
    position: absolute;
    top: 0;
    left: 100%;
    width: 0;
    height: 100%;
    border-bottom: 0.8px solid #000;
    transition: 0.2s all linear;
}

a:hover::before {
    width: 100%;
    top: 0;
    left: 0;
    transition-delay: 0.1s;
    border-bottom-color: #000;
    z-index: -1;
}

a:hover ~ a::before {
    left: 0;
}

a:active {
    background: #000;
    color: #fff;
}

.theme{
    text-align:center; 
    font-weight: bolder;
    font-size: 35px;
}

.content{
    margin:120px;
}


</style>



  
<body>
 
  <div class="title">
    <div class="title"><img src="http://kini.nkmr.io/fooddiary/title.png"></div>
 </div>

 <div class="linkall">
    <a class="link" href="https://twitter.com/kinichi0027"><img src="http://kini.nkmr.io/fooddiary/twitter.png"></a>
    <a class="link" href="https://www.instagram.com/kinichi0027/"><img src="http://kini.nkmr.io/fooddiary/ins.png"></a>
    <a class="link" href="https://www.youtube.com/channel/UCqhfd0bmiM_1B-EDdGMI9Ug?view_as=subscriber"><img src="http://kini.nkmr.io/fooddiary/youtube.png"></a>
 </div>

 <div class="word">

    <a href="home.html">HOME</a>
    <a href="news.html">NEWS</a>
    <a href="profile.html">PROFILE</a>
    <a href="http://kini.nkmr.io/fooddiary/timeline.php">TIMELINE</a> 
    <a> |  </a>
    <a  href="contact.html">CONTACT</a>
   
  </div>

      
  <p class="theme">Timeline</p>

</body>
</html>

<form action="timeline.php" method="POST">
Date=<input type="text" name="Date">
Name of the Restaurant=<input type="text" name="Name of the Restaurant">
Location=<input type="text" name="Location">
Mark=<input type="text" name="Mark">
Comment=<input type="text" name="Comment">
    <input type="submit">
    </form>
    
    <?php
    $mysqli = new mysqli("localhost","nakamura-lab","n1k2m3r4fms");
    $mysqli->select_db("kini_db");
    $Y = $_POST["Date"];
    $M = $_POST["Name of the Restaurant"];
    $D = $_POST["Location"];
    $C = $_POST["Mark"];
    $P = $_POST["Comment"];
    $sql="INSERT INTO fooddiary (Date, Name of the Restaurant, Location, Mark, Comment) Values('$Y','$M','$D','$C','$P');";
    $results=$mysqli->query($sql);
    $results=$mysqli->query("select Date,Name of the Restaurant, Location, Mark, Comment from kakei_table");
    echo "<table>";
    while($line = $results->fetch_array(MYSQLI_BOTH)){
        echo "<tr><td>";
        echo $line["Date"];
        echo "</td><td>";
        echo $line["Name of the Restaurant"];
        echo "</td><td>";
        echo $line["Location"];
        echo "</td><td>";
        echo $line["Mark"];
        echo "</td><td>";
        echo $line["Comment"];
        echo "</td></tr>";
    }
    echo "</table>";
    $mysqli->close();
    ?>