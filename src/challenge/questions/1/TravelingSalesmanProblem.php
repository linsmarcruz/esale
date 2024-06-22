<?php

class TravelingSalesmanProblem
{
    private $distMatrix;
    private $numPoints;
    private $minRoute;
    private $minDistance;

    public function __construct($distMatrix)
    {
        $this->distMatrix = $distMatrix;
        $this->numPoints = count($distMatrix);
        $this->minRoute = [];
        $this->minDistance = PHP_INT_MAX;
    }

    public function findShortestRoute()
    {
        $initialRoute = range(0, $this->numPoints - 1);
        $this->permute($initialRoute, 1);
        return [$this->minRoute, $this->minDistance];
    }

    private function permute($route, $startIndex)
    {
        if ($startIndex == $this->numPoints) {
            $this->calculateRouteDistance($route);
            return;
        }

        foreach (range($startIndex, $this->numPoints - 1) as $i) {
            $this->swap($route, $startIndex, $i);
            $this->permute($route, $startIndex + 1);
            $this->swap($route, $startIndex, $i);
        }
    }

    private function calculateRouteDistance($route)
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

    private function swap(&$route, $i, $j)
    {
        $temp = $route[$i];
        $route[$i] = $route[$j];
        $route[$j] = $temp;
    }
}
