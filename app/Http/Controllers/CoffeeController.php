<?php


namespace App\Http\Controllers;

use App\Models\Cup;
use App\Models\SimpleCoffeeMachine;

class CoffeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function order()
    {
        try{

            if (\Request::isMethod('post')) {

                if(!in_array($_POST['coffeeTypes_id'], [SimpleCoffeeMachine::$blackCoffeeType , SimpleCoffeeMachine::$milkCoffeeType])) {
                    return back()->withErrors('Please select what do you want.')->withInput();
                }
                $coffeeMachine = new SimpleCoffeeMachine();
                $coffeeMachine->setCoffeeType($_POST['coffeeTypes_id']);
                $filled = $coffeeMachine->produceCoffee();

                if($filled instanceof Cup) {
                    $cupImage = $filled->getCupImage();
                    return view('coffee/serve', compact('cupImage'));
                } else {
                    $error = "Something went wrong!";
                    return view('error', compact('error'));
                }

            } else {
                $coffeeTypes = [SimpleCoffeeMachine::$blackCoffeeType => "Black Coffee", SimpleCoffeeMachine::$milkCoffeeType=>"Milk Coffee"];
                return view('coffee/order', compact('coffeeTypes'));
            }

        } catch(\Exception $e){
            $error = $e->getMessage();
            return view('error', compact('error'));
        }
    }

}
