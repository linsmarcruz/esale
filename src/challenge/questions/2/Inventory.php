<?php
class Inventory
{
    private $inventory;

    const OPERATION_ENTRY = 'entrada';
    const OPERATION_EXIT = 'saida';

    public function __construct()
    {
        $this->inventory = [];
    }

    public function processOperations($operations)
    {
        foreach ($operations as $operation) {
            list($type, $product, $quantity) = $operation;

            if (!isset($this->inventory[$product])) {
                $this->inventory[$product] = 0;
            }

            if ($type === self::OPERATION_ENTRY) {
                $this->inventory[$product] += $quantity;
            } elseif ($type === self::OPERATION_EXIT) {
                $this->inventory[$product] -= $quantity;
                if ($this->inventory[$product] < 0) {
                    $this->inventory[$product] = 0;
                }
            }
        }

        return $this->inventory;
    }
}
