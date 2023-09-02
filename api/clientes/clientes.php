<?php

if ($api == 'clientes'){
    if($method == 'GET'){
        if($acao == ''){
           echo json_encode(['ERRO' => 'Caminho não encontrado!']);
        }
        if ($acao == 'lista'){
            $db = DB::connect();
            $rs = $db->prepare("SELECT * FROM clientes ORDER BY nome");
            $rs->execute();
            $obj = $rs->fetchAll(PDO::FETCH_ASSOC);
            
            if ($obj) {
                echo json_encode(["dados" => $obj]);
            } else {
                echo json_encode(["dados" => 'Não existem dados para retornar']);
            }
        }
    }
}