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

/* resources/views/userContentError.twig */
class __TwigTemplate_fbf48f530a111f2c00cc2210d0513f8efff2763679eec48402b67c085f4014d4 extends \Twig\Template
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
        echo "<div class='DismissMessage Warning userContent-error'>
    <a href='";
        // line 2
        echo twig_escape_filter($this->env, ($context["errorUrl"] ?? null), "html", null, true);
        echo "' rel='nofollow' title='";
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "'>
        <span class='icon icon-warning-sign userContent-errorIcon'><span class=\"sr-only\">Warning</span></span>
        ";
        // line 4
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "
    </a>
</div>
";
    }

    public function getTemplateName()
    {
        return "resources/views/userContentError.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 4,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "resources/views/userContentError.twig", "/home/jdmf9z4zrge5/public_html/forum.codetigers.org/resources/views/userContentError.twig");
    }
}
