<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>BDD ENTREPRISE</title>
</head>
<body>
    <canvas id="myChart" width="400" height="400"></canvas>
    <?php
    $user = 'root';
    $pass = 'root';

    try{
        $db = new PDO ('mysql:host=localhost;dbname=bdd_entreprise', $user, $pass);
        foreach ($db->query('SELECT * FROM `base_entreprise_alternance_stage_2021___bdd_ok__1_`') as $row){
            $tailleDeLaStructure = $row['Taille de la structure'];
            $nomStructure = $row['Nom de la structure'];
        }
    } 
    catch (PDOException $e){
        print "erreur :" . $e->getMessage() . "<br/>";
        die;
    }
    ?>
    <script src="script.js"></script> 
</body>
</html>