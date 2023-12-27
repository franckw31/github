<?php
header('Content-Type: application/json; charset=utf-8');
include('db.php');

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
            ]
        ];
    }
} catch (Exception $e) {
    die($e);
}

echo json_encode($returnData);