<?php

namespace App\Http\Responses;

use App\Enums\FeedbackCategoryEnum;
use App\Enums\FeedbackStateEnum;
use App\Enums\PlatformEnum;
use App\Models\Feedback;
use Spatie\LaravelData\Data;


class FetchFeedbacksResponseDto extends Data
{
    public function __construct(
        public string               $id,
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
            id: $model->getKey(),
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
