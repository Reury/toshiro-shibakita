<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=iso-8859-1');
?>
<html>

<head>
<title>Exemplo PHP</title>
</head>
<body>

<?php



echo 'Versao Atual do PHP: ' . phpversion() . '<br>';

$servername = getenv('DB_HOST') ?: "db";
$username = getenv('DB_USER') ?: "user";
$password = getenv('DB_PASSWORD') ?: "secret";
$database = getenv('DB_NAME') ?: "toshiro_db";

// Criar conexão


$link = new mysqli($servername, $username, $password, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

printf("Connected successfully to database: %s<br>", $database);

$valor_rand1 =  rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();


$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) VALUES ('$valor_rand1' , '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2','$host_name')";


if ($link->query($query) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $link->error;
}

?>
</body>
</html>
