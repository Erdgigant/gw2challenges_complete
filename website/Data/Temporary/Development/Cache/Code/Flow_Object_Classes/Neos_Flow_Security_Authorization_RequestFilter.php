<?php 
namespace Neos\Flow\Security\Authorization;

/*
 * This file is part of the Neos.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Mvc\RequestInterface;
use Neos\Flow\Security\RequestPatternInterface;

/**
 * A RequestFilter is configured to match specific \Neos\Flow\Mvc\RequestInterfaces and call
 * a InterceptorInterface if needed.
 *
 */
class RequestFilter_Original
{
    /**
     * @var RequestPatternInterface
     */
    protected $pattern = null;

    /**
     * @var InterceptorInterface
     */
    protected $securityInterceptor = null;

    /**
     * Constructor.
     *
     * @param RequestPatternInterface $pattern The pattern this filter matches
     * @param InterceptorInterface $securityInterceptor The interceptor called on pattern match
     */
    public function __construct(RequestPatternInterface $pattern, InterceptorInterface $securityInterceptor)
    {
        $this->pattern = $pattern;
        $this->securityInterceptor = $securityInterceptor;
    }

    /**
     * Returns the set request pattern
     *
     * @return RequestPatternInterface The set request pattern
     */
    public function getRequestPattern()
    {
        return $this->pattern;
    }

    /**
     * Returns the set security interceptor
     *
     * @return InterceptorInterface The set security interceptor
     */
    public function getSecurityInterceptor()
    {
        return $this->securityInterceptor;
    }

    /**
     * Tries to match the given request against this filter and calls the set security interceptor on success.
     *
     * @param RequestInterface $request The request to be matched
     * @return boolean Returns TRUE if the filter matched, FALSE otherwise
     */
    public function filterRequest(RequestInterface $request)
    {
        if ($this->pattern->matchRequest($request)) {
            $this->securityInterceptor->invoke();
            return true;
        }
        return false;
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\Flow\Security\Authorization;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * A RequestFilter is configured to match specific \Neos\Flow\Mvc\RequestInterfaces and call
 * a InterceptorInterface if needed.
 */
class RequestFilter extends RequestFilter_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait;


    /**
     * Autogenerated Proxy Method
     * @param RequestPatternInterface $pattern The pattern this filter matches
     * @param InterceptorInterface $securityInterceptor The interceptor called on pattern match
     */
    public function __construct()
    {
        $arguments = func_get_args();
        if (!array_key_exists(0, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $pattern in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
        if (!array_key_exists(1, $arguments)) throw new \Neos\Flow\ObjectManagement\Exception\UnresolvedDependenciesException('Missing required constructor argument $securityInterceptor in class ' . __CLASS__ . '. Note that constructor injection is only support for objects of scope singleton (and this is not a singleton) – for other scopes you must pass each required argument to the constructor yourself.', 1296143788);
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
  'pattern' => 'Neos\\Flow\\Security\\RequestPatternInterface',
  'securityInterceptor' => 'Neos\\Flow\\Security\\Authorization\\InterceptorInterface',
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
# PathAndFilename: /var/www/php/Packages/Framework/Neos.Flow/Classes/Security/Authorization/RequestFilter.php
#