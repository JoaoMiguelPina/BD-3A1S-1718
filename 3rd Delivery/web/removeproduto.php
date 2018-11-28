<html>
<meta charset="UTF-8">
    <body>
      <?php
          $ean_remove = $_REQUEST['ean_remove'];

          try
          {
              $host = "db.ist.utl.pt";
              $user ="ist426371";
              $password = "mhmc4762";
              $dbname = $user;
              $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



              $db->query("start transaction;");


              $sql = "DELETE FROM produto WHERE ean = $ean_remove";
              $result = $db->query($sql);



              $db->query("commit;");

	      $lines = $result->rowCount();
              if($lines == 0){
	      	echo("Erro! O produto <b>$ean_remove</b> nao consta na Base de Dados!");
	      }
	      else{echo("Sucesso! Removeu o produto <b>$ean_remove</b> da Base de Dados!");}



              



              $db = null;
          }
          catch (PDOException $e)
          {
              $db->query("rollback;");
              echo("<p>ERROR: {$e->getMessage()}</p>");
          }
      ?>
    <p><input type="button" value="Voltar à página anterior" onclick="window.location='formprodutos.php';"/></p>
    </body>
</html>
