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

/* @dashboard/components/dashboardHeading.twig */
class __TwigTemplate_04eb0fccab7f25de0884d6d05586db346b1eaedc46cf41f56f9680cfb7e9f7c2 extends \Twig\Template
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
        // line 11
        $macros["__internal_c6baebb994f1307649667aa057194fa2a7a4672a1a230867b5efa5a140b017bc"] = $this->macros["__internal_c6baebb994f1307649667aa057194fa2a7a4672a1a230867b5efa5a140b017bc"] = $this->loadTemplate("@dashboard/components/macros.twig", "@dashboard/components/dashboardHeading.twig", 11)->unwrap();
        // line 12
        echo "<header class=\"header-block\">
    <div class=\"title-block\">
        ";
        // line 14
        if (((twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "returnUrl", [], "any", true, true, false, 14)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "returnUrl", [], "any", false, false, false, 14), false)) : (false))) {
            // line 15
            echo "            <a href=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('url')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "returnUrl", [], "any", false, false, false, 15)]), "html", null, true);
            echo "\" class=\"btn btn-icon btn-return\" aria-label=\"Return\">
                ";
            // line 16
            echo twig_call_macro($macros["__internal_c6baebb994f1307649667aa057194fa2a7a4672a1a230867b5efa5a140b017bc"], "macro_dashboardSymbol", [["name" => "chevron-left"]], 16, $context, $this->getSourceContext());
            echo "
            </a>
        ";
        }
        // line 19
        echo "        <h1>";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "title", [], "any", false, false, false, 19), "html", null, true);
        echo "</h1>
    </div>
    ";
        // line 21
        if (((twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "buttons", [], "any", true, true, false, 21)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "buttons", [], "any", false, false, false, 21), false)) : (false))) {
            // line 22
            echo "        <div class=\"btn-container\">
            ";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "buttons", [], "any", false, false, false, 23), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 26
        echo "</header>
";
    }

    public function getTemplateName()
    {
        return "@dashboard/components/dashboardHeading.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 26,  67 => 23,  64 => 22,  62 => 21,  56 => 19,  50 => 16,  45 => 15,  43 => 14,  39 => 12,  37 => 11,);
    }

    public function getSourceContext()
    {
        return new Source("", "@dashboard/components/dashboardHeading.twig", "/home/jdmf9z4zrge5/public_html/forum.codetigers.org/applications/dashboard/views/components/dashboardHeading.twig");
    }
}
