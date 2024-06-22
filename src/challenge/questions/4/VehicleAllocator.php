<?php

class VehicleAllocator
{
    private array $orders;
    private array $vehicles;

    public function __construct(array $orders, array $vehicles)
    {
        $this->orders = $orders;
        $this->vehicles = $vehicles;
    }

    public function allocate(): array
    {
        usort($this->orders, function ($firstOrder, $secondOrder) {
            return $secondOrder[1] - $firstOrder[1];
        });

        usort($this->vehicles, function ($firstVehicle, $secondVehicle) {
            return $secondVehicle[1] - $firstVehicle[1];
        });

        $allocations = [];

        foreach ($this->vehicles as $vehicle) {
            $vehicleId = $vehicle[0];
            $vehicleCapacity = $vehicle[1];
            $allocatedOrders = [];

            foreach ($this->orders as $index => $order) {
                $orderId = $order[0];
                $orderWeight = $order[1];

                if ($orderWeight <= $vehicleCapacity) {
                    $allocatedOrders[] = $orderId;
                    $vehicleCapacity -= $orderWeight;

                    unset($this->orders[$index]);
                }
            }

            $allocations[] = [$vehicleId, $allocatedOrders];
        }

        return $allocations;
    }
}
