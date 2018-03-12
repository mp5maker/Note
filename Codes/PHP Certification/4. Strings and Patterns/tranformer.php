<?php 
/**
 * Shows find the letter prints it after that searched letter
 */
echo "strstr<br/>";
$string = "abc";
echo strstr($string, "b")."<br/>";
echo "==============";
echo "<br/>";

echo "String Array<br/>";
$string = "abc";
echo $string[1]."<br/>";
echo "==============";
echo "<br/>";

/**
 * Compares between two strings (Case Insensitive)
 */
echo "String Compare<br/>";
$string = "I am a good boy";
echo "<pre>";
var_dump(strcasecmp($string, "i am a good boy"));
echo "</pre>";
echo "==============";
echo "<br/>";

/**
 * WhiteList
 */
echo "strspn<br/>";
$haystack = "aaaabbbccddasdf";
$needle = "abcd";
echo strspn($haystack, $needle)."<br/>";
echo "==============";
echo "<br/>";
?>