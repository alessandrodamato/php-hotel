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

  $voto = $_GET['voto'];
  $parcheggio = $_GET['parcheggio'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>PHP Hotel</title>
</head>

<body>

  <header class="my-5">

    <form action="index.php" method="GET">

      <div class="container">

        <div class="row">

          <div class="col-3 offset-5">

            <div class="w-100 h-100 d-flex justify-content-end align-items-center">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="parcheggio" <?php if ($parcheggio !== null) echo 'checked' ?>>
                <label class="form-check-label" for="flexCheckDefault">
                  Parcheggio incluso
                </label>
              </div>
            </div>
            
          </div>

          <div class="col-3">

              <select name="voto" id="voto" class="form-select">
                <option value="" <?php if ($voto === null || $voto === '') echo 'selected'?> >Seleziona voto...</option>
                <option value="1" <?php if ($voto == 1) echo 'selected'?> >Una stella o più</option>
                <option value="2" <?php if ($voto == 2) echo 'selected'?> >Due stelle o più</option>
                <option value="3" <?php if ($voto == 3) echo 'selected'?> >Tre stelle o più</option>
                <option value="4" <?php if ($voto == 4) echo 'selected'?> >Quattro stelle o più</option>
                <option value="5" <?php if ($voto == 5) echo 'selected'?> >Cinque stelle o più</option>
              </select>

          </div>

          <div class="col-1">

              <button class="btn btn-primary" type="submit">Cerca</button>
            
          </div>

        </div>

      </div>

    </form>

  </header>

  <main>
    
    <div class="container">

      <div class="row row-cols-3">

        <?php foreach ($hotels as $hotel) : ?>
          <?php if (($parcheggio !== null && $hotel['parking'] || $parcheggio === null) && $hotel['vote'] >= $voto || $voto === null ): ?>
            <div class="col">

              <div class="card mb-5">
                <img src="https://picsum.photos/id/<?php echo rand(50, 70) ?>/300" class="card-img-top" alt="<?php echo $hotel['name'] ?>" class="img-fluid">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $hotel['name'] ?></h5>
                  <p class="card-text"><?php echo $hotel['description'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Parcheggio: <?php echo $hotel['parking'] ? 'Sì' : 'No' ?></li>
                  <li class="list-group-item">Voto: <?php echo $hotel['vote'] ?> &star;</li>
                  <li class="list-group-item">Distanza dal centro: <?php echo $hotel['distance_to_center'] ?> Km</li>
                </ul>

              </div>

            </div>
          <?php endif ?>
        <?php endforeach ?>

      </div>

    </div>

  </main>

</body>

</html>