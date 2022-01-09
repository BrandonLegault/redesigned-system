<?php

include __DIR__ . '/ISource.php';

class JsonSource implements ISource
{
   private $data;
   private $raw_json;

   function __construct()
   {
      $this->raw_json = include 'JsonSourceData.php';
      $this->data = $this->raw_json ? json_decode($this->raw_json) : [];
   }

   function read()
   {
      return $this->data;
   }

   function write($player)
   {
      $this->data[] = $player;
      $this->raw_json = json_encode($this->data);
   }
}
