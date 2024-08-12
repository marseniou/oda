<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'description', 'excerpt', 'featured_image', 'meta_description', 'meta_keywords', 'active', 'user_id', 'published_at'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public static function booted(): void
    {
        static::deleted(function (Post $post) {

            Storage::disk('public')->delete($post->featured_image);


        });
        static::updating(function (Post $post) {
            if ($post->isDirty('featured_image') && ($post->getOriginal('featured_image') !== null)) {
                Storage::disk('public')->delete($post->getOriginal('featured_image'));
            }
        });

    }
    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('d M Y'),
        );
    }
      /**
     * Scope a query to only include active users.
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('active', 1);
    }
    public function scopePublishedAt(Builder $query): void
    {
        $query->where('published_at','<=', Carbon::now());
    }
}
