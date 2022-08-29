<?php

namespace App\Helpers;

class Currency
{
      public static function toPennies($value): int
      {
            return (int) (string) ((float) preg_replace("/[^0-9.]/", "", $value) * 100);
      }

      public static function toDollars($value): float
      {
            return (float) $value / 100;
      }
}
