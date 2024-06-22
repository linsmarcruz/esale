<?php
require_once 'DemandForecast.php';

$salesData = [
    ["2024-01-01", 100],
    ["2024-02-01", 150],
    ["2024-03-01", 200]
];

$forecast = new DemandForecast($salesData);
$predictedDemand = $forecast->predictNextDemand();

echo "Previsão de demanda para o próximo período: " . $predictedDemand . "\n";
