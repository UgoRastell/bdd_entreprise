<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styled.css">
    <?php include('icons.php') ?>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Type de structure</title>
</head>
<body>
    <?php include('navbar.php') ?>
    <div id="graph3">
        <canvas id="myChart3" width="100px" height="100px"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
    
    $db = new mysqli ('localhost', 'root', 'root', 'bdd_entreprise');
    $querylist3 = array("Entreprise privée", "Association", "Etablissement public" );
    
    foreach($querylist3 as $statut) {
        $result = $query = $db->query("SELECT COUNT(`Statut_Type de structure`) as Statut_Typedestructure FROM bdd WHERE `Statut_Type de Structure` = '".$statut."' ");
        $r = $query->fetch_array(MYSQLI_ASSOC);
        $statutT = $r['Statut_Typedestructure'];
        $nb3[] = $statutT;
    }
    ?>
    <script>
    const data3 = {
        labels: ["Entreprise privée", "Association", "Etablissement public"],
        datasets: [{
        label: 'My First Dataset',
        data: <?php echo json_encode($nb3)?>,
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
    
    const config3 = {
        type: 'doughnut',
        data: data3,
        options: {plugins:
                     {title: 
                        {display: true, text: 'Type de structure', color: 'black', font: {size: 15}}}}
    };

    const MyChart3 = new Chart(
        document.getElementById('myChart3'),
        config3
    );
    
</script>
</body>
</html>