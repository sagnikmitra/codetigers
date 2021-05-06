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

/* /library/Vanilla/Web/Asset/AssetPreloadModel.twig */
class __TwigTemplate_c98b7ac4508ebaaf99071d70a589d1b7fd3d87523d2969a0da3ea6ed9165a9ce extends \Twig\Template
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
        echo "<!-- Preload links, scripts, and stylesheets -->

";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "getFullScripts", [], "method", false, false, false, 3));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 4
            echo "<script defer src=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["script"], "getWebPath", [], "method", false, false, false, 4), "html", null, true);
            echo "\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "getFullStylesheets", [], "method", false, false, false, 7));
        foreach ($context['_seq'] as $context["_key"] => $context["stylesheet"]) {
            // line 8
            echo "<link href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["stylesheet"], "getWebPath", [], "method", false, false, false, 8), "html", null, true);
            echo "\" rel=\"stylesheet\" type=\"text/css\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stylesheet'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["model"] ?? null), "getPreloads", [], "method", false, false, false, 11));
        foreach ($context['_seq'] as $context["_key"] => $context["preload"]) {
            // line 12
            echo "<link href=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["preload"], "getAsset", [], "method", false, false, false, 12), "getWebPath", [], "method", false, false, false, 12), "html", null, true);
            echo "\" as=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["preload"], "getAs", [], "method", false, false, false, 12), "html", null, true);
            echo "\" rel=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["preload"], "getRel", [], "method", false, false, false, 12), "html", null, true);
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['preload'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "/library/Vanilla/Web/Asset/AssetPreloadModel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 12,  67 => 11,  58 => 8,  54 => 7,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "/library/Vanilla/Web/Asset/AssetPreloadModel.twig", "/home/jdmf9z4zrge5/public_html/forum.codetigers.org/library/Vanilla/Web/Asset/AssetPreloadModel.twig");
    }
}
