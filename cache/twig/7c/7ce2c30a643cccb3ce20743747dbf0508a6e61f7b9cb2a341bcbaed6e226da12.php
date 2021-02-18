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

/* @gtdsimple/customStyles.twig */
class __TwigTemplate_40407523a7038851a9882ca9bbe10203a8882ea63fde17651fddca5f0b52c94b extends \Twig\Template
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
        echo "<section>
<h2 class=\"subheading\">";
        // line 2
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Options"]), "html", null, true);
        echo "</h2>
<ul>
    <li class=\"form-group\">
    ";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "toggle", [0 => "ThemeOptions.Options.hasHeroBanner", 1 => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Integrate Banner Image"]), 2 => [], 3 => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Displays the banner image form the branding page prominently throughout the theme."])], "method", false, false, false, 5), "html", null, true);
        // line 10
        echo "
    </li>
    <li class=\"form-group\">
    ";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "toggle", [0 => "ThemeOptions.Options.hasFeatureSearchbox", 1 => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Banner Search Box"]), 2 => [], 3 => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Display a searchbox on top of the banner image."])], "method", false, false, false, 13), "html", null, true);
        // line 18
        echo "
    </li>
    <li class=\"form-group\">
    ";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "toggle", [0 => "ThemeOptions.Options.panelToLeft", 1 => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Panel to the left"]), 2 => [], 3 => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Change the main panel's position to the left side."])], "method", false, false, false, 21), "html", null, true);
        // line 26
        echo "
    </li>
</ul>
</section>
<div class=\"form-footer js-modal-footer\">
";
        // line 31
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "button", [0 => "Save"], "method", false, false, false, 31), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "@gtdsimple/customStyles.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 31,  62 => 26,  60 => 21,  55 => 18,  53 => 13,  48 => 10,  46 => 5,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@gtdsimple/customStyles.twig", "/Users/mengdoo/codes/www/source/vanilla/addons/themes/gtdsimple/views/customStyles.twig");
    }
}
