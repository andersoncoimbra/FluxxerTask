<?php

namespace App\Enums;

enum TaskStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case DONE = 'done';
}
