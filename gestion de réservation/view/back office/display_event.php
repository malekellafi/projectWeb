<?php
require '../../config.php';

$pdo = config::getConnexion();
$display_query = "SELECT id, nom, date_depart FROM execurtion";
$statement = $pdo->prepare($display_query);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
$count = count($results);

if ($count > 0) {
    $data_arr = array();
    $i = 1;

    foreach ($results as $data_row) {
        $data_arr[$i]['event_id'] = "ID : ".$data_row['id']." | Nom : ".$data_row['nom'];
        $data_arr[$i]['title'] = $data_row['nom'];
        $data_arr[$i]['start'] = date("Y-m-d", strtotime($data_row['date_depart']));
        $data_arr[$i]['end'] = date("Y-m-d", strtotime($data_row['date_depart']));
        $data_arr[$i]['color'] = '#'.substr(uniqid(),-6);
        $i++;
    }

    $data = array(
        'status' => true,
        'msg' => 'successfully!',
        'data' => $data_arr
    );
} else {
    $data = array(
        'status' => false,
        'msg' => 'Error!'
    );
}

echo json_encode($data);
?>
