<?php

function visualizeQuery ($form, $value1, $value2 = null, $value3 = null, $category = null)
{
    if ($form == 'category') {
        return "INSERT INTO categories (name) <br> VALUES (" . $value1 . ")";
    } else

}
