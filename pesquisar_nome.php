<?php
// PESQUISAR_NOME.PHP

include("conecta.php");

$nome = $_GET["nome"];


$sql= "SELECT * FROM inscritos WHERE nome_ins LIKE '%$nome%'";
$resultado = mysqli_query($conecta,$sql);
$numero_linhas = mysqli_num_rows($resultado);  

if($numero_linhas==0)
{
	echo("Nome não encontrado...");
}
else
	{
		while ($linha = mysqli_fetch_array($resultado))
		{
			$nome = $linha["nome_ins"];
			$curso = $linha["curso_ins"];
			echo("$nome - $curso <br><br>");
		}
	}
?>