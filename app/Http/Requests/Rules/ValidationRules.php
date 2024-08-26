<?php

namespace App\Http\Requests\Rules;

class ValidationRules
{
    public static function requiredString(): string
    {
        return 'required|string';
    }

    public static function requiredGameVersion(): array
    {
        return ['required', 'string', 'regex:/^\d+\.\d+\.\d+$/'];
    }

    public static function requiredStringMax(int $max): string
    {
        return "required|string|max:$max";
    }
}
