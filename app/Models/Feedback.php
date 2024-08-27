<?php

namespace App\Models;

use App\Enums\FeedbackCategoryEnum;
use App\Enums\FeedbackStateEnum;
use App\Enums\PlatformEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['game_id', 'platform', 'version', 'category', 'content', 'state'];

    protected $casts = [
        'state' => FeedbackStateEnum::class,
        'platform' => PlatformEnum::class,
        'category' => FeedbackCategoryEnum::class,
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function scopeWhereState(Builder $query, FeedbackStateEnum|null $state): Builder
    {
        return $state ? $query->where('state', $state) : $query;
    }

    public function scopeWherePlatform(Builder $query, PlatformEnum|null $platform): Builder
    {
        return $platform ? $query->where('platform', $platform) : $query;
    }

    public function scopeWhereCategory(Builder $query, FeedbackCategoryEnum|null $category): Builder
    {
        return $category ? $query->where('category', $category) : $query;
    }
}
