<?php


namespace App\Models;

use \App\Models\Storage;

/**
 * Class MachineStock
 * @package App\Models
 */
class MachineStock
{
    /**
     * @var int
     */
    public static $coffee = 1;
    /**
     * @var int
     */
    public static $milk = 2;
    /**
     * @var int
     */
    public static $water = 3;


    /**
     * @return bool
     */
    public function checkCoffee()
    {
        $coffee = Storage::find(self::$coffee);
        if($coffee->quantity != null && $coffee->quantity > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function checkWater()
    {
        $water = Storage::find(self::$water);
        if($water->quantity != null && $water->quantity > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function checkMilk()
    {
        $milk = Storage::find(self::$milk);
        if($milk->quantity != null && $milk->quantity > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     */
    public function useCoffee()
    {
        $coffee = Storage::find(self::$coffee);
        $coffee->quantity = ($coffee->quantity - 1); // Later this can be extend to realistic amount
        $coffee->save();
    }

    /**
     *
     */
    public function useMilk()
    {
        $milk = Storage::find(self::$milk);
        $milk->quantity = ($milk->quantity - 1); // Later this can be extend to realistic amount
        $milk->save();
    }

    /**
     *
     */
    public function useWater()
    {
        $water = Storage::find(self::$water);
        $water->quantity = ($water->quantity - 1); // Later this can be extend to realistic amount
        $water->save();
    }

    /**
     * @return int
     */
    public function getCoffee() : int
    {
        if($this->checkCoffee()) {
            $this->useCoffee();
            return 1;
        } else {
            throw new NoCoffeeException();
        }
    }

    /**
     * @return int
     */
    public function getMilk() : int
    {
        if($this->checkMilk()) {
            $this->useMilk();
            return 1;
        } else {
            throw new NoMilkException();
        }
    }

    /**
     * @return int
     */
    public function getWater() : int
    {
        if($this->checkWater()) {
            $this->useWater();
            return 1;
        } else {
            throw new NoWaterException();
        }
    }

}
