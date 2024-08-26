<?php


namespace App\Enums;

enum FeedbackStateEnum: string
{
    case NEW = 'new';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
}
