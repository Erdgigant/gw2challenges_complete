<?php 
namespace Neos\SwiftMailer;

/*
 * This file is part of the Neos.SwiftMailer package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\Flow\Annotations as Flow;

/**
 * Message class for the SwiftMailer package
 *
 * @Flow\Scope("prototype")
 */
class Message_Original extends \Swift_Message
{

    /**
     * @Flow\Inject
     * @var \Neos\SwiftMailer\MailerInterface
     */
    protected $mailer;

    /**
     * True if the message has been sent.
     * @var boolean
     */
    protected $sent = false;

    /**
     * Holds the failed recipients after the message has been sent
     * @var array
     */
    protected $failedRecipients = array();

    /**
     * Sends the message.
     *
     * @return integer the number of recipients who were accepted for delivery
     */
    public function send()
    {
        $this->sent = true;
        $this->failedRecipients = array();
        return $this->mailer->send($this, $this->failedRecipients);
    }

    /**
     * Checks whether the message has been sent.
     *
     * @return boolean
     */
    public function isSent()
    {
        return $this->sent;
    }

    /**
     * Returns the recipients for which the mail was not accepted for delivery.
     *
     * @return array the recipients who were not accepted for delivery
     */
    public function getFailedRecipients()
    {
        return $this->failedRecipients;
    }

}

#
# Start of Flow generated Proxy code
#
namespace Neos\SwiftMailer;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * Message class for the SwiftMailer package
 * @\Neos\Flow\Annotations\Scope("prototype")
 */
class Message extends Message_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait, \Neos\Flow\ObjectManagement\DependencyInjection\PropertyInjectionTrait;


    /**
     * Autogenerated Proxy Method
     * @param string $subject
     * @param string $body
     * @param string $contentType
     * @param string $charset
     */
    public function __construct()
    {
        $arguments = func_get_args();
        call_user_func_array('parent::__construct', $arguments);
        if ('Neos\SwiftMailer\Message' === get_class($this)) {
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
  'mailer' => '\\Neos\\SwiftMailer\\MailerInterface',
  'sent' => 'boolean',
  'failedRecipients' => 'array',
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
        $this->Flow_Proxy_injectProperties();
        return parent::__wakeup();
;
    }

    /**
     * Autogenerated Proxy Method
     */
    private function Flow_Proxy_injectProperties()
    {
        $this->mailer = new \Neos\SwiftMailer\Mailer(\Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\SwiftMailer\TransportInterface'));
        $this->Flow_Injected_Properties = array (
  0 => 'mailer',
);
    }
}
# PathAndFilename: /var/www/php/Packages/Application/Neos.SwiftMailer/Classes/Message.php
#