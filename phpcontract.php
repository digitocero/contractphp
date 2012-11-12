<?php
function _pre($name, $data) {
    _type($name, $data);
}
function _post($name, $data) {
    _type($name, $data);
}
function _type($ins_name, $ins) {
    //print_r($ins);
    //die();

    $def = config_get($ins_name);
    //print_r($def);
    //recorremos definición e instancia

    foreach ($def as $def_key=>$def_value) {
        //check keys
        if(strstr($def_key,':')) {
            //expression
        } else {
            //literal
            if(!array_key_exists($def_key, $ins)) {
                error("key '$ins_name::$def_key' does not exist");
            }
        }
        //heck values
    }
}
function config_get($key, $config_file = 'types.php') {
    require $config_file;
    if(array_key_exists($key, $a)) {
        return $a[$key];
    } else {
        error("name '$key' does not exist in definition");
    }
}
function check_expression($string) {
    switch ($string) {
    case ':string':
            return is_string();
            break;
    case ':int':
            return is_int();
            break;
        
        default:
            break;
    }
}
function error($text) {
    echo "\n";
    echo('Error:'.$text."\n");
    echo "\n";
    echo "Called from:\n";
    $backtrace = debug_backtrace();
    //siempre la última llamada
    //da un error útil
    $count = count($backtrace);
    $index = $count -1;

    foreach ($backtrace[$index] as $key=>$value) {
        echo '--'.$key.":\n";
        print_r($value);
        echo "\n";
    }
    die();
}
?>
