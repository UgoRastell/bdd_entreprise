<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styled.css">
    <?php include('icons.php') ?>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Annonces</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <div id="graph5">
        <canvas id="myChart5" width="100px" height="100px"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
    
    $db = new mysqli ('localhost', 'root', 'root', 'bdd_entreprise');
    $querylist5 = array("STAGE 2018", "ALTERNANCE 2018", "STAGE 2019", "ALTERNANCE 2019", "STAGE 2020", "ALTERNANCE 2020", "STAGE 2021", "ALTERNANCE 2021");
    foreach($querylist5 as $annonces) {
        $result = $query = $db->query("SELECT COUNT(`Annonces`) as Annonces FROM bdd WHERE `Annonces` = '".$annonces."'");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $annonceS = $r['Annonces'];
        $nb5[] = $annonceS;
    }
    ?>
    <script>
    const data5 = {
        labels: ["STAGE 2018", "ALTERNANCE 2018", "STAGE 2019", "ALTERNANCE 2019", "STAGE 2020", "ALTERNANCE 2020", "STAGE 2021", "ALTERNANCE 2021"],
        datasets: [{
        label: 'Annonces',
        data: <?php echo json_encode($nb5)?>,
        fill: false,
        borderColor: 'rgba(63, 66, 56)',
        }]
    };
    
    const config5 = {
        type: 'line',
        data: data5,
        options: {plugins:
                     {title: 
                        {display: true, text: 'Annonces', color: 'black', font: {size: 15}}}}
    };

    const MyChart5 = new Chart(
        document.getElementById('myChart5'),
        config5
    );
    
</script>
</body>
</html>