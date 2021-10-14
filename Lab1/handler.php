<?php
$start = microtime(true);
$isValid = false;
$x = $_POST["x"];
$y = $_POST["y"];
$r = $_POST["r"];
$data = "";
$maxlen = 10;

date_default_timezone_set("Europe/Moscow");

function check($x, $y, $r){
    if ($x <= 0 && $y >= 0 && $x >= -$r / 2 && $y <= $r ||
        $x >= 0 && $y >= 0 && $x * $x + $y * $y <= $r * $r ||
        $x >= 0 && $y <= 0 && $x - $y <= $r)
        return "True";
    else
        return "False";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (-3 <= $x && $x <= 5 && round($x) == $x && strlen($x) <= $maxlen &&
        -3 <= $y && $y <= 5 && strlen($y) <= $maxlen &&
        1 <= $r && $r <= 5 && round($r) == $r && strlen($r) <= $maxlen) 
        $isValid = true;

    if ($isValid)
        $data = array($x2, $y, $r, check($x, $y, $r), date("H:i:s"), microtime(true) - $start);
    else {
        header("Status: 400 Bad request", true, 400);
        exit;
    }
}
?>
<tr>
    <td><?php echo $data[0] ?></td>
    <td><?php echo $data[1] ?></td>
    <td><?php echo $data[2] ?></td>
    <td><?php echo $data[3] ?></td>
    <td><?php echo $data[4] ?></td>
    <td><?php echo $data[5] ?></td>
</tr>
