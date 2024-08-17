<?php

namespace App\Filament\Widgets;


use App\Models\Concert;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ConcertsStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("Concerts", Concert::count())
            ->description("Number of Concerts")
        ];
    }



}
