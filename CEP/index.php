<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'buscar.php';

$dados = null;
$erros = null;

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cep'])) {
    $result = buscar($_POST['cep']);

    if(isset($result['erro'])) {
        $erros = $result['erro'];
    } else {
        $dados = $result;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar CEP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="flex items-center justify-between bg-blue-400 h-[110px]">
        <h1 class="p-6 text-xl font-bold">Consultar CEP via API</h1>
        <div class="flex justify-start items-center p-6">
            <img class="rounded-full flex justify-end  w-20"  src="./img/gato.jpg" alt="">
        </div>
    </header>

    <div class="flex flex-col justify-center items-center">
        <h1 class="text-lg font-bold">Grupo:</h1>
            <div class="flex flex-col items-center">
                <p class="text-xl">Kelvin</p>
                <p class="text-xl">Ana julia</p>
                <p class="text-xl">José pinto</p>
                <p class="text-xl">Vitor Gabriel</p>
            </div>
    </div>


    <div class="flex justify-center items-center h-screen flex-col">
        <h1 class="text-xl">BUSCAR CEP</h1>
        <form action="index.php" method="POST" class="mt-4">
            <input type="text" name="cep" placeholder="Digite o CEP" 
                   class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 outline-none"
                   required>
            <button type="submit" 
                    class="w-full bg-blue-500 text-white p-2 rounded-md mt-2 hover:bg-blue-600">
                Buscar
            </button>
        </form>

        <?php if($erros): ?>
            <div class="bg-red-500 text-white p-2 rounded-md mt-4">
                <?= htmlspecialchars($erros) ?>
            </div>
        <?php endif; ?>

        <?php if ($dados): ?>
            <div class="bg-green-500 text-white p-2 rounded-md mt-4">
                <h2>Resultado:</h2>
                <p>CEP: <?= htmlspecialchars($dados['cep']) ?></p>
                <p>Logradouro: <?= htmlspecialchars($dados['logradouro']) ?></p>
                <p>Bairro: <?= htmlspecialchars($dados['bairro']) ?></p>
                <p>Cidade: <?= htmlspecialchars($dados['localidade']) ?></p>
                <p>Estado: <?= htmlspecialchars($dados['uf']) ?></p>
            </div>
        <?php endif; ?>
    </div>

    <footer class="bg-blue-400 text-white text-center p-4 mt-8">
    <p>&copy; <?= date("Y") ?> - ViaCEP</p>
    <p>Desenvolvido por <a href="#" class="underline hover:text-gray-200">Kelvin - 3NT</a></p>
</footer>

</body>
</html>