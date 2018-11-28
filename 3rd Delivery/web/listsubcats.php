<html>
<meta charset="UTF-8">
    <body>
<?php
    $categoria = $_REQUEST['categoria'];

    function findsubcats($db,$super_cat) {

      $sql = "SELECT categoria FROM constituida WHERE super_categoria = '$super_cat';";
      $result = $db->query($sql);



      foreach($result as $row){
        echo("<tr><td>");
        echo($row['categoria']);
        echo("</td></tr>\n");
        findsubcats($db,$row['categoria']);
      }
    }

    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist426371";
        $password = "mhmc4762";
        $dbname = $user;


        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT categoria FROM constituida WHERE super_categoria = '$categoria';";
      	$result = $db->query($sql);

	$lines = $result->rowCount();
              if($lines == 0){
	      	echo("Erro! A categoria <b>$categoria</b> nao existe ou nao e super-categoria!");
	      }
	      else{


	
        echo("<table border=\"1\">\n");
        echo("<tr><td>Sub-Categorias de <b>$categoria</b></td></tr>\n");

        findsubcats($db,$categoria);

        echo("</table>\n");
	}

        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    <p><input type="button" value="Voltar à página anterior" onclick="window.location='formlistsubcats.php';"/></p>
    </body>
</html>
