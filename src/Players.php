<?php

/*
    Development Exercise

      The following code is poorly designed and error prone. Refactor the objects below to follow a more SOLID design.
      Keep in mind the fundamentals of MVVM/MVC and Single-responsibility when refactoring.

      Further, the refactored code should be flexible enough to easily allow the addition of different display
        methods, as well as additional read and write methods.

      Feel free to add as many additional classes and interfaces as you see fit.

      Note: Please create a fork of the https://github.com/BrandonLegault/exercise repository and commit your changes
        to your fork. The goal here is not 100% correctness, but instead a glimpse into how you
        approach refactoring/redesigning bad code. Commit often to your fork.

*/

class Players
{
    private $dataSource;

    public function __construct($dataSource)
    {
        $this->dataSource = $dataSource;
    }

    /**
     * @param $source string Where we're retrieving the data from. 'json', 'array' or 'file'
     * @param $filename string Only used if we're reading players in 'file' mode.
     * @return string json
     */
    function readPlayers($source, $filename = null)
    {
        $playerData = null;

        switch ($source) {
            case 'file':
                $playerData = $this->getPlayerDataFromFile($filename);
                break;
        }

        if (is_string($playerData)) {
            $playerData = json_decode($playerData);
        }

        return $playerData;
    }

    /**
     * @param $source string Where to write the data. 'json', 'array' or 'file'
     * @param $filename string Only used if we're writing in 'file' mode
     * @param $player \stdClass Class implementation of the player with name, age, job, salary.
     */
    function writePlayer($source, $player, $filename = null)
    {
        switch ($source) {
            case 'file':
                $players = json_decode($this->getPlayerDataFromFile($filename));
                if (!$players) {
                    $players = [];
                }
                $players[] = $player;
                file_put_contents($filename, json_encode($players));
                break;
        }
    }

    function getPlayerDataFromFile($filename)
    {
        $file = file_get_contents($filename);
        return $file;
    }

    function display(IFormatter $formatter)
    {
        $players = $this->dataSource->read();
        echo $formatter->output($players);
    }
}
