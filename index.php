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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel's</title>
    <!-- Bootstrap v-5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" href="./styles/style.css">

</head>

<body>
    <main>
        <section id="data-selection" class="d-flex flex-column text-center">
            <h1>Cerca il tuo Hotel</h1>
            <!-- Select by parking -->
            <form action="index.php" method="get">
                <div class="parking-incluse">
                    <label for="">Hotel con parcheggio?</label>
                    <select name="hotelParking">
                        <option value="none">---</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="rating-vote">
                    <!-- Select by vote -->
                    <label for="">Hotel per valutazione?</label>
                    <input type="number" name="hotelRate">
                </div>

                <button type="submit">Cerca</button>
            </form>
        </section>

        <table class="table table-warning table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Distanza dal centro</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $selectParking = $_GET['hotelParking'];
                $hotelRating = $_GET['hotelRate'];


                foreach ($hotels as $key => $hotel) {
                    //Check parking is true/false
                    if ($hotel['parking']) {
                        $parking = 'Si';
                    } else {
                        $parking = 'No';
                    }

                    if ($selectParking == $parking || $selectParking == 'none' || $selectParking == null) {
                        if ($hotel['vote'] >= $hotelRating) {

                            echo "
                            <tr>
                            <th>{$key}</th>
                            <td class='fw-bold'>
                            {$hotel['name']}
                            </td>
                            <td>
                            {$hotel['description']}
                            </td>
                            <td>
                            {$hotel['vote']}
                            </td>
                            <td>
                            {$parking}
                            </td>
                            <td>
                            {$hotel['distance_to_center']}<span class='fst-italic'> Km <span>
                            </td>
                            </tr>
                            ";
                        };
                    }
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>