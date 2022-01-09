<?php

include __DIR__ . '/ISource.php';

class FileSource implements ISource
{
   private $filename;

   /**
    * @param $filename string Name of the JSON file.
    */
   function __construct($filename)
   {
      $raw_contents = file_get_contents($filename);
      $this->filename = $filename;
      $this->data = $raw_contents ? json_decode($raw_contents) : [];
   }

   function read()
   {
      return $this->data;
   }

   function write($player)
   {
      $this->data[] = $player;
      file_put_contents($this->filename, json_encode($this->data));
   }
}
