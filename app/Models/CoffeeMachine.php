<?php


namespace App\Models;


interface CoffeeMachine
{
    public function placeACup();
    public function setCoffeeType(int $coffeeType);
    public function produceCoffee();
}
