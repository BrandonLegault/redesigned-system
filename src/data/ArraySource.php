<?php

include __DIR__ . '/ISource.php';

class ArraySource implements ISource
{
   private $data;

   function __construct()
   {
      $this->data = include 'ArraySourceData.php';
   }

   function read()
   {
      return $this->data;
   }

   function write($player)
   {
      $this->data[] = $player;
   }
}
