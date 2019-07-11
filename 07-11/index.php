<?php

declare(strict_types = 1);

use Weather\WeatherClient;

require_once(__DIR__ . '/vendor/autoload.php');

$client = new WeatherClient();

$town = isset($_GET['town']) ? $_GET['town'] : WeatherClient::DEFAULT_CITY;

$data = $client->fetchDataByCity($town);
?>

<form action="" method="GET">
    <select name="town">
        <?php
        foreach (WeatherClient::ALL_TOWNS as $key => $value) {
            ?>
            <option value="<?= $key; ?>" <?= $town == $key ? 'selected="selected"' : ''; ?>><?= $value ?></option>
            <?php
        }

        ?>
    </select>
    <input type="submit" value="Change">
</form>

<h4>Orai: <?= $town; ?></h4>

<p>
    Temperatura: <?= $data['main']['temp']; ?> C
</p>
<p>
    Vejo greitis: <?= $data['wind']['speed']; ?> m/s
</p>
<p>
    Vejo kryptis: <?= isset($data['wind']['deg']) ? $data['wind']['deg'] : 0; ?> laipsniu
</p>



