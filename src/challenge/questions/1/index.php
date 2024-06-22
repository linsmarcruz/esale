<?php
require_once 'TravelingSalesmanProblem.php';

$distMatrix = [
    [0, 10, 15, 20],
    [10, 0, 35, 25],
    [15, 35, 0, 30],
    [20, 25, 30, 0]
];

$tsp = new TravelingSalesmanProblem($distMatrix);
list($route, $distance) = $tsp->findShortestRoute();

echo "Rota mais curta: " . implode(' -> ', $route) . "\n";
echo "Distância total: " . $distance . "\n";
