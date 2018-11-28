<html>
<meta charset="UTF-8">
    <body>
<?php
    $ean = $_REQUEST['ean'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist426371";
        $password = "mhmc4762";
        $dbname = $user;


        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT operador,instante,unidades FROM reposicao WHERE ean = $ean;";

        $result = $db->query($sql);

	$lines = $result->rowCount();
              if($lines == 0){
	      	echo("Erro! Nao existe historial de eventos de reposicao de <b>$ean</b>!");
	      }
	      else{

        echo("Eventos de Reposição de <b>$ean</b>");
        echo("<table border=\"1\">\n");

        echo("<tr><td>Operador</td><td>Instante</td><td>Unidades</td></tr>\n");
        foreach($result as $row)
        {
            echo("<tr><td>");
            echo($row['operador']);
            echo("</td><td>");
            echo($row['instante']);
            echo("</td><td>");
            echo($row['unidades']);
            echo("</td></tr>\n");
        }
        echo("</table>\n");
	}

        $db = null;
    }
    catch (PDOException $e)
    {
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>
    <p><input type="button" value="Voltar à página anterior" onclick="window.location='formlistrep.php';"/></p>
    </body>
</html>
