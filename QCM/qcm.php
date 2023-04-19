<?php 
include "connect.php"

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="reponses.php" method="post">
    <ol>
    <?php
    $req = "select * from questions order by rand() limit 10";
    $res = mysqli_query($id,$req);
    while($ligne = mysqli_fetch_assoc($res)){
        echo "<li><h3>".$ligne["libelleQ"]."</li></h3>";
        $idq = $ligne["idq"];
        $req2 = "select * from reponses where idq = ".$idq." order by rand()";
        $res2 = mysqli_query($id, $req2);
        echo "<section>";
        while($ligne2 = mysqli_fetch_assoc($res2)){
            $idr = $ligne2["idr"];
            echo "<input type='radio' name='$idq' value='$idr'>".$ligne2["libeller"];
        }
        echo "</section>";
}
    ?>
    </ol>
    <br><button type="submit" value="Envoyer">Envoyer</button>
    

</form>
    

</body>
</html>