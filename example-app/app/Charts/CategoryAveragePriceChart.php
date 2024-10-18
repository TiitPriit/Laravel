<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class CategoryAveragePriceChart extends Chart
{
    /**
     * Initializes the chart.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Configure the chart with data.
     */
    public function configure($categories)
    {
        $this->labels($categories->pluck('name'));
        
        $this->dataset('Average Price', 'bar', $categories->pluck('average_price'))
            ->options([
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                'borderColor' => 'rgba(75, 192, 192, 1)',
                'borderWidth' => 1,
            ]);

        $this->dataset('Max Price', 'bar', $categories->pluck('max_price'))
            ->options([
                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                'borderColor' => 'rgba(255, 99, 132, 1)',
                'borderWidth' => 1,
            ]);

        $this->dataset('Min Price', 'bar', $categories->pluck('min_price'))
            ->options([
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                'borderColor' => 'rgba(54, 162, 235, 1)',
                'borderWidth' => 1,
            ]);
    }
}