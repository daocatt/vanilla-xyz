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

/* /applications/vanilla/views/vanillasettings/editcategory.twig */
class __TwigTemplate_5c22182d2260c8139366367173e657e8b7b0243ebe799f39c47a606243383dc1 extends \Twig\Template
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
        echo "
";
        // line 2
        $macros["__internal_d44934bd691c2f58f92ee1ece6c573c13ca0f1a228c4a89bd3710e71764311df"] = $this->macros["__internal_d44934bd691c2f58f92ee1ece6c573c13ca0f1a228c4a89bd3710e71764311df"] = $this->loadTemplate("@dashboard/components/macros.twig", "/applications/vanilla/views/vanillasettings/editcategory.twig", 2)->unwrap();
        // line 3
        echo "
";
        // line 4
        echo twig_escape_filter($this->env, helpAsset(sprintf(call_user_func_array($this->env->getFunction('t')->getCallable(), ["About %s"]), call_user_func_array($this->env->getFunction('t')->getCallable(), ["Categories"])), call_user_func_array($this->env->getFunction('t')->getCallable(), ["Categories are used to organize discussions.", "Categories allow you to organize your discussions."])), "html", null, true);
        // line 10
        echo "

";
        // line 12
        echo twig_call_macro($macros["__internal_d44934bd691c2f58f92ee1ece6c573c13ca0f1a228c4a89bd3710e71764311df"], "macro_dashboardHeading", [["title" =>         // line 14
($context["Title"] ?? null), "returnUrl" => "/vanilla/settings/categories"]], 13, $context, $this->getSourceContext());
        // line 17
        echo "
";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "open", [0 => ["enctype" => "multipart/form-data"]], "method", false, false, false, 18), "html", null, true);
        echo "
";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "errors", [], "method", false, false, false, 19), "html", null, true);
        echo "
";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "hidden", [0 => "ParentCategoryID"], "method", false, false, false, 20), "html", null, true);
        echo "
<ul>
    <li class=\"form-group\">
        <div class=\"label-wrap\">
            ";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "label", [0 => "Category", 1 => "Name"], "method", false, false, false, 24), "html", null, true);
        echo "
        </div>
        <div class=\"input-wrap\">
            ";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "textBox", [0 => "Name"], "method", false, false, false, 27), "html", null, true);
        echo "
        </div>
    </li>
    <li class=\"form-group\">
        <div class=\"label-wrap\">
            <strong>";
        // line 32
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Category Url:"]), "html", null, true);
        echo "</strong>
        </div>
        <div id=\"UrlCode\" class=\"input-wrap category-url-code\">
            ";
        // line 35
        ob_start(function () { return ''; });
        // line 36
        echo "                <div class=\"category-url\">
                    ";
        // line 37
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), ["/categories", true]), "html", null, true);
        echo "/";
        // line 38
        echo "<span>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "getValue", [0 => "UrlCode"], "method", false, false, false, 38), "html", null, true);
        echo "</span>
                </div>";
        // line 40
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "textBox", [0 => "UrlCode"], "method", false, false, false, 40), "html", null, true);
        // line 41
        echo ((twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "getValue", [0 => "UrlCode"], "method", false, false, false, 41)) ? ("/") : (""));
        // line 42
        echo "<a class=\"Edit btn btn-link\" href=\"#\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["edit"]), "html", null, true);
        echo "</a>&nbsp;<a class=\"Save btn btn-primary\" href=\"#\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["OK"]), "html", null, true);
        echo "</a>&nbsp;
            ";
        $___internal_26d1389dbaf0d611c8164a736b5af473f72dc95ab5a72d8a2372029ea7c1279a_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 35
        echo twig_spaceless($___internal_26d1389dbaf0d611c8164a736b5af473f72dc95ab5a72d8a2372029ea7c1279a_);
        // line 44
        echo "        </div>
    </li>
    <li class=\"form-group\">
        <div class=\"label-wrap\">
            ";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "label", [0 => "Description", 1 => "Description"], "method", false, false, false, 48), "html", null, true);
        echo "
        </div>
        <div class=\"input-wrap\">
            ";
        // line 51
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "textBox", [0 => "Description", 1 => ["MultiLine" => true]], "method", false, false, false, 51), "html", null, true);
        echo "
        </div>
    </li>
    <li class=\"form-group\">
        <div class=\"label-wrap\">
            ";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "label", [0 => "Css Class", 1 => "CssClass"], "method", false, false, false, 56), "html", null, true);
        echo "
        </div>
        <div class=\"input-wrap\">
            ";
        // line 59
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "textBox", [0 => "CssClass", 1 => ["MultiLine" => false]], "method", false, false, false, 59), "html", null, true);
        echo "
        </div>
    </li>
    ";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "imageUploadReact", [0 => "Photo", 1 => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Photo"])], "method", false, false, false, 62), "html", null, true);
        // line 65
        echo "
    ";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "imageUploadReact", [0 => "BannerImage", 1 => call_user_func_array($this->env->getFunction('t')->getCallable(), ["Banner Image"]), 2 => call_user_func_array($this->env->getFunction('t')->getCallable(), ["The banner image to use for this category. Recommended dimensions are about 1000px by 400px or a similar ratio."])], "method", false, false, false, 66), "html", null, true);
        // line 70
        echo "

    <li class=\"form-group\">
        <div class=\"label-wrap\">
            ";
        // line 74
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "label", [0 => "Display As", 1 => "DisplayAs"], "method", false, false, false, 74), "html", null, true);
        echo "
        </div>
        <div class=\"input-wrap\">
            ";
        // line 77
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "dropDown", [0 => "DisplayAs", 1 => ($context["DisplayAsOptions"] ?? null), 2 => ["Wrap" => true]], "method", false, false, false, 77), "html", null, true);
        echo "
        </div>
    </li>
    ";
        // line 83
        echo "    ";
        if ((isset($context["_ExtendedFields"]) || array_key_exists("_ExtendedFields", $context))) {
            // line 84
            echo "        ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "simple", [0 => ($context["_ExtendedFields"] ?? null), 1 => []], "method", false, false, false, 84), "html", null, true);
            echo "
    ";
        }
        // line 86
        echo "    <li class=\"form-group\">
        ";
        // line 87
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "toggle", [0 => "HideAllDiscussions", 1 => "Hide from the recent discussions page."], "method", false, false, false, 87), "html", null, true);
        echo "
    </li>
    ";
        // line 89
        if ((($context["Operation"] ?? null) === "Edit")) {
            // line 90
            echo "        <li class=\"form-group\">
            ";
            // line 91
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "toggle", [0 => "Archived", 1 => "This category is archived."], "method", false, false, false, 91), "html", null, true);
            echo "
        </li>
    ";
        }
        // line 94
        echo "    ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('firePluggableEchoEvent')->getCallable(), [($context["pluggable"] ?? null), "afterCategorySettings"]), "html", null, true);
        echo "
    ";
        // line 95
        if ((twig_length_filter($this->env, ($context["PermissionData"] ?? null)) > 0)) {
            // line 96
            echo "        <li id=\"Permissions\" class=\"form-group\">
            ";
            // line 97
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "toggle", [0 => "CustomPermissions", 1 => "This category has custom permissions."], "method", false, false, false, 97), "html", null, true);
            echo "
        </li>
    ";
        }
        // line 100
        echo "
    <li id=\"Featured\" class=\"form-group\">
        ";
        // line 102
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "toggle", [0 => "Featured", 1 => "Featured category."], "method", false, false, false, 102), "html", null, true);
        echo "
    </li>

</ul>
<div class=\"CategoryPermissions\">

    ";
        // line 108
        if ((twig_length_filter($this->env, ($context["DiscussionTypes"] ?? null)) > 1)) {
            // line 109
            echo "        <div class=\"P DiscussionTypes form-group\">
            <div class=\"label-wrap\">
                ";
            // line 111
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "label", [0 => "Discussion Types"], "method", false, false, false, 111), "html", null, true);
            echo "
            </div>
            <div class=\"checkbox-list input-wrap\">
                ";
            // line 114
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["DiscussionTypes"] ?? null));
            foreach ($context['_seq'] as $context["type"] => $context["row"]) {
                // line 115
                echo "                    ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "checkBox", [0 => "AllowedDiscussionTypes[]", 1 => ((twig_get_attribute($this->env, $this->source, $context["row"], "Plural", [], "any", false, false, false, 115)) ? (twig_get_attribute($this->env, $this->source, $context["row"], "Plural", [], "any", false, false, false, 115)) : ($context["type"])), 2 => ["value" => $context["type"]]], "method", false, false, false, 115), "html", null, true);
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['type'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 117
            echo "            </div>
        </div>
    ";
        }
        // line 120
        echo "
    ";
        // line 121
        if ((isset($context["_PermissionFields"]) || array_key_exists("_PermissionFields", $context))) {
            // line 122
            echo "    ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "simple", [0 => ($context["_PermissionFields"] ?? null), 1 => []], "method", false, false, false, 122), "html", null, true);
            echo "
    ";
        }
        // line 124
        echo "
    <div class=\"padded\">";
        // line 125
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('t')->getCallable(), ["Check all permissions that apply for each role"]), "html", null, true);
        echo "</div>
    ";
        // line 126
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "checkBoxGridGroups", [0 => ($context["PermissionData"] ?? null), 1 => "Permission"], "method", false, false, false, 126), "html", null, true);
        echo "
</div>
";
        // line 128
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "close", [0 => "Save"], "method", false, false, false, 128), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/applications/vanilla/views/vanillasettings/editcategory.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  286 => 128,  281 => 126,  277 => 125,  274 => 124,  268 => 122,  266 => 121,  263 => 120,  258 => 117,  249 => 115,  245 => 114,  239 => 111,  235 => 109,  233 => 108,  224 => 102,  220 => 100,  214 => 97,  211 => 96,  209 => 95,  204 => 94,  198 => 91,  195 => 90,  193 => 89,  188 => 87,  185 => 86,  179 => 84,  176 => 83,  170 => 77,  164 => 74,  158 => 70,  156 => 66,  153 => 65,  151 => 62,  145 => 59,  139 => 56,  131 => 51,  125 => 48,  119 => 44,  117 => 35,  109 => 42,  107 => 41,  105 => 40,  100 => 38,  97 => 37,  94 => 36,  92 => 35,  86 => 32,  78 => 27,  72 => 24,  65 => 20,  61 => 19,  57 => 18,  54 => 17,  52 => 14,  51 => 12,  47 => 10,  45 => 4,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/applications/vanilla/views/vanillasettings/editcategory.twig", "/Users/mengdoo/codes/www/source/vanilla/applications/vanilla/views/vanillasettings/editcategory.twig");
    }
}
