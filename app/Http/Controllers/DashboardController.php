<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $chartjs1 = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['January', 'February', 'March', 'April', 'May', 'June'])
            ->datasets([
                [
                    "label" => "Visites",
                    'backgroundColor' => "rgba(240, 98, 146, 0.31)",
                    'borderColor' => "rgba(240, 98, 146, 0.7)",
                    "pointBorderColor" => "rgba(240, 98, 146, 0.7)",
                    "pointBackgroundColor" => "rgba(240, 98, 146, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [99, 75, 12, 45, 73, 10, 79],
                ],
                [
                    "label" => "Participations",
                    'backgroundColor' => "rgba(100, 181, 246, 0.31)",
                    'borderColor' => "rgba(100, 181, 246, 0.7)",
                    "pointBorderColor" => "rgba(100, 181, 246, 0.7)",
                    "pointBackgroundColor" => "rgba(100, 181, 246, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [24, 52, 43, 67, 79, 10, 22],
                ],
                [
                    "label" => "Commandes",
                    'backgroundColor' => "rgba(129, 199, 132, 0.31)",
                    'borderColor' => "rgba(129, 199, 132, 0.7)",
                    "pointBorderColor" => "rgba(129, 199, 132, 0.7)",
                    "pointBackgroundColor" => "rgba(129, 199, 132, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [39, 76, 5, 9, 76, 42, 80],
                ]
            ])
            ->options([]);

        $chartjs2 = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['January', 'February', 'March', 'April', 'May', 'June'])
            ->datasets([
                [
                    "label" => "Fond du BDE",
                    'backgroundColor' => "rgba(240, 98, 146, 0.31)",
                    'borderColor' => "rgba(240, 98, 146, 0.7)",
                    "pointBorderColor" => "rgba(240, 98, 146, 0.7)",
                    "pointBackgroundColor" => "rgba(240, 98, 146, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [100, 96, 95, -100, -100, -100, -100],
                ]
            ])
            ->options([]);

        return view('dashboard', compact('chartjs1'));
    }
}
