<?php

class VehicleLoadPlanner
{
    private array $products;
    private int $capacity;

    public function __construct(array $products, int $capacity)
    {
        $this->products = $products;
        $this->capacity = $capacity;
    }

    public function getOptimalLoad(): array
    {
        $numberOfProducts = count($this->products);
        $capacityMatrix = $this->initializeCapacityMatrix($numberOfProducts, $this->capacity);

        $this->fillCapacityMatrix($capacityMatrix);

        return $this->getSelectedProducts($this->capacity, $capacityMatrix);
    }

    private function initializeCapacityMatrix(int $numberOfProducts, int $capacity): array
    {
        return array_fill(0, $numberOfProducts + 1, array_fill(0, $capacity + 1, 0));
    }

    private function fillCapacityMatrix(array &$capacityMatrix): void
    {
        foreach ($this->products as $productIndex => $product) {
            $productWeight = $product[1];
            for ($currentCapacity = 1; $currentCapacity <= $this->capacity; $currentCapacity++) {
                $capacityMatrix[$productIndex + 1][$currentCapacity] = $this->getMaxValue(
                    $productIndex + 1,
                    $currentCapacity,
                    $productWeight,
                    $capacityMatrix
                );
            }
        }
    }

    private function getMaxValue(int $productIndex, int $currentCapacity, int $productWeight, array $capacityMatrix): int
    {
        if ($productWeight <= $currentCapacity) {
            return max(
                $capacityMatrix[$productIndex - 1][$currentCapacity],
                $capacityMatrix[$productIndex - 1][$currentCapacity - $productWeight] + $productWeight
            );
        }
        return $capacityMatrix[$productIndex - 1][$currentCapacity];
    }

    private function getSelectedProducts(int $capacity, array $capacityMatrix): array
    {
        $optimalProducts = [];
        $remainingCapacity = $capacity;

        foreach (array_reverse($this->products, true) as $productIndex => $product) {
            if ($remainingCapacity <= 0) {
                break;
            }

            if ($capacityMatrix[$productIndex + 1][$remainingCapacity] != $capacityMatrix[$productIndex][$remainingCapacity]) {
                $optimalProducts[] = $product;
                $remainingCapacity -= $product[1];
            }
        }

        return $optimalProducts;
    }
}
