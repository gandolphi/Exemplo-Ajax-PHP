<?php

include("conecta.php");

$cpf    =   $_POST["cpf"];
$nome   =   $_POST["nome"];

//EVITAR O SQL INJECTION
$nome.str_replace("*","",$nome);
$nome.str_replace("script","",$nome);
$nome.str_replace("NULL","",$nome);
$nome.str_replace("DELETE","",$nome);
$nome.str_replace("href","",$nome);

$cidade =   $_POST["cidade"];
$sexo   =   $_POST["sexo"];
$curso  =   $_POST["curso"];



$sql = "INSERT INTO inscritos(cpf_ins,nome_ins,
cidade,sexo_ins,curso_ins) VALUES('$cpf','$nome',
'$cidade','$sexo','$curso')";

$resultado = mysqli_query($conecta,$sql);

$MATRICULA = mysqli_insert_id($conecta);

mysqli_close($conecta);

echo("
<script>
    alert('DADOS INSERIDOS PARA MATRÍCULA: $MATRICULA');
</script>
    ");

include("index.php");

?>