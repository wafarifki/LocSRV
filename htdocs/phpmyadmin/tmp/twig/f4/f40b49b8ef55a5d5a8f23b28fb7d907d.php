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

/* server/collations/index.twig */
class __TwigTemplate_65021dac8adcf945e5ecccc694b6408b extends Template
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
        echo "<div class=container-fluid>
  <h2>
    ";
        // line 3
        echo PhpMyAdmin\Html\Generator::getImage("s_asci");
        echo "
    ";
echo _gettext("Character sets and collations");
        // line 5
        echo "  </h2>

  ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
            // line 8
            echo "    <div class=\"card mb-3\">
      <div class=\"card-header\">
        <div><strong>";
            // line 10
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "name", [], "any", false, false, false, 10), "html", null, true);
            echo "</strong></div>
        <div>";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "description", [], "any", false, false, false, 11), "html", null, true);
            echo "</div>
      </div>
      <ul class=\"list-group list-group-flush\">
        ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["charset"], "collations", [], "any", false, false, false, 14));
            foreach ($context['_seq'] as $context["_key"] => $context["collation"]) {
                // line 15
                echo "          <li class=\"list-group-item\">
            <div class=\"row\">
              <div class=\"col\">
                <div><strong>";
                // line 18
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "name", [], "any", false, false, false, 18), "html", null, true);
                echo "</strong></div>
                <div>";
                // line 19
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["collation"], "description", [], "any", false, false, false, 19), "html", null, true);
                echo "</div>
              </div>
              <div class=\"col align-self-center text-end\">
                ";
                // line 22
                if (twig_get_attribute($this->env, $this->source, $context["collation"], "is_default", [], "any", false, false, false, 22)) {
                    // line 23
                    echo "                  <span class=\"badge bg-secondary text-dark\">";
echo _pgettext("The collation is the default one", "default");
                    echo "</span>
                ";
                }
                // line 25
                echo "              </div>
            </div>
          </li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['collation'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "      </ul>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "server/collations/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 32,  104 => 29,  95 => 25,  89 => 23,  87 => 22,  81 => 19,  77 => 18,  72 => 15,  68 => 14,  62 => 11,  58 => 10,  54 => 8,  50 => 7,  46 => 5,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/collations/index.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\server\\collations\\index.twig");
    }
}
