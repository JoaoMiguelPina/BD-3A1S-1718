<html>
<meta charset="UTF-8">
    <body>
        <h3>Listar sub-categorias de uma super-categoria: </h3>
        <form action="listsubcats.php" method="post">
            <p>Nome da categoria: <input type="text" name="categoria" required/></p>
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

              $sql = "SELECT * FROM categoria;";

              $result = $db->query($sql);

              echo "<table border=1 class=\"inlineTable\" style=\"float:left;\">\n";
	      echo("<caption><b>Categorias</b></caption>");
              echo("<tr><td><b>Nome</b></td></tr>\n");
              foreach($result as $row)
              {
                  echo("<tr><td>");
                  echo($row['nome']);
                  echo("</td></tr>\n");
              }
              echo("</table>\n");



              $sql = "SELECT * FROM super_categoria;";

              $result = $db->query($sql);

              echo "<table border=1 class=\"inlineTable\" style=\"float:left; margin-left: 30px;\">\n";
	      echo("<caption><b>Super-Categorias</b></caption>");
              echo("<tr><td><b>Nome</b></td></tr>\n");
              foreach($result as $row)
              {
                  echo("<tr><td>");
                  echo($row['nome']);
                  echo("</td></tr>\n");
              }
              echo("</table>\n");



              $sql = "SELECT * FROM categoria_simples;";

              $result = $db->query($sql);

              echo "<table border=1 class=\"inlineTable\" style=\"float:left; margin-left: 30px;\">\n";
	      echo("<caption><b>Categorias Simples</b></caption>");
              echo("<tr><td><b>Nome</b></td></tr>\n");
              foreach($result as $row)
              {
                  echo("<tr><td>");
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
