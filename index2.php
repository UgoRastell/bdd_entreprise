<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styled.css">
    <?php include('icons.php') ?>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Taille de la structure</title>
</head>
<body>
    <?php include('navbar.php') ?>
    
    <div id="graph1">
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
    
    $db = new mysqli ('localhost', 'root', 'root', 'bdd_entreprise');
    $querylist = array("TPE", "PME", "ETI", "GE");
    
    foreach($querylist as $entreprise) {
        $result = $query = $db->query("SELECT COUNT(`Taille de la structure`) as tailleStructure FROM bdd WHERE `Taille de la structure` = '".$entreprise."' ");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $tailleStructure = $r['tailleStructure'];
        $nb[] = $tailleStructure;
    }
    ?>
    <script>
    //chart1
    const data = {
        labels: ["TPE", "PME", "ETI", "GE"],
        datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($nb)?>,
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
            'rgb(255, 255, 255)'],
        hoverOffset: 2
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
        options: {plugins: 
                     {title: 
                        {display: true, text: 'Taille des structures', color: 'black', font: {size: 15}}}}
    };

    const MyChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    </script>
</body>
</html>