<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'storages';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'name' => '', 'quantity' => '0'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'quantity'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public static $coffee = 1;
    public static $milk = 2;
    public static $water = 3;


    public function checkCoffee()
    {
        $coffee = Storage::find(self::$coffee);
        if($coffee->quantity != null && $coffee->quantity > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkWater()
    {
        $water = Storage::find(self::$water);
        if($water->quantity != null && $water->quantity > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkMilk()
    {
        $milk = Storage::find(self::$milk);
        if($milk->quantity != null && $milk->quantity > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function useCoffee()
    {
        $coffee = Storage::find(self::$coffee);
        $coffee->quantity = ($coffee->quantity - 1); // Later this can be extend to realistic amount
        $coffee->save();
    }

    public function useMilk()
    {
        $milk = Storage::find(self::$milk);
        $milk->quantity = ($milk->quantity - 1); // Later this can be extend to realistic amount
        $milk->save();
    }

    public function useWater()
    {
        $water = Storage::find(self::$water);
        $water->quantity = ($water->quantity - 1); // Later this can be extend to realistic amount
        $water->save();
    }

    public function getCoffee()
    {
        if($this->checkCoffee()) {
            $this->useCoffee();
        } else {
            throw new NoCoffeeException();
        }
    }

    public function getMilk()
    {
        if($this->checkMilk()) {
            $this->useMilk();
        } else {
            throw new NoMilkException();
        }
    }

    public function getWater()
    {
        if($this->checkWater()) {
            $this->useWater();
        } else {
            throw new NoWaterException();
        }
    }
}
