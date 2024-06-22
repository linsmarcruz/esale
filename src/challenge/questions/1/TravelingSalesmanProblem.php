<?php

class TravelingSalesmanProblem
{
    private array $distMatrix;
    private int $numPoints;
    private array $minRoute;
    private int $minDistance;

    public function __construct(array $distMatrix)
    {
        $this->distMatrix = $distMatrix;
        $this->numPoints = count($distMatrix);
        $this->minRoute = [];
        $this->minDistance = PHP_INT_MAX;
    }

    public function findShortestRoute(): array
    {
        $initialRoute = range(0, $this->numPoints - 1);
        $this->permute($initialRoute, 1);
        return [$this->minRoute, $this->minDistance];
    }

    private function permute(array $route, int $startIndex): void
    {
        if ($startIndex === $this->numPoints) {
            $this->calculateRouteDistance($route);
            return;
        }

        foreach (range($startIndex, $this->numPoints - 1) as $i) {
            $this->swap($route, $startIndex, $i);
            $this->permute($route, $startIndex + 1);
            $this->swap($route, $startIndex, $i);
        }
    }

    private function calculateRouteDistance(array $route): void
    {
        $totalDistance = 0;
        foreach (range(0, $this->numPoints - 2) as $i) {
            $totalDistance += $this->distMatrix[$route[$i]][$route[$i + 1]];
        }
        $totalDistance += $this->distMatrix[$route[$this->numPoints - 1]][$route[0]];

        if ($totalDistance < $this->minDistance) {
            $this->minDistance = $totalDistance;
            $this->minRoute = array_merge($route, [$route[0]]);
        }
    }

    private function swap(array &$route, int $i, int $j): void
    {
        $temp = $route[$i];
        $route[$i] = $route[$j];
        $route[$j] = $temp;
    }
}
