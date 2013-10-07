<?php
/**
 * Script for the autocompletion in jQuery Plugin tagedit.
 *
 * @author Oliver Albrecht <info@webwork-albrecht.de>
 */

$autocompletiondata = array(
    3 => 'some_tag',
    4 => 'ohter_tag',
    5 => 'Abc',
    6 => 'One',
    7 => 'Two',
    8 => 'Something'
);

if(isset($_GET['term'])) {
    $result = array();
    foreach($autocompletiondata as $key => $value) {
        if(strlen($_GET['term']) == 0 || strpos(strtolower($value), strtolower($_GET['term'])) !== false) {
            $result[] = '{"id":"'.$key.'","label":"'.$value.'","value":"'.$value.'"}';
        }
    }
    
    echo "[".implode(',', $result)."]";
}
?>