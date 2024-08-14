<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Musician extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'instrument','slug','image', 'bio', 'excerpt', 'active'];

    public static function booted(): void
    {
        static::deleted(function (Musician $musician) {

            Storage::disk('public')->delete($musician->image);


        });
        static::updating(function (Musician $musician) {
            if ($musician->isDirty('image') && ($musician->getOriginal('image') !== null)) {
                Storage::disk('public')->delete($musician->getOriginal('image'));
            }
        });

    }
      /**
     * Scope a query to only include active users.
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('active', 1);
    }
}
