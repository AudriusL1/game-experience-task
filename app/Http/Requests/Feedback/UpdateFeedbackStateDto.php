<?php

namespace App\Http\Requests\Feedback;

use App\Enums\FeedbackStateEnum;
use App\Http\Requests\Rules\ValidationRules;
use Spatie\LaravelData\Data;


class UpdateFeedbackStateDto extends Data
{
    public function __construct(
        public FeedbackStateEnum $status,
    )
    {
    }

    public static function rules(): array
    {
        return [
            'status' => ValidationRules::requiredState(),
        ];
    }
}
