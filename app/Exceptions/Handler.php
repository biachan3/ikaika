<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function report(Exception $exception)
{
    // this is from the parent method
    if ($this->shouldntReport($exception)) {
        return;
    }

    // this is from the parent method
    try {
        $logger = $this->container->make(\Psr\Log\LoggerInterface::class);
    } catch (Exception $ex) {
        throw $exception; // throw the original exception
    }

    // this is the new custom handling of guzzle exceptions
    if ($exception instanceof \GuzzleHttp\Exception\RequestException) {
        // get the full text of the exception (including stack trace),
        // and replace the original message (possibly truncated),
        // with the full text of the entire response body.
        $message = str_replace(
            rtrim($exception->getMessage()),
            (string) $exception->getResponse()->getBody(),
            (string) $exception
        );

        // log your new custom guzzle error message
        return $logger->error($message);
    }

    // make sure to still log non-guzzle exceptions
    $logger->error($exception);
}

}
