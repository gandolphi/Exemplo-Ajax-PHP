<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>CADASTRO</title>
        <script src="jquery-3.4.1.min.js">
        </script>
	
        <script>
            function Pesquisar()
            {
                var C = cpf.value;
                
                if(C.length==11)
                {
                    var dados = "cpf=" + C;
			
			        $.ajax({
				    type: "POST",
                    url: "pesquisar.php",
                    data: dados,
                    success: function(RESPOSTA_PHP)
				    {
                        console.log(RESPOSTA_PHP);

                        var R = JSON.parse(RESPOSTA_PHP);
                        if(R.nome=="")
                        {
                            alert("CPF NÃO ENCONTRADO.");
                        }
                        else{
                            nome.value = R.nome;
                            cidade.value = R.cidade;
                            curso.value = R.curso;
                            if(R.sexo=="M")
                            {
                                sexo_m.checked = true;
                            }
                            if(R.sexo=="F")
                            {
                                sexo_f.checked = true;
                            }
                        }
                
				    }
			        });

                }
                
            }

            function Pesquisar_Nome()
            {
                var N = nome.value;
                var url = "pesquisar_nome.php?nome=" + N;
                window.open(url,"_blank");
            }
        </script>

</head>
<body>
    <form action="inserir.php" method="post">
    <table align='center'>
        <tr>
            <td colspan='2' align='center'>
                INSCRIÇÃO DE ALUNO
            </td>
        </tr>
    <tr>
        <td>CPF:</td>
        <td>
            <input required type='number' name="cpf" id="cpf">
            
            <img src="pesquisar.png" width="20px" onclick="Pesquisar();">
        
        </td>
    </tr>
    <tr>
        <td>NOME:</td>
        <td><input required type='text' name="nome" id="nome">
        <img src="pesquisar.png" width="20px" onclick="Pesquisar_Nome();"></td>
    </tr>    
    <tr>
        <td>CURSO:</td>
        <td>
            <select name="curso" id="curso">
                
                <?php
                    // FAZ A CONEXÃO COM A BASE SENAI
                    include("conecta.php");
                    // SQL A SER EXECUTADO
                    $sql = "SELECT DISTINCT(curso_ins) FROM inscritos";
                    $resultado = mysqli_query($conecta,$sql);
                    // BUSCANDO CADA CURSO
                    while ($linha = mysqli_fetch_array($resultado))
                    {
                        $curso = $linha["curso_ins"];
                        // INSERINDO OS CURSOS NO SELECT DO HTML
	                    echo("<option>$curso</option>");
                    }
                    // A linha abaixo esvazia a variável $resultado 
                    mysqli_free_result($resultado);
                    // FECHANDO A CONEXÃO COM A BASE DE DADOS
                    mysqli_close($conecta);
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>CIDADE:</td>
        <td><input required type='text' name="cidade" id="cidade"></td>
    </tr>
    <tr>
        <td>SEXO:</td>
        <td>
            <input required type='radio' 
            name="sexo" value="M" id="sexo_m">Masculino

            <input required type='radio' 
            name="sexo" value="F" id="sexo_f">Feminino
        </td>
    </tr>
    <tr>
        <td colspan='2' align='center'>
            <br><br><br>
            <input type='submit' value='INSERIR'>
        </td>
    </tr>
</table>
</form>
</body>
</html>