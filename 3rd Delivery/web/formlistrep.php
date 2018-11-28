<html>
<meta charset="UTF-8">
    <body>
        <h3>Listar eventos de reposição do produto: </h3>
        <form action="listrep.php" method="post">
            <p>EAN do produto: <input type="number" min="0" name="ean" required/></p>
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

              $sql = "SELECT * FROM evento_reposicao;";

              $result = $db->query($sql);


              echo "<table border=1 class=\"inlineTable\" style=\"float:left; margin-left: 30px;\">\n";
	      echo("<caption><b>Eventos de Reposicao</b></caption>");
              echo("<tr><td><b>Operador</b></td><td><b>Instante</b></td></tr>\n");
              foreach($result as $row)
              {
                  echo("<tr><td>");
                  echo($row['operador']);
                  echo("</td><td>");
                  echo($row['instante']);
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
