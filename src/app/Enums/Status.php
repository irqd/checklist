<?php

namespace App\Enums;

enum Status: string
{
   case PENDING = 'pending';
   case IN_PROGRESS = 'in_progress';
   case COMPLETED = 'completed';

   public static function toArray(): array
   {
      return [
         'PENDING' => 'Pending',
         'IN_PROGRESS' => 'In Progress',
         'COMPLETED' => 'Completed',
      ];
   }
}