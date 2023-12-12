<?php
//PHP VARIABLES
//Integers
$int_var = 12345;
$another_int =  12345 + 12345;
print("Here are examples of an integer: $int_var and $another_int<br>");

//Doubles
$many = 2.2888800;
$many_2 = 2.1111200;
$few = $many + $many_2;
print("Here is an example of doubles: $many +$many_2 = $few");

//Interpreting other types as Booleans
$true_num = 3 + 0.14159;
$true_str = "Tried and true";
$true_array[49] = "An array element";
$false_array = array();
$false_null = NULL;
$false_num = 999 - 999;
$false_str = "";

//NULL
$my_var = null;

//Strings
$variable = "name";
$literally = "My $variable will not print!\n";
print($literally);
$literally = "My $variable will print!\n";
print($literally);

//Local Variables
$x = 4;
function assignx(){
    $x = 0;
    print("\$x inside function is $x.");
} 
assignx();
print("\$x outside f function is $x.");

//PHP Function Paramaters
//multiply a value by 10 and return it to the caller
function multiply($value){
    $value = $value * 10;
    return $value;
}
$retval = multiply(10);
print("Return value is $retval\n");

//PHP Gloval Variables
$somevar = 15;
function addit(){
    GLOBAL $somevar;
    $somevar++;
    print("Somevar is $somevar");
}
addit();

//PHP Static Variables
function keep_track(){
    STATIC $count = 0;
    $count++;
    print($count);
    print("");
}
keep_track();
keep_track();
keep_track();
?>
