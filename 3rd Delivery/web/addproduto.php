<html>
<meta charset="UTF-8">
    <body>
      <?php
          $novo_ean = $_REQUEST['novo_ean'];
          $nova_designacao = $_REQUEST['nova_designacao'];
          $nova_categoria = $_REQUEST['nova_categoria'];
          $novo_nif = $_REQUEST['novo_nif'];
          $novo_nome = $_REQUEST['novo_nome'];
          $novo_nif_sec = $_REQUEST['novo_nif_sec'];
          $novo_nome_sec = $_REQUEST['novo_nome_sec'];
          $nova_data = $_REQUEST['nova_data'];

          try
          {
              $host = "db.ist.utl.pt";
              $user ="ist426371";
              $password = "mhmc4762";
              $dbname = $user;
              $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



              $db->query("start transaction;");


              $sql = "SELECT nif FROM fornecedor WHERE nif = $novo_nif;";
              $result = $db->query($sql);

              $lines = $result->rowCount();

              if ($lines == 0) {
                $sql = "INSERT INTO fornecedor VALUES($novo_nif, '$novo_nome');";
                $db->query($sql);

              }


              $sql = "INSERT INTO produto VALUES($novo_ean, '$nova_designacao', '$nova_categoria', $novo_nif, '$nova_data');";
              $db->query($sql);

              for($i = 1; $i < count($novo_nif_sec); $i=$i+1) {
                if($i==1 or $novo_nif_sec[$i] != ""){
                  $sql = "SELECT nif FROM fornece_sec WHERE nif = $novo_nif_sec[$i];";
                  $result = $db->query($sql);
                  $lines = $result->rowCount();

                  if($lines == 0){
                    $sql = "INSERT INTO fornecedor VALUES($novo_nif_sec[$i], '$novo_nome_sec[$i]');";
                    $result = $db->query($sql);
                    $sql = "INSERT INTO fornece_sec VALUES($novo_nif_sec[$i], $novo_ean);";
                    $result = $db->query($sql);
                  }

                  else{
                    $sql = "INSERT INTO fornece_sec VALUES($novo_nif_sec[$i], $novo_ean);";
                    $result = $db->query($sql);
                  }
                }
              }



              #ean não pode estar lá, temos que meter
              #se ainda nao existir, adicionar fornecedor primario
              #opcao de adicionar todos os secundarios que forem necessarios

              $db->query("commit;");

              echo("Sucesso! Adicionou o produto <b>$nova_designacao</b> com EAN <b>$novo_ean</b> à Base de Dados!");



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
