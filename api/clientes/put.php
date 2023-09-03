<?php

if($acao == '' && $param == ''){
    echo json_encode(['ERRO' => 'Caminho não encontrado!']); exit;
}

if($acao == 'update' && $param == ''){
    echo json_encode(['ERRO' => 'É necessário informar um cliente.']); exit;
}

if($acao == 'update' && $param != ''){
    
    array_shift($_POST);
    $temp = [];
    $sql = "UPDATE clientes SET";
    
    foreach(array_keys($_POST) as $key){
        $temp[] = " {$key} = '{$_POST[$key]}'";
    }
    
    $sql .= implode(',', $temp);
    $sql .= " WHERE id = {$param}";

    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if ($exec) {
        echo json_encode(["dados" => 'Dados foram atualizados com sucesso.']);
    } else {
        echo json_encode(["dados" => 'Houve algum erro ao atualizar os dados.']);
    }
}