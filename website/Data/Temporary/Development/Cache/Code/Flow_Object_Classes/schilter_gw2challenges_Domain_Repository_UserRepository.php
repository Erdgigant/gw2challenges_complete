<?php 
namespace schilter\gw2challenges\Domain\Repository;

/*
 * This file is part of the Internezzo.PassePartout package.
 */
use Neos\Flow\Annotations as Flow;

/**
 * @Flow\Scope("singleton")
 */
class UserRepository_Original {
	
	/**
	 * @Flow\Inject
	 * @var \Neos\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;
	
	/**	
	 * @FLow\Inject
	 * @var \schilter\gw2challenges\Service\PDOService
	 */
	protected $pdoService;

	/**
	 * @Flow\Inject
	 * @var \Neos\Flow\Property\PropertyMapper
	 */
	protected $propertyMapper;
	
	public function add($user){
		try{
			$this->pdoService->getPdo()->beginTransaction();	
			$identifier =  \Neos\Utility\ObjectAccess::getProperty($user, 'Persistence_Object_Identifier', true);
			$sql = 'INSERT INTO schilter_gw2challenges_domain_model_user (persistence_object_identifier, account, apikey) VALUES (\''.$identifier.'\', \''.$this->persistenceManager->getIdentifierByObject($user->getAccount()).'\', \''.$user->getApiKey().'\')';					
			$stmt = $this->pdoService->getPdo()->prepare($sql);
			$stmt->execute();		
			$this->pdoService->getPdo()->commit();
		}
		catch(\PDOException $e){
			$this->pdoService->getPdo()->rollBack();
			die($e->getMessage());
		}
	}

	/**
	 * @param $account \Neos\Flow\Security\Account
	 * @return array
	 */
	public function findByAccount($account){
		$sql = 'SELECT * FROM schilter_gw2challenges_domain_model_user WHERE account = \''.$this->persistenceManager->getIdentifierByObject($account).'\'';
		$stmt = $this->pdoService->getPdo()->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch(); 		
		return $this->propertyMapper->convert(
				$result,
				\schilter\gw2challenges\Domain\Model\User::class,
				$this->getConfiguration());
	}
	
	/**
	 * 
	 * @param \schilter\gw2challenges\Domain\Model\User $user
	 */
	public function updateApiKey($user){
		$sql = 'UPDATE schilter_gw2challenges_domain_model_user SET apikey = \''.$user->getApiKey().'\' WHERE id ='.$user->getId();
		$stmt = $this->pdoService->getPdo()->prepare($sql);
		$stmt->execute();
	}
	
	/**
	 *
	 * @param \schilter\gw2challenges\Domain\Model\User $user
	 */
	public function updateMinis($user){
		$sql = 'UPDATE schilter_gw2challenges_domain_model_user SET minis = \''.$user->getMinis().'\' WHERE id ='.$user->getId();
		$stmt = $this->pdoService->getPdo()->prepare($sql);
		$stmt->execute();
	}
	
	public function updateChallenges($id){
		$sql = 'UPDATE schilter_gw2challenges_domain_model_user SET challenges = CONCAT(IFNULL(challenges,  \'\'), \','.$id.'\')';
		$stmt = $this->pdoService->getPdo()->prepare($sql);
		$stmt->execute();
	}
	
	public function getConfiguration()
	{
		/** @var PropertyMappingConfiguration $configuration */
		$configuration = new \Neos\Flow\Property\PropertyMappingConfiguration();
	
		$configuration->setTypeConverterOptions(\Neos\Flow\Property\TypeConverter\PersistentObjectConverter::class, [
				\Neos\Flow\Property\TypeConverter\PersistentObjectConverter::CONFIGURATION_CREATION_ALLOWED => true,
				\Neos\Flow\Property\TypeConverter\PersistentObjectConverter::CONFIGURATION_MODIFICATION_ALLOWED => true
		]);
		$configuration->skipUnknownProperties();
		$configuration->allowProperties('id', 'account', 'minis', 'challenges', 'apikey');
	
		return $configuration;
	}
}







#
# Start of Flow generated Proxy code
#
namespace schilter\gw2challenges\Domain\Repository;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * 
 * @\Neos\Flow\Annotations\Scope("singleton")
 */
class UserRepository extends UserRepository_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait, \Neos\Flow\ObjectManagement\DependencyInjection\PropertyInjectionTrait;


    /**
     * Autogenerated Proxy Method
     */
    public function __construct()
    {
        if (get_class($this) === 'schilter\gw2challenges\Domain\Repository\UserRepository') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('schilter\gw2challenges\Domain\Repository\UserRepository', $this);
        if ('schilter\gw2challenges\Domain\Repository\UserRepository' === get_class($this)) {
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
  'persistenceManager' => '\\Neos\\Flow\\Persistence\\PersistenceManagerInterface',
  'pdoService' => '\\schilter\\gw2challenges\\Service\\PDOService',
  'propertyMapper' => '\\Neos\\Flow\\Property\\PropertyMapper',
);
        $result = $this->Flow_serializeRelatedEntities($transientProperties, $propertyVarTags);
        return $result;
    }

    /**
     * Autogenerated Proxy Method
     */
    public function __wakeup()
    {
        if (get_class($this) === 'schilter\gw2challenges\Domain\Repository\UserRepository') \Neos\Flow\Core\Bootstrap::$staticObjectManager->setInstance('schilter\gw2challenges\Domain\Repository\UserRepository', $this);

        $this->Flow_setRelatedEntities();
        $this->Flow_Proxy_injectProperties();
    }

    /**
     * Autogenerated Proxy Method
     */
    private function Flow_Proxy_injectProperties()
    {
        $this->Flow_Proxy_LazyPropertyInjection('Neos\Flow\Persistence\PersistenceManagerInterface', 'Neos\Flow\Persistence\Doctrine\PersistenceManager', 'persistenceManager', '8a72b773ea2cb98c2933df44c659da06', function() { return \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Persistence\PersistenceManagerInterface'); });
        $this->pdoService = new \schilter\gw2challenges\Service\PDOService();
        $this->Flow_Proxy_LazyPropertyInjection('Neos\Flow\Property\PropertyMapper', 'Neos\Flow\Property\PropertyMapper', 'propertyMapper', '2ab4a1ce2ee31715713d0f207f0ac637', function() { return \Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Property\PropertyMapper'); });
        $this->Flow_Injected_Properties = array (
  0 => 'persistenceManager',
  1 => 'pdoService',
  2 => 'propertyMapper',
);
    }
}
# PathAndFilename: /var/www/php/Packages/Application/schilter.gw2challenges/Classes/Domain/Repository/UserRepository.php
#