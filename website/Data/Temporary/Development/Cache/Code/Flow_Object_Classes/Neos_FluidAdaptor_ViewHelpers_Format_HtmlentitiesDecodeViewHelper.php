<?php 
namespace Neos\FluidAdaptor\ViewHelpers\Format;

/*
 * This file is part of the Neos.FluidAdaptor package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;

/**
 * Applies html_entity_decode() to a value
 *
 * @see http://www.php.net/html_entity_decode
 *
 * = Examples =
 *
 * <code title="default notation">
 * <f:format.htmlentitiesDecode>{text}</f:format.htmlentitiesDecode>
 * </code>
 * <output>
 * Text with &amp; &quot; &lt; &gt; replaced by unescaped entities (html_entity_decode applied).
 * </output>
 *
 * <code title="inline notation">
 * {text -> f:format.htmlentitiesDecode(encoding: 'ISO-8859-1')}
 * </code>
 * <output>
 * Text with &amp; &quot; &lt; &gt; replaced by unescaped entities (html_entity_decode applied).
 * </output>
 *
 * @api
 */
class HtmlentitiesDecodeViewHelper_Original extends AbstractViewHelper
{
    /**
     * @var boolean
     */
    protected $escapeChildren = false;

    /**
     * Disable the output escaping interceptor so that the result is not htmlspecialchar'd
     *
     * @var boolean
     */
    protected $escapeOutput = false;

    /**
     * Converts all HTML entities to their applicable characters as needed using PHPs html_entity_decode() function.
     *
     * @param string $value string to format
     * @param boolean $keepQuotes if TRUE, single and double quotes won't be replaced (sets ENT_NOQUOTES flag)
     * @param string $encoding
     * @return string the altered string
     * @see http://www.php.net/html_entity_decode
     * @api
     */
    public function render($value = null, $keepQuotes = false, $encoding = 'UTF-8')
    {
        return self::renderStatic(array('value' => $value, 'keepQuotes' => $keepQuotes, 'encoding' => $encoding), $this->buildRenderChildrenClosure(), $this->renderingContext);
    }

    /**
     * Applies html_entity_decode() on the specified value.
     *
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $value = $arguments['value'];
        if ($value === null) {
            $value = $renderChildrenClosure();
        }
        if (!is_string($value) && !(is_object($value) && method_exists($value, '__toString'))) {
            return $value;
        }
        $flags = $arguments['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT;

        return html_entity_decode($value, $flags, $arguments['encoding']);
    }
}

#
# Start of Flow generated Proxy code
#
namespace Neos\FluidAdaptor\ViewHelpers\Format;

use Doctrine\ORM\Mapping as ORM;
use Neos\Flow\Annotations as Flow;

/**
 * Applies html_entity_decode() to a value
 */
class HtmlentitiesDecodeViewHelper extends HtmlentitiesDecodeViewHelper_Original implements \Neos\Flow\ObjectManagement\Proxy\ProxyInterface {

    use \Neos\Flow\ObjectManagement\Proxy\ObjectSerializationTrait, \Neos\Flow\ObjectManagement\DependencyInjection\PropertyInjectionTrait;


    /**
     * Autogenerated Proxy Method
     */
    public function __construct()
    {
        if ('Neos\FluidAdaptor\ViewHelpers\Format\HtmlentitiesDecodeViewHelper' === get_class($this)) {
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
  'escapeChildren' => 'boolean',
  'escapeOutput' => 'boolean',
  'controllerContext' => 'Neos\\Flow\\Mvc\\Controller\\ControllerContext',
  'objectManager' => 'Neos\\Flow\\ObjectManagement\\ObjectManagerInterface',
  'systemLogger' => 'Neos\\Flow\\Log\\SystemLoggerInterface',
  'argumentDefinitions' => 'ArgumentDefinition[]',
  'viewHelperNode' => 'TYPO3Fluid\\Fluid\\Core\\Parser\\SyntaxTree\\ViewHelperNode',
  'arguments' => 'array',
  'childNodes' => 'NodeInterface[] array',
  'templateVariableContainer' => 'TYPO3Fluid\\Fluid\\Core\\Variables\\VariableProviderInterface',
  'renderingContext' => 'TYPO3Fluid\\Fluid\\Core\\Rendering\\RenderingContextInterface',
  'renderChildrenClosure' => '\\Closure',
  'viewHelperVariableContainer' => 'TYPO3Fluid\\Fluid\\Core\\ViewHelper\\ViewHelperVariableContainer',
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
    }

    /**
     * Autogenerated Proxy Method
     */
    private function Flow_Proxy_injectProperties()
    {
        $this->injectObjectManager(\Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\ObjectManagement\ObjectManagerInterface'));
        $this->injectSystemLogger(\Neos\Flow\Core\Bootstrap::$staticObjectManager->get('Neos\Flow\Log\SystemLoggerInterface'));
        $this->Flow_Injected_Properties = array (
  0 => 'objectManager',
  1 => 'systemLogger',
);
    }
}
# PathAndFilename: /var/www/php/Packages/Framework/Neos.FluidAdaptor/Classes/ViewHelpers/Format/HtmlentitiesDecodeViewHelper.php
#