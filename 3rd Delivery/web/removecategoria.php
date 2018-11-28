<html>
<meta charset="UTF-8">
    <body>
      <?php
          $categoria = $_REQUEST['categoria'];

          try
          {
              $host = "db.ist.utl.pt";
              $user ="ist426371";
              $password = "mhmc4762";
              $dbname = $user;
              $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


              $db->query("start transaction;");

              $sql = "SELECT super_categoria FROM constituida WHERE categoria = '$categoria';";
              $result = $db->query($sql);
              $lines = $result->rowCount();
              foreach($result as $row){
                $super = $row['super_categoria'];
              }
              $sql = "SELECT * FROM constituida WHERE super_categoria = '$super';";
              $result = $db->query($sql);

              $lines = $result->rowCount();
              if($lines == 1){
                $sql = "DELETE FROM super_categoria WHERE nome = '$super';";
                $db->query($sql);
                $sql = "INSERT INTO categoria_simples VALUES('$super');";
                $db->query($sql);
              }

              $sql = "DELETE FROM categoria WHERE nome = '$categoria';";
              $result = $db->query($sql);
	      
	      


              $db->query("commit;");


              $lines = $result->rowCount();
              if($lines == 0){
	      	echo("Erro! A categoria <b>$categoria</b> nao consta na Base de Dados!");
	      }
	      else{echo("Sucesso! Removeu a categoria <b>$categoria</b> da Base de Dados!");}


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
