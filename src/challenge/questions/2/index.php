<?php
require_once 'Inventory.php';

$operations = [
    ["entrada", "item1", 50],
    ["saida", "item1", 20],
    ["entrada", "item2", 70]
];

$inventory = new Inventory();
$updatedInventory = $inventory->processOperations($operations);

echo "Inventário Atualizado: \n";
foreach ($updatedInventory as $item => $quantity) {
    echo "$item: $quantity\n";
}
