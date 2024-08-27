<?php

namespace App\Http\Requests\Feedback;

use App\Enums\FeedbackCategoryEnum;
use App\Enums\FeedbackStateEnum;
use App\Enums\PlatformEnum;
use App\Http\Requests\Rules\ValidationRules;
use Spatie\LaravelData\Data;


class FetchFeedbacksRequestDto extends Data
{
    public function __construct(
        public FeedbackCategoryEnum|null $category,
        public FeedbackStateEnum|null    $state,
        public PlatformEnum|null         $platform,
    )
    {
    }

    public static function rules(): array
    {
        return [
            'category' => ValidationRules::optionalCategory(),
            'state' => ValidationRules::optionalState(),
            'platform' => ValidationRules::optionalPlatform(),
        ];
    }
}
