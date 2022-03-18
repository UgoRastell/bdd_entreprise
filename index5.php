<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styled.css">
    <?php include('icons.php') ?>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Zone Géographique</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <div id="graph4">
        <canvas id="myChart4" width="100px" height="100px"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
    
    $db = new mysqli ('localhost', 'root', 'root', 'bdd_entreprise');
    $querylist4 = array("Rouen", "Métropole Rouen Normandie (hors Ville de Rouen)", "Eure", "Arrondissement de Rouen (hors Métropole)", "Hors Normandie", "Normandie (hors 27 et 76)","Arrondissement de Dieppe","Arrondissement du Havre");
    
    foreach($querylist4 as $zone) {
        $result = $query = $db->query("SELECT COUNT(`Zone Géographique`) as ZoneGéographique FROM bdd WHERE `Zone Géographique` = '".$zone."'");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $zoneGeo = $r['ZoneGéographique'];
        $nb4[] = $zoneGeo;
    }
    ?>
    <script>
    const data4 = {
        labels: ["Rouen", "Métropole Rouen Normandie (hors Ville de Rouen)", "Eure", "Arrondissement de Rouen (hors Métropole)", "Hors Normandie", "Normandie (hors 27 et 76)","Arrondissement de Dieppe","Arrondissement du Havre"],
        datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($nb4)?>,
        backgroundColor: [
            'rgba(63, 66, 56)',
            'rgba(107, 112, 92)',
            'rgba(165, 165, 141)',
            'rgba(183, 183, 164)',
            'rgba(212, 199, 176)',
            'rgba(255, 232, 214)',
            'rgba(221, 190, 169)',
            'rgba(203, 153, 126)'
        ],
        borderColor: [
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)',
            'rgb(255, 255, 255)'],
        hoverOffset: 2
        }]
    };
    
    const config4 = {
        type: 'doughnut',
        data: data4,
        options: {plugins:
                     {title: 
                        {display: true, text: 'Zone géographique', color: 'black', font: {size: 15}}}}
    };

    const MyChart4 = new Chart(
        document.getElementById('myChart4'),
        config4
    );
    
</script>
</body>
</html>