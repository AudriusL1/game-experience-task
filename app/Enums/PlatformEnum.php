<?php


namespace App\Enums;

enum PlatformEnum: string
{
    case IOS = 'iOS';
    case ANDROID = 'Android';
    case WINDOWS = 'Windows';
    case MACOS = 'macOS';
    case LINUX = 'Linux';
}
