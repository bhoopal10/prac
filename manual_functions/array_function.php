<?php
/**
 * @param $search
 * @param $arr
 * @param $key_of_search
 * @param $name_of_key_to_return_value
 * @return bool
 */function get_value_from_array($search,$arr,$key_of_search,$name_of_key_to_return_value)
{
    if(is_array($arr))
    {

        foreach($arr as $values)
        {

            if($values[$key_of_search] == $search)
            {
            return $values[$name_of_key_to_return_value];
            }
        }
    }
    return false;
}
/**
 * @param $search
 * @param $arr//Object array
 * @param $key_of_search
 * @param $name_of_key_to_return_value
 * @return bool
 */function get_value_from_object_array($search,$arr,$key_of_search,$name_of_key_to_return_value)
{
    if(is_object($arr))
    {
        if($arr->$key_of_search == $search)
        {
            return $arr->$name_of_key_to_return_value;
        }
    }
    return false;
}
/**
 * @param $comma_separated_string
 * @param $arr
 * @param $key_of_search
 * @param $name_of_key_to_return_value
 * @return string
 */
function get_multi_value_from_object_array($comma_separated_string,$arr,$key_of_search,$name_of_key_to_return_value)
{
    $search=explode(',',$comma_separated_string);
    $value='';
    foreach($search as $search_value)
    {
        foreach($arr as $arry)
        {
             if($arry->$key_of_search == $search_value)
                {
                    $value.=$arry->$name_of_key_to_return_value.',';
                }
         }
    }
    $res=substr($value,0,-1);
    return $res;

}

?>