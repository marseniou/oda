<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Concert extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'place', 'program', 'image', 'global_event', 'ticket_link', 'have_ticket', 'date'];

    public static function booted(): void
    {
        static::deleted(function (Concert $concert) {

            Storage::disk('public')->delete($concert->image);


        });
        static::updating(function (Concert $concert) {
            if ($concert->isDirty('image') && ($concert->getOriginal('image') !== null)) {
                Storage::disk('public')->delete($concert->getOriginal('image'));
            }
        });

    }
 
    public function scopeCurrent(Builder $query): void
    {
        

        $query->where('date', '>=', Carbon::now());
    }
}
