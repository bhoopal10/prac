<?php
$date='2013-03-15';//this is given date string
echo date('d-m-Y',strtotime($date));//to convert string to date and changing formate
echo date('d-M-Y',strtotime($date));// to convert string to date and changing formate
?>
ouptput: 15-03-2013
         15-Mar-2013
