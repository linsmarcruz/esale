<?php
require_once 'VehicleAllocator.php';

$orders = [
    ["pedido1", 10],
    ["pedido2", 20],
    ["pedido3", 30],
    ["pedido4", 40]
];

$vehicles = [
    ["veiculo1", 50],
    ["veiculo2", 60]
];

$allocator = new VehicleAllocator($orders, $vehicles);
$allocations = $allocator->allocate();

echo "Alocações de veículos:\n";
foreach ($allocations as $allocation) {
    echo $allocation[0] . ": [" . implode(', ', $allocation[1]) . "]\n";
}
