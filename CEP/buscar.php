<?php 
function buscar($cep) {
    $cep= preg_replace('/[^0-9]/', '', $cep); 

    if(strlen($cep) !== 8) {
        return "CEP invalido";
    }

    $url = "https://viacep.com.br/ws/$cep/json/";
    $response = @file_get_contents($url);
    $dados = json_decode($response, true);

    if (isset($dados['erro'])) {
        return ["erro" => "CEP não encontrado"];
    }

    return $dados;
}

?>