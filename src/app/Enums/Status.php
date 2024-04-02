<?php

namespace App\Enums;

enum Status: string
{
   case PENDING = 'peding';
   case IN_PROGRESS = 'in_progress';
   case COMPLETED = 'completed';
}