<?php


namespace App\Exceptions;


class NoCupException extends CoffeeMachineException
{
    private $message = "Please place a cup";

    /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Cup not found');
    }

    public function register()
    {
        $this->renderable(
            function (Exception $e, $request) {
                return $this->handleException($request, $e);
            }
        );
    }

    public function handleException($request, Exception $exception)
    {
        if($exception instanceof RouteNotFoundException) {
            return response('Please place a cup.', 404);
        }
    }
}
