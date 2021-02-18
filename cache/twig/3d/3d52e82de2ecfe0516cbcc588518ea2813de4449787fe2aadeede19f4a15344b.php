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

/* library/Vanilla/Web/Asset/InlinePolyfillContent.js.twig */
class __TwigTemplate_20944d493e45afcc603709a67dcdd33c224d581bdd23332b96ec84a6e0b43506 extends \Twig\Template
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
        // line 2
        echo "var supportsAllFeatures =
    window.Promise &&
    window.Promise.prototype.finally &&
    window.fetch &&
    window.Symbol &&
    window.CustomEvent &&
    Array.prototype.includes &&
    Element.prototype.remove &&
    Element.prototype.closest &&
    Element.prototype.attachShadow &&
    window.NodeList &&
    NodeList.prototype.forEach
;

if (!supportsAllFeatures) {
    ";
        // line 17
        echo ($context["debugModeLiteral"] ?? null);
        echo " && console.log(\"Older browser detected. Initiating polyfills.\");
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.src = \"";
        // line 20
        echo twig_get_attribute($this->env, $this->source, ($context["polyfillAsset"] ?? null), "getWebPath", [], "method", false, false, false, 20);
        echo "\";

    ";
        // line 27
        echo "    script.async = false;
    // document.write has to be used instead of append child for edge & old safari compatibility.
    document.write(script.outerHTML);
} else {
    ";
        // line 31
        echo ($context["debugModeLiteral"] ?? null);
        echo " && console.log(\"Modern browser detected. No polyfills necessary\");
}

if (!window.onVanillaReady) {
    window.onVanillaReady = function (handler) {
        if (typeof handler !== \"function\") {
            console.error(\"Cannot register a vanilla ready handler that is not a function.\");
            return;
        }
        document.addEventListener(\"X-DOMContentReady\", function () {
            if (!window.__VANILLA_INTERNAL_IS_READY__) {
                return;
            }
            handler(window.__VANILLA_GLOBALS_DO_NOT_USE_DIRECTLY__);
        })

        if (window.__VANILLA_INTERNAL_IS_READY__) {
            handler(window.__VANILLA_GLOBALS_DO_NOT_USE_DIRECTLY__);
        }
    }
}";
    }

    public function getTemplateName()
    {
        return "library/Vanilla/Web/Asset/InlinePolyfillContent.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 31,  65 => 27,  60 => 20,  54 => 17,  37 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "library/Vanilla/Web/Asset/InlinePolyfillContent.js.twig", "/Users/mengdoo/codes/www/source/vanilla/library/Vanilla/Web/Asset/InlinePolyfillContent.js.twig");
    }
}
