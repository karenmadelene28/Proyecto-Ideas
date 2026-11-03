<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Idea;
use App\Models\Categoria;

class IdeasGraficaDona extends ChartWidget
{
    protected ?string $heading = 'Ideas por categoria';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Categoria',
                    'data' => [2, 3, 3, 2, 3, 2, 3],
                    'backgroundColor' => [
                        '#ebd3f5',
                        '#e1a9e8',
                        '#d579e9',
                        '#c93aed',
                        '#9575d4',
                        '#8c32df',
                        '#6704ad',
                    ],
                ],
            ],
            'labels' => [
                'Tecnología',
                'Educación',
                'Salud',
                'Medio ambiente',
                'Finanzas',
                'Deporte',
                'Transporte',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}