<?php 
namespace Sandstorm\UserManagement\Domain\Repository;

/*                                                                             *
 * This script belongs to the Flow package "Sandstorm.UserManagement".         *
 *                                                                             *
 *                                                                             */

use Sandstorm\UserManagement\Domain\Model\RegistrationFlow;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\Persistence\QueryResultInterface;
use Neos\Flow\Persistence\Repository;

/**
 * @Flow\Scope("singleton")
 * @method QueryResultInterface findByEmail(string $email)
 * @method RegistrationFlow findOneByEmail(string $email)
 * @method RegistrationFlow findOneByActivationToken(string $token)
 */
class RegistrationFlowRepository_Original extends Repository
{

    // add customized methods here
}

#
# Start of Flow generated Proxy code
#
namespace Sandstorm\UserManagement\Domain\Repository;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * 
 * @\Neos\Flow\Annotations\Scope("singleton")
 */
class RegistrationFlowRepository extends RegistrationFlowRepository_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait, \Neos\Flow\ObjectManagement\DependencyInjection\PropertyInjectionTrait;


    /**
     * Autogenerated Proxy Method
     */
    public function __construct()
    {
        if (get_class($this) === 'Sandstorm\UserManagement\Domain\Repository\RegistrationFlowRepository') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Sandstorm\UserManagement\Domain\Repository\RegistrationFlowRepository', $this);
        parent::__construct();
        if ('Sandstorm\UserManagement\Domain\Repository\RegistrationFlowRepository' === get_class($this)) {
            $this->Flow_Proxy_injectProperties();
        }
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
  'persistenceManager' => 'Neos\\Flow\\Persistence\\PersistenceManagerInterface',
  'entityClassName' => 'string',
  'defaultOrderings' => 'array',
);
        $result = $this->Flow_serializeRelatedEntities($transientProperties, $propertyVarTags);
        return $result;
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __wakeup()
    {
        if (get_class($this) === 'Sandstorm\UserManagement\Domain\Repository\RegistrationFlowRepository') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('Sandstorm\UserManagement\Domain\Repository\RegistrationFlowRepository', $this);

        $this->Flow_setRelatedEntities();
        $this->Flow_Proxy_injectProperties();
    }

    /**
     * Autogenerated Proxy Method
     */
    private function Flow_Proxy_injectProperties()
    {
        $this->Flow_Proxy_LazyPropertyInjection('Neos\Flow\Persistence\PersistenceManagerInterface', 'Neos\Flow\Persistence\Doctrine\PersistenceManager', 'persistenceManager', '8a72b773ea2cb98c2933df44c659da06', function() { return \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Persistence\PersistenceManagerInterface'); });
        $this->Flow_Injected_Properties = array (
  0 => 'persistenceManager',
);
    }
}
# PathAndFilename: /var/www/php/Packages/Application/Sandstorm.UserManagement/Classes/Domain/Repository/RegistrationFlowRepository.php
#