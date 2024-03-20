<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cookie;

trait HasRecentEmails
{
   private function updateRecentEmails($email)
   {
      $recentEmails = $this->getRecentEmails();

      if (!in_array($email, $recentEmails)) {
         // simply add the email to the beginning of the array
         // if it's not already in the array

         array_unshift($recentEmails, $email);
      } else {
         // move the email to the beginning of the array
         // if it's already in the array

         $key = array_search($email, $recentEmails);
         array_splice($recentEmails, $key, 1);
         array_unshift($recentEmails, $email);
      }

      $this->storeRecentEmails($recentEmails);
   }

   private function getRecentEmails()
   {
      $cookie = request()->cookie('recent_emails');

      // get only the recent 5 emails
      return is_null($cookie) ? [] : array_slice(json_decode($cookie, true), 0, 5);
   }

   private function storeRecentEmails($emails)
   {
      // used this instead of response()->cookie()
      // since livewire does not support response()->cookie()
      Cookie::queue('recent_emails', json_encode($emails), 525600);
   }
}
