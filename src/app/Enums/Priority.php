<?php

namespace App\Enums;

enum Priority: string
{
   case LOW = 'low';
   case MEDIUM = 'medium';
   case HIGH = 'high';

   public static function toArray(): array
   {
      return [
         'LOW' => 'Low',
         'MEDIUM' => 'Medium',
         'HIGH' => 'High',
      ];     
   }
}