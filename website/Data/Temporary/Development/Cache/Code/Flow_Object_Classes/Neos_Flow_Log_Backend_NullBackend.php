<?php 
namespace Neos\Flow\Log\Backend;

/*
 * This file is part of the Neos.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */


/**
 * A backend which just ignores everything
 *
 * @api
 */
class NullBackend_Original extends AbstractBackend
{
    /**
     * Does nothing
     *
     * @return void
     * @api
     */
    public function open()
    {
    }

    /**
     * Ignores the call
     *
     * @param string $message The message to log
     * @param integer $severity One of the LOG_* constants
     * @param mixed $additionalData A variable containing more information about the event to be logged
     * @param string $packageKey Key of the package triggering the log (determined automatically if not specified)
     * @param string $className Name of the class triggering the log (determined automatically if not specified)
     * @param string $methodName Name of the method triggering the log (determined automatically if not specified)
     * @return void
     * @api
     */
    public function append($message, $severity = 1, $additionalData = null, $packageKey = null, $className = null, $methodName = null)
    {
    }

    /**
     * Does nothing
     *
     * @return void
     * @api
     */
    public function close()
    {
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Flow\Log\Backend;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * A backend which just ignores everything
 */
class NullBackend extends NullBackend_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


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
  'severityThreshold' => 'integer',
  'logIpAddress' => 'boolean',
);
        $result = $this->Flow_serializeRelatedEntities($transientProperties, $propertyVarTags);
        return $result;
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __wakeup()
    {

        $this->Flow_setRelatedEntities();
    }
}
# PathAndFilename: /var/www/php/Packages/Framework/Neos.Flow/Classes/Log/Backend/NullBackend.php
#