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

/* @dashboard/components/dashboardSymbol.twig */
class __TwigTemplate_0e56e014ff5fe156fe0377d8c2b1be4d1b91a3a5d4da759a242fa2502268352f extends \Twig\Template
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
        // line 12
        echo "
<svg
    class=\"";
        // line 14
        echo twig_escape_filter($this->env, Vanilla\Utility\HtmlUtils::classNames("icon", "icon-svg", ((twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "class", [], "any", true, true, false, 14)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "class", [], "any", false, false, false, 14))) : (""))), "html", null, true);
        echo "\"
    alt=\"";
        // line 15
        echo twig_escape_filter($this->env, (((twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "alt", [], "any", true, true, false, 15) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "alt", [], "any", false, false, false, 15)))) ? (twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "alt", [], "any", false, false, false, 15)) : (twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "name", [], "any", false, false, false, 15))), "html", null, true);
        echo "\"
    ";
        // line 16
        echo twig_escape_filter($this->env, ((twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "dangerousAttributeString", [], "any", true, true, false, 16)) ? (_twig_default_filter(twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "dangerousAttributeString", [], "any", false, false, false, 16))) : ("")), "html", null, true);
        echo "
    viewBox=\"0 0 17 17\"
>
    <use xlink:href=\"#";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["params"] ?? null), "name", [], "any", false, false, false, 19), "html", null, true);
        echo "\" ></use>
</svg>
";
    }

    public function getTemplateName()
    {
        return "@dashboard/components/dashboardSymbol.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 19,  49 => 16,  45 => 15,  41 => 14,  37 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("", "@dashboard/components/dashboardSymbol.twig", "/home/jdmf9z4zrge5/public_html/forum.codetigers.org/applications/dashboard/views/components/dashboardSymbol.twig");
    }
}
