<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /applications/dashboard/views/utility/raw.twig */
class __TwigTemplate_21b5281609f97395aaa8bc85cbe83716684c67528cd57fb5e35bf8261423a1f8 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo " ";
        if (($context["data"] ?? null)) {
            // line 2
            echo "    ";
            // line 3
            echo "    ";
            echo ($context["data"] ?? null);
            echo "
 ";
        }
    }

    public function getTemplateName()
    {
        return "/applications/dashboard/views/utility/raw.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/applications/dashboard/views/utility/raw.twig", "/Users/mengdoo/codes/www/source/vanilla/applications/dashboard/views/utility/raw.twig");
    }
}
