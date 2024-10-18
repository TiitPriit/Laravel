<?php
namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class DemoChart extends Chart
{
    /**
     * Initializes the chart.
     */
    public function __construct()
    {
        parent::__construct();

        $this->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July']);
        $this->dataset('My First dataset', 'line', [65, 59, 80, 81, 56, 55, 40])
            ->options([
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                'borderColor' => 'rgba(75, 192, 192, 1)',
                'borderWidth' => 1,
            ]);
    }
}