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

/* /library/Vanilla/EmbeddedContent/Embeds/ImageEmbed.twig */
class __TwigTemplate_14e6a25c996f8d2ca9b2c2acc2148f242a093a67fc78b64d02b009b8a6923c13 extends \Twig\Template
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
        echo "<div class=\"embedExternal embedImage display-";
        echo twig_escape_filter($this->env, ($context["displaySize"] ?? null), "html", null, true);
        echo " float-";
        echo twig_escape_filter($this->env, ($context["float"] ?? null), "html", null, true);
        echo "\">
    <div class=\"embedExternal-content\">
        <a class=\"embedImage-link\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, Gdn_Format::sanitizeUrl(($context["url"] ?? null)), "html", null, true);
        echo "\" rel=\"nofollow noreferrer noopener ugc\" target=\"_blank\">
            <img class=\"embedImage-img\" src=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\"/>
        </a>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "/library/Vanilla/EmbeddedContent/Embeds/ImageEmbed.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 4,  45 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/library/Vanilla/EmbeddedContent/Embeds/ImageEmbed.twig", "/Users/mengdoo/codes/www/source/vanilla/library/Vanilla/EmbeddedContent/Embeds/ImageEmbed.twig");
    }
}
