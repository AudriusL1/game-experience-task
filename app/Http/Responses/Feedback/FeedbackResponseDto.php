<?php

namespace App\Http\Responses\Feedback;

use App\Enums\FeedbackCategoryEnum;
use App\Enums\FeedbackStateEnum;
use App\Enums\PlatformEnum;
use App\Models\Feedback;
use Spatie\LaravelData\Data;


class FeedbackResponseDto extends Data
{
    public function __construct(
        public string               $created_at,
        public string               $game_name,
        public FeedbackStateEnum    $feedback_state,
        public PlatformEnum         $platform,
        public string               $version,
        public FeedbackCategoryEnum $category,
        public string               $content,
    )
    {
    }


    public static function fromModel(Feedback $model): self
    {
        return new self(
            created_at: $model->created_at,
            game_name: $model->game->name,
            feedback_state: $model->state,
            platform: $model->platform,
            version: $model->version,
            category: $model->category,
            content: $model->content,
        );
    }
}
