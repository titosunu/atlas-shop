<?php

namespace App\Charts;

use App\Models\Order;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Carbon;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) { 
            $totalorder = Order::with('user')->where('status', 1)->whereYear('date', $tahun)->whereMonth('date', $i)->sum('total_price');
            $dataBulan[] = Carbon::create()->month($i)->format('M');
            $dataTotalOrder[] = $totalorder;
        }
        
        return $this->chart->lineChart()
            ->setTitle('Season'. " " .$tahun)
            ->addData('Total Order', $dataTotalOrder)
            ->setXAxis($dataBulan);
    }
}
