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

/* /library/Vanilla/EmbeddedContent/Embeds/FileEmbed.twig */
class __TwigTemplate_f52cc355ec0c4ccfa0c64780b3ab23bf16c0e92be393925d637c1985d6a0c0da extends \Twig\Template
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
        echo "<div data-embedjson=\"";
        echo twig_escape_filter($this->env, json_encode(($context["data"] ?? null)), "html", null, true);
        echo "\">
    <a
        href=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "\"
        download
        aria-label=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "\"
    >
        ";
        // line 7
        echo twig_escape_filter($this->env, ((($context["name"] ?? null)) ? (($context["name"] ?? null)) : (($context["url"] ?? null))), "html", null, true);
        echo "
    </a>
</div>";
    }

    public function getTemplateName()
    {
        return "/library/Vanilla/EmbeddedContent/Embeds/FileEmbed.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 7,  48 => 5,  43 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/library/Vanilla/EmbeddedContent/Embeds/FileEmbed.twig", "/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/Vanilla/EmbeddedContent/Embeds/FileEmbed.twig");
    }
}
