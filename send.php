<?php

define('db_name', '_livemap');
define('db_host', 'localhost');
define('db_user', 'anthony');
define('db_pass', 'db_password');


if($_POST['type']=='updatepos'){
if(isset($player)){
    $db = new mysqli(db_host, db_user, db_pass, db_name);
    $stmt = $db->stmt_init();
    //$stmt->prepare("TRUNCATE TABLE _players");
    if ($stmt->prepare("INSERT INTO `_blocks` (`c`,`x`,`y`) VALUES (?,?,?)")){
        $stmt->bind_param('sii', $p1, $p2, $p3);
        $p1 = $_POST['c'];
        $p2 = $_POST['x'];
        $p3 = $_POST['y'];
        $stmt->execute();
        $stmt->close();
    }
}
}

if(!isset($_POST['type'])){
  ?>
  <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<body>

<canvas id="myCanvas" width="1000" height="1000" style="border:1px solid #d3d3d3;">
Your browser does not support the HTML5 canvas tag.</canvas>
    <script>
<?php
$mysqli = new mysqli(db_host, db_user, db_pass, db_name);
$query = "SELECT c, x, y FROM _blocks";

if ($stmt = $mysqli->prepare($query)) {
    $stmt->execute();
    $stmt->bind_result($c, $x, $y);
    while ($stmt->fetch()) {
        ?>
        var c=document.getElementById("myCanvas");
        var ctx=c.getContext("2d");
        ctx.moveTo(0,0);
        /*ctx.strokeText("<?php //echo $row['player']; ?>", <?php //echo $row['x'] / 10 + 3; ?>,<?php //echo $row['y'] / 10 + 3; ?>);*/
        ctx.fillRect(<?php echo $x / 10; ?>,<?php echo $y / 10; ?>,2,2);
        ctx.stroke();
        <?php
    }
    $stmt->close();
}
$mysqli->close();
?>
</script>
</body>
</html>
<?php
mysqli_close($con);
}
?>
