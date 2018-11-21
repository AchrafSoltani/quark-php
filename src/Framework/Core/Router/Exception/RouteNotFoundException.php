<?php
/**
 * Created by PhpStorm.
 * User: theheretic
 * Email: soltani.achraf@gmail.com
 * Date: 11/21/18
 * Time: 1:22 PM
 */

namespace Quark\Framework\Core\Router\Exception;

class RouteNotFoundException extends \Exception
{
// Redefine the exception so message isn't optional
    public function __construct($message = 'Route not found', $code = 0, \Exception $previous = null) {
        // some code

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}