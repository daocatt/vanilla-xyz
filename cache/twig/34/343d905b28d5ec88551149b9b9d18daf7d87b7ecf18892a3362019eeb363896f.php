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

/* /addons/themes/theme-foundation/views/layout.default.twig */
class __TwigTemplate_27e68368fc64b93bbce9a245a6166723ea15507fc6082241ce22407defcf7fe7 extends \Twig\Template
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
        echo "<div class=\"Frame\">
    <div class=\"Frame-top\">
        <main class=\"Frame-body\">
            ";
        // line 4
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('renderBanner')->getCallable(), []), "html", null, true);
        echo "
            <div class=\"Frame-content\">
                <div class=\"Container\">
                    <div class=\"Frame-contentWrap\">
                        <div class=\"Frame-details\">
                            ";
        // line 9
        if ( !($context["isHomepage"] ?? null)) {
            // line 10
            echo "                                <div class=\"Frame-row\">
                                    <nav class=\"BreadcrumbsBox\" aria-label=";
            // line 11
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Breadcrumb"]), "html", null, true);
            echo ">
                                        ";
            // line 12
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('renderBreadcrumbs')->getCallable(), []), "html", null, true);
            echo "
                                    </nav>
                                </div>
                            ";
        }
        // line 16
        echo "                            <div class=\"Frame-row\">

                                <!-- Main Content -->
                                <section class=\"Content MainContent\">
                                    ";
        // line 20
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('renderControllerAsset')->getCallable(), ["Content"]), "html", null, true);
        echo "
                                </section>
                                <!-- Main Content END -->

                                <!-- Main Panel -->
                                <div class=\"Panel Panel-main\">
                                    ";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('renderControllerAsset')->getCallable(), ["Panel"]), "html", null, true);
        echo "
                                </div>
                                <!-- Main Panel END -->

                            </div>
                            ";
        // line 31
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('renderControllerAsset')->getCallable(), ["AfterBody"]), "html", null, true);
        echo "
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    ";
        // line 38
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('renderControllerAsset')->getCallable(), ["Foot"]), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "/addons/themes/theme-foundation/views/layout.default.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 38,  89 => 31,  81 => 26,  72 => 20,  66 => 16,  59 => 12,  55 => 11,  52 => 10,  50 => 9,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/addons/themes/theme-foundation/views/layout.default.twig", "/Users/mengdoo/codes/www/source/vanilla/addons/themes/theme-foundation/views/layout.default.twig");
    }
}
