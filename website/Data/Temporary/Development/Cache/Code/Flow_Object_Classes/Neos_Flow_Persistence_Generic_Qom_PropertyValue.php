<?php 
namespace Neos\Flow\Persistence\Generic\Qom;

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
 * Evaluates to the value (or values, if multi-valued) of a property.
 *
 * If, for a tuple, the selector node does not have a property named property,
 * the operand evaluates to null.
 *
 * The query is invalid if:
 *
 * selector is not the name of a selector in the query, or
 * property is not a syntactically valid property name.
 *
 * @api
 */
class PropertyValue_Original extends DynamicOperand
{
    /**
     * @var string
     */
    protected $selectorName;

    /**
     * @var string
     */
    protected $propertyName;

    /**
     * Constructs this PropertyValue instance
     *
     * @param string $propertyName
     * @param string $selectorName
     */
    public function __construct($propertyName, $selectorName = '')
    {
        $this->propertyName = $propertyName;
        $this->selectorName = $selectorName;
    }

    /**
     * Gets the name of the selector against which to evaluate this operand.
     *
     * @return string the selector name; non-null
     * @api
     */
    public function getSelectorName()
    {
        return $this->selectorName;
    }

    /**
     * Gets the name of the property.
     *
     * @return string the property name; non-null
     * @api
     */
    public function getPropertyName()
    {
        return $this->propertyName;
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Flow\Persistence\Generic\Qom;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * Evaluates to the value (or values, if multi-valued) of a property.
 * 
 * If, for a tuple, the selector node does not have a property named property,
 * the operand evaluates to null.
 * 
 * The query is invalid if:
 * 
 * selector is not the name of a selector in the query, or
 * property is not a syntactically valid property name.
 */
class PropertyValue extends PropertyValue_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     * @param string $propertyName
     * @param string $selectorName
     */
    public function __construct()
    {
        $arguments = func_get_args();
        if (!array_key_exists(0, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $propertyName in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
        call_user_func_array('parent::__construct', $arguments);
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
  'selectorName' => 'string',
  'propertyName' => 'string',
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
# PathAndFilename: /var/www/php/Packages/Framework/Neos.Flow/Classes/Persistence/Generic/Qom/PropertyValue.php
#