<?php

include_once __DIR__ . '/CliFormatter.php';
include_once __DIR__ . '/HtmlFormatter.php';


function GetFormatter($format)
{
   switch ($format) {
      case 'cli':
         return new CliFormatter();
      default:
         return new HtmlFormatter();
   }
}
