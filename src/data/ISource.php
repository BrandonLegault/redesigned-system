<?php

interface ISource
{
   function read();
   function write($player);
}
