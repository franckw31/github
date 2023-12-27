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

/* table/browse_foreigners/show_all.twig */
class __TwigTemplate_deade43ed51bac4b4a10f4589c9bd8abadd10b859e19c0086b0e55a2c3e4fa4d extends Template
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
        if ((twig_test_iterable(twig_get_attribute($this->env, $this->source, ($context["foreign_data"] ?? null), "disp_row", [], "any", false, false, false, 1)) && (        // line 2
($context["show_all"] ?? null) && (twig_get_attribute($this->env, $this->source, ($context["foreign_data"] ?? null), "the_total", [], "any", false, false, false, 2) > ($context["max_rows"] ?? null))))) {
            // line 3
            echo "    <input class=\"btn btn-secondary\" type=\"submit\" id=\"foreign_showAll\" name=\"foreign_showAll\" value=\"";
echo _gettext("Show all");
            // line 4
            echo "\">
";
        }
    }

    public function getTemplateName()
    {
        return "table/browse_foreigners/show_all.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 4,  40 => 3,  38 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "table/browse_foreigners/show_all.twig", "/homepages/5/d946473409/htdocs/php/templates/table/browse_foreigners/show_all.twig");
    }
}
