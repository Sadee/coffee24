<?php


namespace App\Models;


use App\Exceptions\NoCupException;
use App\Models\MachineStock;

class SimpleCoffeeMachine implements CoffeeMachine
{

    public static $blackCoffeeType = 1;
    public static $milkCoffeeType = 2;

    protected $myCup;

    private $coffeeType;


    /**
     * @param \App\Models\MachineStock $machineStock
     */
    protected function addCoffeePowder(MachineStock $machineStock)
    {
        $this->myCup->coffeePowder = $machineStock->getCoffee();
    }

    /**
     * @param \App\Models\MachineStock $machineStock
     */
    protected function addWater(MachineStock $machineStock)
    {
        $this->myCup->water = $machineStock->getCoffee();
    }

    /**
     * @param \App\Models\MachineStock $machineStock
     */
    protected function addMilk(MachineStock $machineStock)
    {
        $this->myCup->milk = $machineStock->getMilk();
    }

    /**
     * @throws NoCupException
     */
    public function placeACup()
    {
        $cup = new Cup();

        if($cup->checkCup()) {
            $this->myCup = $cup;
        } else {
            throw new NoCupException();
        }
    }

    /**
     * @param mixed $coffeeType
     */
    public function setCoffeeType(int $coffeeType): void
    {
        if(in_array($coffeeType, [SimpleCoffeeMachine::$blackCoffeeType , SimpleCoffeeMachine::$milkCoffeeType])) {
            $this->coffeeType = $coffeeType;
        } else {
            throw new InvalidCoffeeTypeException();
        }
    }

    /**
     * @return mixed
     */
    public function getCoffeeType()
    {
        return $this->coffeeType;
    }

    /**
     * @return string
     */
    public function produceCoffee()
    {
        try {
            $this->placeACup();

            $machineStock = new MachineStock();
            $this->addCoffeePowder($machineStock);
            $this->addWater($machineStock);

            if($this->coffeeType == self::$milkCoffeeType) {
                $this->addMilk($machineStock);
                $this->myCup->setCupImage('milk_coffee.jpg');
            } else {
                $this->myCup->setCupImage('black_coffee.jpg');
            }

            return $this->myCup;
        } catch (NoCupException $e) {
            return $e->getMessage();
        }
        catch(NoCoffeeException $e)
        {
            $this->handleException();
        }
    }

}
