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

/* /plugins/googlesignin/views/settings.twig */
class __TwigTemplate_96468573eef011c23af14ceaf1161c11a212bd16f59a42473664878a9f66b4d5 extends \Twig\Template
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
        echo "<h1>";
        echo twig_escape_filter($this->env, ($context["Title"] ?? null), "html", null, true);
        echo " </h1>
<div class=\"padded alert alert-warning\">
    ";
        // line 3
        echo ($context["Instructions"] ?? null);
        echo "
</div>
 ";
        // line 5
        echo twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "open", [], "method", false, false, false, 5);
        echo "
 ";
        // line 6
        echo twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "errors", [], "method", false, false, false, 6);
        echo "
 ";
        // line 7
        echo twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "simple", [0 => ($context["formData"] ?? null)], "method", false, false, false, 7);
        echo "
<div class=\"modal-footer js-modal-fixed\">
";
        // line 9
        echo twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "button", [0 => "Save"], "method", false, false, false, 9);
        echo "
</div>
 ";
        // line 11
        echo twig_get_attribute($this->env, $this->source, ($context["form"] ?? null), "close", [], "method", false, false, false, 11);
        echo "
";
    }

    public function getTemplateName()
    {
        return "/plugins/googlesignin/views/settings.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 11,  61 => 9,  56 => 7,  52 => 6,  48 => 5,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/plugins/googlesignin/views/settings.twig", "/home/jdmf9z4zrge5/public_html/forum.codetigers.org/plugins/googlesignin/views/settings.twig");
    }
}
