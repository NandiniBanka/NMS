<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>


	<?php 

$day = 'Monday';

// echo "Tdoay is : $day";

# echo "Tdoay is : $day";

/*echo "Tdoay is : $day"; */

//echo "Tdoay is : ".$day;


$number1 = 10;
$number2 = 56;

$sum = $number1 + $number2;

//echo 'Sum of '.$number1.' and '.$number2.'='. $sum;

// echo "Sum of $number1 and $number2 = $sum";


// if ($num>100) {
// 	echo " <br> output is greater than 100";
// } else {
// 	echo "<br> output is smaller than 100";
// }

// echo '<br><br><br><br><br>';

// for ($i=1; $i <=10 ; $i++) { 
// 	print_r('number is : '.$i.'<br>');
// }

//$array = [];

// tapes of array :  index, associative array, multi-dimensional array

$index_array = ['monday','tuesday','wednesday'];

// echo "<pre>";
// print_r($index_array);
// echo "</pre>";

$array = ['day1'=>'Monday','day2'=>'tuesday','day3'=>'wednesday']; // associative array

unset($array['day2']); // delete element from the array

$array['day2'] = 'saturday'; // add value in array
array_push($array, 'saturday'); // add value in array
array_push($array, 'saturday'); // add value in array

// echo "<pre>";
// print_r($array);
// echo "</pre>";

$multi_d_ar = [$index_array,$array];

// echo "<pre>";
// print_r($multi_d_ar[1]); // access array element
// echo "</pre>";


// USE OF HTML IN PHP

$name = $_GET['name'];

$my_name = '<p style="border: 1px solid #7777;width: 150px;text-align: center;padding: 10px;border-radius: 5px;">My name is <b>'.$name.'</b><p>';

// echo $my_name;


if ($_GET['submit']) {
	
	// echo "<pre>";
	// print_r($_GET);
	// echo "</pre>";

	$name = $_GET['visitor_name'];
	$email = $_GET['visitor_email'];

	echo "Enered name is : $name and entered email is : $email";
}

 ?>


 <form action="" method="GET">
 	<input type="text" name="visitor_name" placeholder="Enter your name">
 	<br>
 	<input type="email" name="visitor_email" placeholder="Enter your email">
 	<br>
 	<input type="submit" name="submit" value="Submit">
 </form>

</body>
</html>