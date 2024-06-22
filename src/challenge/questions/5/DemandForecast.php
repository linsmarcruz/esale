<?php

class DemandForecast
{
    private array $salesData;

    public function __construct(array $salesData)
    {
        $this->salesData = $salesData;
    }

    public function calculateMovingAverage(int $periods): float
    {
        $totalPeriods = count($this->salesData);
        if ($totalPeriods < $periods) {
            throw new Exception("Não há dados suficientes para calcular a média móvel.");
        }

        $sum = 0.0;
        $recentSalesData = array_slice($this->salesData, -$periods);

        foreach ($recentSalesData as $data) {
            $sum += $data[1];
        }

        return $sum / $periods;
    }

    public function predictNextDemand(int $periods = 3): float
    {
        return $this->calculateMovingAverage($periods);
    }
}
