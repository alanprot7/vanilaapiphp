<?php

if($acao == '' && $param == ''){
    echo json_encode(['ERRO' => 'Caminho não encontrado!']);
}

if($acao == 'adiciona' && $param == ''){
    $sql = "INSERT INTO clientes (";
    $sql .= implode(",", array_keys($_POST));
    $sql .= ") VALUES (";
    $sql .= implode(",", array_map('aspas', array_values($_POST)));
    $sql .= ")";
    
    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();

    if ($exec) {
        echo json_encode(["dados" => 'Dados foram inseridos com sucesso.']);
    } else {
        echo json_encode(["dados" => 'Houve algum erro ao inserir os dados.']);
    }
}
