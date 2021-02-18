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

/* __string_template__5758fa6ba03753ec711534cd956b02fcc73ad6dcd9df9c8d5b7e1a6f5e7e0a28 */
class __TwigTemplate_5634e3de303dd50fba46f162cd4a1f9f12ed11e334961e52253211b403c3efc8 extends \Twig\Template
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
        echo "<div class=\"";
        echo twig_escape_filter($this->env, ($context["class"] ?? null), "html", null, true);
        echo "\" data-react=\"";
        echo twig_escape_filter($this->env, ($context["component"] ?? null), "html", null, true);
        echo "\" data-props=\"";
        echo twig_escape_filter($this->env, ($context["props"] ?? null), "html", null, true);
        echo "\"></div>";
    }

    public function getTemplateName()
    {
        return "__string_template__5758fa6ba03753ec711534cd956b02fcc73ad6dcd9df9c8d5b7e1a6f5e7e0a28";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__5758fa6ba03753ec711534cd956b02fcc73ad6dcd9df9c8d5b7e1a6f5e7e0a28", "");
    }
}
