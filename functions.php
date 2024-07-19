<?php 

function add($number1,$number2=30){

	$sum = $number1 + $number2;

	return  ' Sum of '.$number1.' and '.$number2.'='.$sum;
}


echo add(10,20);

 ?>