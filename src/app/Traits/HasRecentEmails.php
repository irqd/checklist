<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cookie;

trait HasRecentEmails
{
   private function updateRecentEmails($email)
   {
      $recentEmails = $this->getRecentEmails();

      if (!in_array($email, $recentEmails)) {
         array_unshift($recentEmails, $email);
      }

      $this->storeRecentEmails($recentEmails);
   }

   private function getRecentEmails()
   {
      $cookie = request()->cookie('recent_emails');

      return is_null($cookie) ? [] : json_decode($cookie, true);
   }

   private function storeRecentEmails($emails)
   {
      // used this instead of response()->cookie()
      // since livewire does not support response()->cookie()
      Cookie::queue('recent_emails', json_encode($emails), 525600);
   }
}
