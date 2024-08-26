<?php


namespace App\Enums;

enum FeedbackCategoryEnum: string
{
    case BUG = 'bug';
    case SUGGESTION = 'suggestion';
    case PRAISE = 'praise';
    case INQUIRY = 'inquiry';
}
