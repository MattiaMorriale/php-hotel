<?php

    $parking = $_GET['parking'];

    $voteInput = $_GET['vote'];

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

    if ($parking) {

        $hotels = array_filter($hotels, function($hotel){
            return $hotel['parking'];
        });

    };

    if($voteInput) {

        $hotels = array_filter($hotels, function($hotel)use($voteInput){
            return $hotel['vote'] >= $voteInput;
        });

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>php-hotel</title>

    <!-- link css -->
    <link rel="stylesheet" href="style.css">

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body data-bs-theme='dark'>
    
    <div class="container">
        <h1 class='my-3 ' >Hotel</h1>

        <hr>

        <form>
            <div class="mb-3">
                <label for="vote" class="form-label">Filter by Vote</label>
                <input type="number" name='vote' class="form-control" id="vote" min='1' max='5'>
            </div>
            <div class="mb-3 form-check">
                <label class="form-check-label" for="parking">Show for parking</label>
                <input type="checkbox" class="form-check-input" id="parking" name='parking'>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <hr>

        <table class="table">
            <thead class='table-light'>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance To Center</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($hotels as $currentHotel) {

                        echo "<tr>";
                            foreach($currentHotel as $value) {
                                echo " 
                                <td>
                                    $value
                                </td> ";
                            }                
                        echo "</tr>";

                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>