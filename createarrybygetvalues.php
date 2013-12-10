<?php
$val="case_no=one&case_name=two&case_type=three&case_subject=four";
$arr=explode('&',$val);
$res=array();
foreach($arr as $a=>$val)
{
$v=explode('=',$val);
$res[$v[0]]=$v[1];

}
print_r($res);
?>
