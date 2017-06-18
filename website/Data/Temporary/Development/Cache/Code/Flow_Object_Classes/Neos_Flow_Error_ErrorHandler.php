<?php 
namespace Neos\Flow\Error;

/*
 * This file is part of the Neos.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Error as FlowError;

/**
 * Global error handler for Flow
 *
 * @Flow\Scope("singleton")
 */
class ErrorHandler_Original
{
    /**
     * @var array
     */
    protected $exceptionalErrors = [];

    /**
     * Constructs this error handler - registers itself as the default error handler.
     *
     */
    public function __construct()
    {
        set_error_handler([$this, 'handleError']);
    }

    /**
     * Defines which error levels result should result in an exception thrown.
     *
     * @param array $exceptionalErrors An array of E_* error levels
     * @return void
     */
    public function setExceptionalErrors(array $exceptionalErrors)
    {
        $this->exceptionalErrors = $exceptionalErrors;
    }

    /**
     * Handles an error by converting it into an exception.
     *
     * If error reporting is disabled, either in the php.ini or temporarily through
     * the shut-up operator "@", no exception will be thrown.
     *
     * @param integer $errorLevel The error level - one of the E_* constants
     * @param string $errorMessage The error message
     * @param string $errorFile Name of the file the error occurred in
     * @param integer $errorLine Line number where the error occurred
     * @return void
     * @throws FlowError\Exception with the data passed to this method
     * @throws \Exception
     */
    public function handleError($errorLevel, $errorMessage, $errorFile, $errorLine)
    {
        if (error_reporting() === 0) {
            return;
        }

        $errorLevels = [
            E_WARNING            => 'Warning',
            E_NOTICE             => 'Notice',
            E_USER_ERROR         => 'User Error',
            E_USER_WARNING       => 'User Warning',
            E_USER_NOTICE        => 'User Notice',
            E_STRICT             => 'Runtime Notice',
            E_RECOVERABLE_ERROR  => 'Catchable Fatal Error'
        ];

        if (in_array($errorLevel, (array)$this->exceptionalErrors)) {
            if (class_exists(FlowError\Exception::class)) {
                throw new FlowError\Exception($errorLevels[$errorLevel] . ': ' . $errorMessage . ' in ' . $errorFile . ' line ' . $errorLine, 1);
            } else {
                throw new \Exception($errorLevels[$errorLevel] . ': ' . $errorMessage . ' in ' . $errorFile . ' line ' . $errorLine, 1);
            }
        }
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Flow\Error;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * Global error handler for Flow
 * @\Neos\Flow\Annotations\Scope("singleton")
 */
class ErrorHandler extends ErrorHandler_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     */
    public function __construct()
    {
        if (get_class($this) === 'Neos\Flow\Error\ErrorHandler') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Error\ErrorHandler', $this);
        parent::__construct();
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __sleep()
    {
            $result = NULL;
        $this->Flow_Object_PropertiesToSerialize = array();

        $transientProperties = array (
);
        $propertyVarTags = array (
  'exceptionalErrors' => 'array',
);
        $result = $this->Flow_serializeRelatedEntities($transientProperties, $propertyVarTags);
        return $result;
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __wakeup()
    {
        if (get_class($this) === 'Neos\Flow\Error\ErrorHandler') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Neos\Flow\Error\ErrorHandler', $this);

        $this->Flow_setRelatedEntities();
    }
}
# PathAndFilename: /var/www/php/Packages/Framework/Neos.Flow/Classes/Error/ErrorHandler.php
#