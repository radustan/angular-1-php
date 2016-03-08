<?php
$data = array(
    'title' => 'Population title',
    'categories' => array('1750', '1800', '1850', '1900', '1950', '1999', '2050'),
    'series' => [[
            'name'=> 'Asia',
            'data'=> [502, 635, 809, 947, 1402, 3634, 5268]
        ], [
            'name'=> 'Africa',
            'data'=> [106, 107, 111, 133, 221, 767, 1766]
        ], [
            'name'=> 'Europe',
            'data'=> [163, 203, 276, 408, 547, 729, 628]
        ], [
            'name'=> 'America',
            'data'=> [18, 31, 54, 156, 339, 818, 1201]
        ], [
            'name'=> 'Oceania',
            'data'=> [2, 2, 2, 6, 13, 30, 46]
        ]]
);

$params = $_GET;
if (!empty($params['type']) && array_key_exists($params['type'], $data)) {
    header('Content-Type: text/plain');
    echo json_encode($data[$params['type']]);
} else {
    echo '';
}

?>
