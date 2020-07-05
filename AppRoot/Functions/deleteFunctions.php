<?php

//Delete data it takes table name column name & value
function deleteData($tablename = '', $columnName = '', $value = '', $columnName1 = '', $value1 = ''){
   //Link for connection
    global $link, $errors;
    if(empty($tablename) || empty($columnName) || empty($value)){
        return false;
    }
    $query = "DELETE FROM {$tablename} WHERE {$columnName} = '{$value}' ";
    if(!empty($columnName1) && !empty($value1)){
        $query .= " AND {$columnName1} = '{$value1}' ";
    }
    $query = mysqli_query($link, $query);
    if($query){
        return true;
    }else{
        array_push($errors,'Sorry Data entry Fail... Check your query!');
    }
    return false;
}

