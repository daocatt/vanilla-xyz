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

/* @dashboard/components/macros.twig */
class __TwigTemplate_0cfe76867f19fd3e28a87a9c81ae9d1d91db06f96a4c49bbf431c6afd308d45c extends \Twig\Template
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
        // line 6
        echo "
";
        // line 10
        echo "
";
    }

    // line 7
    public function macro_dashboardHeading($__params__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "params" => $__params__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 8
            echo "    ";
            $this->loadTemplate("@dashboard/components/dashboardHeading.twig", "@dashboard/components/macros.twig", 8)->display($context);

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    // line 11
    public function macro_dashboardSymbol($__params__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "params" => $__params__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 12
            echo "    ";
            $this->loadTemplate("@dashboard/components/dashboardSymbol.twig", "@dashboard/components/macros.twig", 12)->display($context);

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "@dashboard/components/macros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 12,  68 => 11,  58 => 8,  45 => 7,  40 => 10,  37 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("", "@dashboard/components/macros.twig", "/Users/mengdoo/codes/www/source/vanilla/applications/dashboard/views/components/macros.twig");
    }
}
