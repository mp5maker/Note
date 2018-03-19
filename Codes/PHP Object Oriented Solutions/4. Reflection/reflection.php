<?php
/**
 * $date Assigning Datetime object to it!
 * @var DateTime
 */
$date = new DateTime();



echo "<pre>";
var_dump(new ReflectionClass($date));
echo "</pre>";

echo "<pre>";
Reflection::export(new ReflectionClass($date));
echo "</pre>";

echo "<pre>";
Reflection::export(new ReflectionClass('DateTimeZone'));
echo "</pre>";
?>