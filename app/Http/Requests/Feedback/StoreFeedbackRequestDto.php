<?php

namespace App\Http\Requests\Feedback;

use App\Enums\FeedbackCategoryEnum;
use App\Enums\PlatformEnum;
use App\Http\Requests\Rules\ValidationRules;
use Spatie\LaravelData\Data;


class StoreFeedbackRequestDto extends Data
{
    public function __construct(
        public string               $game_id,
        public PlatformEnum         $platform,
        public string               $version,
        public FeedbackCategoryEnum $category,
        public string               $content
    )
    {
    }

    public static function rules(): array
    {
        return [
            'game_id' => ValidationRules::requiredGame(),
            'platform' => ValidationRules::requiredString(),
            'version' => ValidationRules::requiredGameVersion(),
            'category' => ValidationRules::requiredString(),
            'content' => ValidationRules::requiredStringMax(255),
        ];
    }


}
