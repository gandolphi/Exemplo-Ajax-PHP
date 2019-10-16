<?php
// SERVIDOR, USUÁRIO, SENHA, BASE DE DADOS
$conecta = mysqli_connect("localhost", "usuario", "123456", "escola") or print(mysqli_error());

// Usado para configuração de acentuações:
mysqli_set_charset($conecta,'utf8');

?>