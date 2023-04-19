<?php
include('connect.php');

$note = 0;
foreach($_POST as $key => $value){
    //echo "$key ";
    //$req = "select * from reponses where idr =".$value;
    
    /*$req = "select libelleQ from questions where reponses.idq = questions.idq and idr = ".$value."and verite = 0";
    $res = mysqli_query($id,$req);

    while($ligne = mysqli_fetch_assoc($res)){
        echo "<ol>".$ligne["libelleQ"]."</ol>";
    }
    $req1 = "select libeller from reponses where idq =".$key." and idr=".$value." and verite = 0";
    $res1 = mysqli_query($id,$req1);
    while($ligne = mysqli_fetch_assoc($res1)){
        echo "<ol>".$ligne["libeller"]."</ol>";
    }*/

    $req = "SELECT libeller,libelleq,verite from reponses as r,questions as q where r.idq = q.idq AND idr = ".$value;
    $res = mysqli_query($id,$req);

    while($ligne = mysqli_fetch_assoc($res)){
        //echo $ligne['verite'];
        if ($ligne['verite'] == 1) {
            //echo "<h3>".$ligne["libelleq"]."</h3>";
            //echo "<ol>".$ligne["libeller"]."</ol>";
            //echo "Vous avez trouvé la bonne répeonse <br>";
            $note = $note + 1;
        }
        else{
            echo "<h3>".$ligne["libelleq"]."</h3>";
            echo "<ol class='re'>".$ligne["libeller"]."</ol>";
            echo "<p>Mauvaise reponse</p>";
        }
    } 
}

echo "<br><br><hr>Vous avez $note/10";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reponse</title>
</head>
<body>
    
</body>
</html>