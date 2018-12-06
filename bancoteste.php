<HTML>
  <HEAD>
    <TITLE>Banco Teste</TITLE>
  </HEAD>
  <BODY>
    <H3>Conectando ao Banco de Dados</H3>
    <?php
    $con = mysqli_connect("localhost", "root", "", "clientes") or die ("Não foi possivel conectar ao banco de dados");
    ?>
    <P>Conectando ao Banco</P>
      <?php
        function login(){
          $banco = new mysql("servidor","usuario","senha");
          $sql = "Select * From cliente and sexo";
          $consulta = $banco-> query($sql);
          $resposta = array ();
          $i = 0;

            while (!empty($consulta[$i]))
            {
              $row = $consulta[$i]=
              $resposta[] = row;
              $i++;
            }
          return $consulta;  
        }
        function exibir(){
          $model = new Model();
          $resposta = $model -> carregar();
          $this -> load -> view ("resposta.html",$resposta);
        }
      ?>
    <P>Insira os dados para o Banco</P>
    <?php
      mysqli_select_db($con,'cliente');
      mysqli_query($con, "
        INSERT INTO cliente (CPF, NOME, EMAIL, TELEFONE, COD_SEXO)
        VALUES ('0123.456.789-93', 'safadao de freitas leite', 'safadao@EMAIL', '12345678', '01' );
      ");
      mysqli_select_db($con, "sexo");
      mysqli_query($con, "
        INSERT INTO sexo (COD_SEXO, NOME)
        VALUES ('02', 'F');
      ");  
    ?>
   <P>Os dados foram inseridos com sucesso!<P> 
   <p>Dados da tabela:</p>
   <?php
   		$dados = mysqli_query($con, "
   			SELECT C.CPF, C.NOME, C.EMAIL, C.TELEFONE, S.SEXO
   			FROM cliente C, sexo S
   			WHERE C.COD_SEXO = C.COD_SEXO;
   		");
   		while($print = mysqli_fetch_assoc($dados)) {
   			echo $print['CPF'] ." | ";
   			echo $print['NOME'] ." | ";
   			echo $print['EMAIL'] ." | ";
   			echo $print['TELEFONE'] ." | ";
   			echo $print['SEXO'] ." | ";
   			echo "<br>";
   		}
   ?>
  </BODY>
</HTML>
