<html>
<meta charset="UTF-8">
    <body>
        <h3>Inserir produto </h3>
        <form action="addproduto.php" method="post">
            <p>EAN:<input type="number" name="novo_ean" required/></p>
            <p>Designação: <input type="text" name="nova_designacao" required/></p>
            <p>Categoria: <input type="text" name="nova_categoria" required/></p>
            <p>Data do Fornecimento (AAAA-MM-DD): <input type="text" name="nova_data" required/></p>
            <h4>Fornecedor Primário </h4>
            <p>NIF do fornecedor primario: <input type="number" name="novo_nif" required/></p>
            <p>Nome do fornecedor primario: <input type="text" name="novo_nome" required/></p>
            <h4>Fornecedor Secundário </h4>
            <div id="wrapper" style="display: none;">
              <div id="form_a_duplicar">
              <p>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</p>
              <p>NIF do fornecedor secundario: <input type="number" name="novo_nif_sec[]"/></p>
              <p>Nome do fornecedor secundario: <input type="text" name="novo_nome_sec[]"/></p>
              </div>
            </div>
            <div id="wrapper2">
            <p>NIF do fornecedor secundario: <input type="number" name="novo_nif_sec[]" required/></p>
            <p>Nome do fornecedor secundario: <input type="text" name="novo_nome_sec[]" required/></p>
            </div>
            <p><input type="button" value="Adicionar fornecedor secundário" onclick="document.getElementById('wrapper2').appendChild( document.getElementById('form_a_duplicar').cloneNode(true));"/></p>
            <p><input type="submit" value="Submeter" style="border-radius:15px; font-weight:bold;"/></p>

        </form>

        <h3>Remover produto </h3>
        <form action="removeproduto.php" method="post">
            <p>EAN: <input type="number" name="ean_remove" required/></p>
            <p><input type="submit" value="Submeter" style="border-radius:15px; font-weight:bold;"/></p>
            <p><input type="button" value="Voltar à pagina inicial" onclick="window.location='index.html';"/></p>
        </form>

        <?php
        try
            {
              $host = "db.ist.utl.pt";
              $user ="ist426371";
              $password = "mhmc4762";
              $dbname = $user;


              $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $sql = "SELECT * FROM produto;";

              $result = $db->query($sql);

              echo "<table border=1 class=\"inlineTable\" style=\"float:left;\">\n";
 	      echo("<caption><b>Produtos</b></caption>");
              echo("<tr><td><b>EAN</b></td><td><b>Design</b></td><td><b>Categoria</b></td><td><b>Fornecedor Primario</b></td><td><b>Data</b></td></tr>\n");
              foreach($result as $row)
              {
                  echo("<tr><td>");
                  echo($row['ean']);
                  echo("</td><td>");
                  echo($row['design']);
                  echo("</td><td>");
                  echo($row['categoria']);
                  echo("</td><td>");
                  echo($row['forn_primario']);
                  echo("</td><td>");
                  echo($row['data']);
                  echo("</td></tr>\n");
              }
              echo("</table>\n");


              $sql = "SELECT * FROM categoria;";

              $result = $db->query($sql);

              echo "<table border=1 class=\"inlineTable\" style=\"float:left; margin-left: 30px;\">\n";
	      echo("<caption><b>Categorias</b></caption>");
              echo("<tr><td><b>Nome</b></td></tr>\n");
              foreach($result as $row)
              {
                  echo("<tr><td>");
                  echo($row['nome']);
                  echo("</td></tr>\n");
              }
              echo("</table>\n");


              $sql = "SELECT * FROM fornecedor;";

              $result = $db->query($sql);

              echo "<table border=1 class=\"inlineTable\" style=\"float:left; margin-left: 30px;\">\n";
	      echo("<caption><b>Fornecedores</b></caption>");
              echo("<tr><td><b>Nif</b></td><td><b>Nome</b></td></tr>\n");
              foreach($result as $row)
              {
                  echo("<tr><td>");
                  echo($row['nif']);
                  echo("</td><td>");
                  echo($row['nome']);
                  echo("</td></tr>\n");
              }
              echo("</table>\n");

              $db = null;
          }
          catch (PDOException $e)
          {
              echo("<p>ERROR: {$e->getMessage()}</p>");
          }
        ?>
    </body>
</html>
