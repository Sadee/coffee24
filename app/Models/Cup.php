<?php


namespace App\Models;


/**
 * Class Cup
 * @package App\Models
 */
class Cup
{

    public $water;
    public $milk;
    public $coffeePowder;

    private $cupImage = "";

    /**
     * @return bool
     */
    public function checkCup()
    {
        return true;
    }

    /**
     * @param string $cupImage
     */
    public function setCupImage(string $cupImage)
    {
        $this->cupImage = $cupImage;
    }

    /**
     * @return string
     */
    public function getCupImage(): string
    {
        return $this->cupImage;
    }
}
