<html>
<meta charset="UTF-8">
    <body>
<?php
    $ean = $_REQUEST['ean'];
    $novo_design = $_REQUEST['novo_design'];
    try
    {
        $host = "db.ist.utl.pt";
        $user ="ist426371";
        $password = "mhmc4762";
        $dbname = $user;
        $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->query("start transaction;");

        $sql = "UPDATE produto SET design = '$novo_design' WHERE ean = $ean;";

        

        $result = $db->query($sql);

        $db->query("commit;");

	$lines = $result->rowCount();
              if($lines == 0){
	      	echo("Erro! A designacao de <b>$ean</b> nao pode ser alterada! <b>(O EAN dado nao consta na base de dados)</b>");
	      }
	      else{echo("Sucesso! A designacao do produto <b>$ean</b> foi alterada para <b>$novo_design</b>!");}

        $db = null;
    }
    catch (PDOException $e)
    {
        $db->query("rollback;");
        echo("<p>ERROR: {$e->getMessage()}</p>");
    }
?>

    <p><input type="button" value="Voltar à página anterior" onclick="window.location='formdesign.php';"/></p>
    </body>
</html>
