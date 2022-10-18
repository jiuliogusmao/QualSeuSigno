<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signos</title>
</head>
<body>
    <?php
    $nomePessoa = $_POST['nomePessoa'];
    $dataNasc = $_POST['dataNasc'];

    $data = new DateTime($dataNasc);

    $dataSigno = $data->format('m-d');

    // Abrindo o XML e armazenando como Objeto
    $xml = simplexml_load_file('descricaoSignos.xml');

    echo '<h4>' . $xml->titulo . '</h4>';
    echo '<p> Horoscopo ' . $hoje = date('d/m/Y') . '.</p>';
    echo '<h1>' . $nomePessoa .' seu signo é ';

    //Iterando sobre o XML exibindo as informações
    foreach ($xml->descricaoSignos as $registro) :
        if ($dataSigno >= $registro->dataInicio and $dataSigno <= $registro->dataFim) {
            echo $registro->signoNome . '</h1>';
            echo '<p>' . $registro->descricao . '<p>';
        }
    endforeach;

    ?>
    
</body>
</html>