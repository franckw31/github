<?php
header('Content-Type: application/json; charset=utf-8');

$db = "dbs9616600";
$host = "db5011397709.hosting-data.io";
$user = 'dbu5472475';
$pass = 'Kookies7*';

//PDO Connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e){
    //echo "Connection failed: " . $e->getMessage();
}

function p($arr){
    echo "<pre>";
        print_r($arr);
    echo "</pre>";
}

$sql = "SELECT * FROM events";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $key => $eventData) {
        $returnData[] = [
            'type' => 'Feature'.$eventData['id'],
            'properties' => [
         		'description' => '<p>'.$eventData['lien'].$eventData['lien-id'].$eventData['lien-texte'].$eventData['name'].'</p><p>'.$eventData['lien-texte-fin'].$eventData['lien-id'].'</p>',
				't1' => $eventData['t1'],
				't2' => $eventData['t2'],
                'icon' => $eventData['icon'],
            ],
            'geometry' => [
                'type' => 'Point',
                'coordinates' => [$eventData['lat'], $eventData['lng']]
            ],'icon-size' => $eventData['icon-size'],
        ];
    }
} catch (Exception $e) {
    die($e);
}

echo json_encode($returnData);