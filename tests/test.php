<?php
require_once(dirname(__FILE__)."/../phpcontract.php");

function example($data) {
    _pre('Customer',$data);
}

//tests
//key literal
    $data_ok = array(
        'name' => "John"
    );
    $data_ko = array(
        'anme' => "John"
    );

example($data_ok);
?>
