<html>
<meta charset="UTF-8">
    <body>
      <?php
          $nova_categoria = $_REQUEST['nova_categoria'];
          $super_nova = $_REQUEST['super_nova'];

          try
          {
              $host = "db.ist.utl.pt";
              $user ="ist426371";
              $password = "mhmc4762";
              $dbname = $user;
              $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              $db->query("start transaction;");

              $sql = "INSERT INTO categoria VALUES('$nova_categoria');";
              $db->query($sql);
              $sql = "INSERT INTO categoria_simples VALUES('$nova_categoria'); ";
              $db->query($sql);
              #insere nova categoria


              #lida com super
              if($super_nova !== "") {
                #Se houver super_nova
                $sql = "SELECT nome FROM super_categoria WHERE nome = '$super_nova';";
                $result = $db->query($sql);
                $lines = $result->rowCount();
                if($lines == 0) {
                  #se super_nova nao estiver na tabela das supers
                  $sql = "SELECT nome FROM categoria_simples WHERE nome = '$super_nova';";
                  $result = $db->query($sql);
                  $lines = $result->rowCount();
                  if ($lines > 0){
                    #se super_nova estiver na tabela das simples
                    $sql = "DELETE FROM categoria_simples WHERE nome = '$super_nova';";
                    $db->query($sql);
                    $sql = "INSERT INTO super_categoria VALUES('$super_nova');";
                    $db->query($sql);
                  }
                }
                $sql = "INSERT INTO constituida VALUES('$super_nova','$nova_categoria');";
                $db->query($sql);

              }
              $db->query("commit;");

              echo("Sucesso! Adicionou a categoria <b>$nova_categoria</b> à Base de Dados!");


              $db = null;
          }
          catch (PDOException $e)
          {
              $db->query("rollback;");
              echo("<p>ERROR: {$e->getMessage()}</p>");
          }
      ?>
    <p><input type="button" value="Voltar à página anterior" onclick="window.location='formcategorias.php';"/></p>
    </body>
</html>
