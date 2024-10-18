<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class FirstLetterCountChart extends Chart
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
    public function configure($productsByFirstLetter)
    {
        $this->labels($productsByFirstLetter->pluck('first_letter'));
        $this->dataset('Product Count', 'bar', $productsByFirstLetter->pluck('product_count'))
            ->options([
                'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                'borderColor' => 'rgba(153, 102, 255, 1)',
                'borderWidth' => 1,
            ]);
    }
}