<?php
require_once  'C:/xampp/htdocs/webprojettest/allfolders/config.php';
$db = config::getConnexion();

$req1 = $db->query("SELECT COUNT(j.idlike) as total ,A.titre FROM jaime j , newsarticle A where j.idNewsArticle=A.idNewsArticle GROUP by A.idNewsArticle");
$req1->execute();
$liste = $req1->fetchALL(PDO::FETCH_OBJ);
$req2 = $db->query("SELECT COUNT(idlike) as nb FROM jaime");
$nb = $req2->fetch();

$dataPoints = array();
foreach ($liste as $row) {
    $dataPoints[] = array('label' => $row->titre, 'y' => $row->total / intval($nb['nb']) * 100);
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,

                theme: "light1",
                title: {
                    text: "Number of Likes by article "
                },

                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",

                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>