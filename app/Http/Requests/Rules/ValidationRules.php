<?php

namespace App\Http\Requests\Rules;

use App\Enums\FeedbackCategoryEnum;
use App\Enums\FeedbackStateEnum;
use App\Enums\PlatformEnum;
use Illuminate\Validation\Rule;

class ValidationRules
{
    public static function requiredString(): string
    {
        return 'required|string';
    }

    public static function requiredGame(): string
    {
        return 'required|string|exists:games,id';
    }


    public static function requiredGameVersion(): array
    {
        return ['required', 'string', 'regex:/^\d+\.\d+\.\d+$/'];
    }

    public static function requiredStringMax(int $max): string
    {
        return "required|string|max:$max";
    }

    public static function optionalCategory(): array
    {
        return [
            'nullable',
            'string',
            Rule::in(array_column(FeedbackCategoryEnum::cases(), 'value'))
        ];
    }

    public static function optionalState(): array
    {
        return [
            'nullable',
            'string',
            Rule::in(array_column(FeedbackStateEnum::cases(), 'value'))
        ];
    }

    public static function requiredState(): array
    {
        return [
            'required',
            'string',
            Rule::in(array_column(FeedbackStateEnum::cases(), 'value'))
        ];
    }

    public static function optionalPlatform(): array
    {
        return [
            'nullable',
            'string',
            Rule::in(array_column(PlatformEnum::cases(), 'value'))
        ];
    }
}
