<?php
require_once 'VehicleLoadPlanner.php';

$products = [
    ["produto1", 10],
    ["produto2", 20],
    ["produto3", 30],
    ["produto4", 40]
];
$maxCapacity = 50;

$planner = new VehicleLoadPlanner($products, $maxCapacity);
$optimalLoad = $planner->getOptimalLoad();

echo "Produtos que maximizam o peso carregado sem exceder a capacidade do veículo:\n";
foreach ($optimalLoad as $product) {
    echo $product[0] . " (Peso: " . $product[1] . ")\n";
}
