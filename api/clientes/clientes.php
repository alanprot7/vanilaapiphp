<?php

if ($api == 'clientes'){

    if($method == 'GET'){
        include_once "get.php";
    }

    if($method == 'POST'){
        include_once "post.php";
    }

    if($method == 'POST' && $_POST['_method'] == 'PUT'){
        include_once "put.php";
    }

}

function aspas($x){
    return "'$x'";
}