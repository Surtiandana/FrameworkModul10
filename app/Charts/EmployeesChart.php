<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart; // Ubah namespace ke Charts
use App\Models\Position;
use ArielMejiaDev\LarapexCharts\BarChart;

class EmployeesChart extends Chart // Ganti kelas yang diwarisi menjadi Charts
{
    protected $chart;

    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->chart = new BarChart();
    }

    public function build(): BarChart
    {
        $positions = Position::withCount('employees')->get();
        $positionsLabels = $positions->pluck('name')->toArray();
        $employeesCount = $positions->pluck('employees_count')->toArray();

        return $this->chart->barChart()
            ->setTitle('Posisi')
            ->setSubtitle('Posisi dengan Jumlah Karyawan Terbanyak')
            ->addData('Jumlah Karyawan', $employeesCount)
            ->setXAxis($positionsLabels);
    }
}
