<?php
error_reporting(0);
$url = 'https://restcountries.com/v3.1/all';
$response = file_get_contents($url);

if ($response !== false) {
    $countries = json_decode($response, true);

    if ($countries !== null) {
        foreach ($countries as $country) {
            $countryName = $country['name']['common'];
            $currencies = $country['currencies'];

            // echo "<strong>$countryName:</strong><br>";

            foreach ($currencies as $currencyCode => $currency) {
                $currencyName = $currency['name'];
                $currencySymbol = $currency['symbol'];
                echo "&nbsp;&nbsp;- $currencyCode: $currencyName ($currencySymbol)<br>";
            }

            echo '<br>';
        }
    } else {
        echo 'Error decoding JSON.';
    }
} else {
    echo 'Error fetching data.';
}
?>
