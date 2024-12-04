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

/* preferences/forms/main.twig */
class __TwigTemplate_aecd90d416b9ac4d2d82c2f873585678 extends Template
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
        echo ($context["error"] ?? null);
        echo "
";
        // line 2
        if (($context["has_errors"] ?? null)) {
            // line 3
            echo "  <div class=\"alert alert-danger config-form\" role=\"alert\">
    <strong>";
echo _gettext("Cannot save settings, submitted form contains errors!");
            // line 4
            echo "</strong>
    ";
            // line 5
            echo ($context["errors"] ?? null);
            echo "
  </div>
";
        }
        // line 8
        echo ($context["form"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "preferences/forms/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 8,  50 => 5,  47 => 4,  43 => 3,  41 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "preferences/forms/main.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\preferences\\forms\\main.twig");
    }
}
