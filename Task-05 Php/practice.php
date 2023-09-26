<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
$color = 'red';
$color2= 'pink';
echo "Hello World! <br>";
echo "My favourite color is " .$color. "<br>";
echo "Hira's favourite color is " .$color2. "<br>";


$x= 10;
$y = 25;
$z= $x + $y;
echo "10 + 25 = " .$z. "<br>";

$DATE = date("d, D, M Y");
ECHO $DATE. "<br>";

$number =5;

if ($number =5) {
	echo "Value is 5" . "<br>";
}
else if ($number =4) {
	echo "Value is 4" . "<br>";
}


while ($number >3) {
	echo "Number is greater then 3" . "<br>";
	$number= $number-1;
}

?>

</body>
</html>