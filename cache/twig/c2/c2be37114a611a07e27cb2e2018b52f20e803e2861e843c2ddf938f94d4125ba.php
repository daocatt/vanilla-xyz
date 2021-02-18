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

/* /applications/dashboard/views/settings/profile.twig */
class __TwigTemplate_a509278989e030a05c124216c926552a55d6244c15650460dc7bb06ce4a626e5 extends \Twig\Template
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
        $macros["__internal_51606d01e638f31d6b6402614f4ab8e6d576213822878b0aff7e55421888fa6d"] = $this->macros["__internal_51606d01e638f31d6b6402614f4ab8e6d576213822878b0aff7e55421888fa6d"] = $this->loadTemplate("@dashboard/components/macros.twig", "/applications/dashboard/views/settings/profile.twig", 1)->unwrap();
        // line 2
        echo "
";
        // line 3
        echo twig_escape_filter($this->env, helpAsset("Heads Up!", ((call_user_func_array($this->env->getFunction('t')->getCallable(), ["This redirect only applies if a SSO ID exists for the destination user.", ("This redirect only applies if a SSO ID exists for the destination user. " . "Otherwise the default Vanilla user profile is shown.")]) . "<br /><br />") . call_user_func_array($this->env->getFunction('t')->getCallable(), ["*Allowed tag: {userID} {name} {ssoID}", "*Allowed tag: {userID} {name} {ssoID}"]))), "html", null, true);
        // line 17
        echo "

";
        // line 19
        echo twig_call_macro($macros["__internal_51606d01e638f31d6b6402614f4ab8e6d576213822878b0aff7e55421888fa6d"], "macro_dashboardHeading", [["title" => ($context["Title"] ?? null)]], 19, $context, $this->getSourceContext());
        echo "
";
        // line 20
        echo twig_get_attribute($this->env, $this->source, ($context["ConfigurationModule"] ?? null), "render", [], "method", false, false, false, 20);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/applications/dashboard/views/settings/profile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 20,  48 => 19,  44 => 17,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/applications/dashboard/views/settings/profile.twig", "/Users/mengdoo/codes/www/source/vanilla/applications/dashboard/views/settings/profile.twig");
    }
}
