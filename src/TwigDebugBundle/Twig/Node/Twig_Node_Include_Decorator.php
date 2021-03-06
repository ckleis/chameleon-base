<?php

/*
 * This file is part of the Chameleon System (https://www.chameleonsystem.com).
 *
 * (c) ESONO AG (https://www.esono.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ChameleonSystem\TwigDebugBundle\Twig\Node;

use Twig\Source;
use Twig_Compiler;
use Twig_Node_Include;
use Twig_NodeOutputInterface;

class Twig_Node_Include_Decorator extends \Twig_Node implements Twig_NodeOutputInterface
{
    /**
     * @var Twig_Node_Include
     */
    private $original;

    /**
     * @param Twig_Node_Include $original
     */
    public function __construct(Twig_Node_Include $original)
    {
        $this->original = $original;
    }

    public function compile(Twig_Compiler $compiler)
    {
        $snippet = $this->original->getNode('expr')->hasAttribute('value') ? $snippet = $this->original->getNode('expr')->getAttribute('value') : null;
        if ($snippet) {
            $compiler->write('echo "\n\n<!-- START INCLUDE '.$snippet.' -->\n\n";');
        }
        $this->original->compile($compiler);
        if ($snippet) {
            $compiler->write('echo "\n\n<!-- END INCLUDE '.$snippet.' -->\n\n";');
        }
    }

    public function getIterator()
    {
        return $this->original->getIterator();
    }

    public function getNodeTag()
    {
        return $this->original->getNodeTag();
    }

    public function count()
    {
        return $this->original->count();
    }

    public function getTemplateLine()
    {
        return $this->original->getTemplateLine();
    }

    public function setTemplateName($name)
    {
        $this->original->setTemplateName($name);
    }

    public function getTemplateName()
    {
        return $this->original->getTemplateName();
    }

    public function setSourceContext(Source $source)
    {
        $this->original->setSourceContext($source);
    }

    public function getSourceContext()
    {
        return $this->original->getSourceContext();
    }
}
