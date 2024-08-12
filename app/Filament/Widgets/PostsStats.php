<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PostsStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("Posts", Post::count())
            ->description("Number of Posts")
        ];
    }
}
