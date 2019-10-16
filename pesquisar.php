<?php
// PESQUISAR.PHP

include("conecta.php");

$cpf = $_POST["cpf"];


$sql= "SELECT * FROM inscritos WHERE cpf_ins = '$cpf' LIMIT 1";
$resultado = mysqli_query($conecta,$sql);
$numero_linhas = mysqli_num_rows($resultado);  

if($numero_linhas==0)
{
	// Enviando no formato JSON:
	$MEU_JSON = [];
	$MEU_JSON = array('nome'  => "", 
						  'curso' => "",
						  'cidade'=> "",
						  'sexo'  => "");

	echo json_encode($MEU_JSON);
}
else
	{
		while ($linha = mysqli_fetch_array($resultado))
		{
			$nome = $linha["nome_ins"];
			$curso = $linha["curso_ins"];
			$cidade = $linha["cidade"];
			$sexo = $linha["sexo_ins"];
			
			// Enviando no formato JSON:
			$MEU_JSON = [];
			$MEU_JSON = array('nome'  => "$nome", 
							  'curso' => "$curso",
							  'cidade'=> "$cidade",
							  'sexo'  => "$sexo");

			echo json_encode($MEU_JSON);

		}
	}
?>