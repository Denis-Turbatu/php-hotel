<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parking</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal Centro</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($hotels as $key => $hotel) { ?>
                <tr>
                    <th scope="row"><?php echo $key + 1; ?></th>
                    <td><?php echo $hotel['name']; ?></td>
                    <td><?php echo $hotel['description'] ?></td>
                    <td><?php echo ($hotel['parking']) ? "Disponibile" : "Occupato" ?></td>
                    <td><?php echo $hotel['vote'] ?></td>
                    <td><?php echo $hotel['distance_to_center'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <form action="index.php" method="GET">
        <label for="vote-filter">Scegliere il voto del hotel</label>
        <br>
        <input type="number" name="vote-filter" id="vote-filter">
        <br>
        <br>
        <label for="parking-filter">Selezionare il parcheggio</label>
        <br>
        <select name="parking-filter" id="parking-filter">
            <option value=""> --Inserire un'opzione-- </option>
            <option value="true">Incluso</option>
            <option value="false">Escluso</option>
        </select>
        <br>
        <br>
        <button type="submit">Invia</button>
    </form>

    <?php 
        if (isset($_GET["parking-filter"])) {
            $filter_parking = [];
            $option_filter = $_GET["parking-filter"];
            $option_filter = $option_filter === 'true' ? true : false;
            
            foreach ($hotels as $cur_hotel) {
                if ($cur_hotel["parking"] === $option_filter) {
                    $filter_parking[] = $cur_hotel;
                }
            }
    ?> 
    <table class="table w-50">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parking</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal Centro</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($filter_parking as $filtered_hotel) { ?>
                <tr>
                    <th scope="row"><?php echo $key + 1; ?></th>
                    <td><?php echo $filtered_hotel["name"]; ?></td>
                    <td><?php echo $filtered_hotel['description'] ?></td>
                    <td><?php echo ($filtered_hotel['parking']) ? "Disponibile" : "Occupato" ?></td>
                    <td><?php echo $filtered_hotel['vote'] ?></td>
                    <td><?php echo $filtered_hotel['distance_to_center'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php } ?>
</body>

</html>