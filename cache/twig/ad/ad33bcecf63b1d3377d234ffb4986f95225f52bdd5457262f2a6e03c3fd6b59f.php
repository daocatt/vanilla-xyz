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

/* /library/Vanilla/Web/MasterView.twig */
class __TwigTemplate_899eabfda07ae38236bac71613ec1f60751efd1e9e850adb33904155b3851211 extends \Twig\Template
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
        echo "<!DOCTYPE html>
<html lang=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["locale"] ?? null), "html", null, true);
        echo "\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        ";
        // line 7
        echo twig_escape_filter($this->env, ($context["pageHead"] ?? null), "html", null, true);
        echo "
        <noscript>
            <style>
                .fullPageLoader { display: none }

                body.isLoading .page {
                    max-height: initial;
                    height: initial;
                }
            </style>
        </noscript>
    </head>
    <body class=\"";
        // line 19
        echo twig_escape_filter($this->env, ($context["cssClasses"] ?? null), "html", null, true);
        echo "\">
        <div id=\"page\" class=\"page\">";
        // line 21
        if (($context["themeHeader"] ?? null)) {
            // line 22
            echo "<noscript id=\"themeHeader\">
                    ";
            // line 23
            echo twig_escape_filter($this->env, ($context["themeHeader"] ?? null), "html", null, true);
            echo "
                </noscript>";
        }
        // line 26
        if ((((isset($context["bodyContent"]) || array_key_exists("bodyContent", $context))) ? (_twig_default_filter(($context["bodyContent"] ?? null), false)) : (false))) {
            // line 27
            echo "<header id=\"titleBar\" data-react=\"title-bar-hamburger\"></header>
                ";
            // line 28
            echo twig_escape_filter($this->env, ($context["bodyContent"] ?? null), "html", null, true);
        } else {
            // line 30
            echo "<header id=\"titleBar\"></header>
                <div id=\"app\" class=\"page-minHeight\">";
            // line 32
            if ((((isset($context["seoContent"]) || array_key_exists("seoContent", $context))) ? (_twig_default_filter(($context["seoContent"] ?? null), false)) : (false))) {
                // line 33
                echo "<noscript id=\"fallbackPageContent\">
                            <h1 class=\"heading heading-1 pageTitle\">";
                // line 35
                echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
                // line 36
                echo "</h1>";
                // line 37
                echo twig_escape_filter($this->env, ($context["seoContent"] ?? null), "html", null, true);
                // line 38
                echo "</noscript>";
            }
            // line 40
            echo "<div class=\"fullPageLoader\"></div>
                </div>";
        }
        // line 43
        if (($context["themeFooter"] ?? null)) {
            // line 44
            echo "<noscript id=\"themeFooter\">";
            echo twig_escape_filter($this->env, ($context["themeFooter"] ?? null), "html", null, true);
            echo "</noscript>";
        }
        // line 46
        echo "</div>
        <div id=\"modals\"></div>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "/library/Vanilla/Web/MasterView.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  113 => 46,  108 => 44,  106 => 43,  102 => 40,  99 => 38,  97 => 37,  95 => 36,  93 => 35,  90 => 33,  88 => 32,  85 => 30,  82 => 28,  79 => 27,  77 => 26,  72 => 23,  69 => 22,  67 => 21,  63 => 19,  48 => 7,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/library/Vanilla/Web/MasterView.twig", "/Users/mengdoo/codes/www/source/vanilla/library/Vanilla/Web/MasterView.twig");
    }
}
