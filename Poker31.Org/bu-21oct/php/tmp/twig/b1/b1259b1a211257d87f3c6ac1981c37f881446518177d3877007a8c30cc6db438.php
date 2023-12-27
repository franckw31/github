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

/* setup/config/index.twig */
class __TwigTemplate_6e4ede9535c1f57d75ae525a272e6ea70aab46328c6cab6921e94f5b3d27f03d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "setup/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("setup/base.twig", "setup/config/index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "
<h2>";
echo _gettext("Configuration file");
        // line 4
        echo "</h2>

<div class=\"card\">
  <h5 class=\"card-header\">config.inc.php</h5>
  <div class=\"card-body\">
    <form id=\"configFileForm\" method=\"post\" action=\"config.php\">
      ";
        // line 10
        if (($context["has_check_page_refresh"] ?? null)) {
            // line 11
            echo "        <input type=\"hidden\" name=\"check_page_refresh\" id=\"check_page_refresh\" value=\"\">
      ";
        }
        // line 13
        echo "      ";
        echo PhpMyAdmin\Url::getHiddenInputs("", "", 0, "server");
        echo "
      <input type=\"hidden\" name=\"eol\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["eol"] ?? null), "html", null, true);
        echo "\">

      <textarea class=\"form-control font-monospace\" rows=\"20\" name=\"textconfig\" spellcheck=\"false\" aria-label=\"";
echo _gettext("Generated configuration file");
        // line 16
        echo "\">";
        // line 17
        echo twig_escape_filter($this->env, ($context["config"] ?? null), "html", null, true);
        // line 18
        echo "</textarea>
    </form>
  </div>
  <div class=\"card-footer\">
    <input class=\"btn btn-primary\" type=\"submit\" form=\"configFileForm\" name=\"submit_download\" value=\"";
echo _gettext("Download");
        // line 22
        echo "\">
  </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "setup/config/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 22,  83 => 18,  81 => 17,  79 => 16,  73 => 14,  68 => 13,  64 => 11,  62 => 10,  54 => 4,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "setup/config/index.twig", "/homepages/5/d946473409/htdocs/php/templates/setup/config/index.twig");
    }
}
