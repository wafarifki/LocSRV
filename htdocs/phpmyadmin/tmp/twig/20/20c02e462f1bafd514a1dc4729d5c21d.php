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

/* database/export/index.twig */
class __TwigTemplate_980ef9c8d3b798a3007f91e8dfcf0815 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'selection_options' => [$this, 'block_selection_options'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "export.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 60
        ob_start(function () { return ''; });
        // line 61
        echo "  ";
echo _gettext("@SERVER@ will become the server name and @DATABASE@ will become the database name.");
        $context["filename_hint"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent = $this->loadTemplate("export.twig", "database/export/index.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "  ";
        if ((($context["export_type"] ?? null) == "raw")) {
            // line 5
            echo "    ";
// l10n: A query that the user has written freely
echo _gettext("Exporting a raw query");
            // line 6
            echo "  ";
        } else {
            // line 7
            echo "    ";
            echo twig_escape_filter($this->env, twig_sprintf(_gettext("Exporting tables from \"%s\" database"), ($context["db"] ?? null)), "html", null, true);
            echo "
  ";
        }
    }

    // line 11
    public function block_selection_options($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 12
        echo "  ";
        if ((($context["export_type"] ?? null) != "raw")) {
            // line 13
            echo "    <div class=\"card mb-3\" id=\"databases_and_tables\">
      <div class=\"card-header\">";
echo _gettext("Tables:");
            // line 14
            echo "</div>
      <div class=\"card-body\" style=\"overflow-y: scroll; max-height: 20em;\">
        <input type=\"hidden\" name=\"structure_or_data_forced\" value=\"";
            // line 16
            echo twig_escape_filter($this->env, ($context["structure_or_data_forced"] ?? null), "html", null, true);
            echo "\">

        <table class=\"table table-sm table-striped table-hover export_table_select\">
          <thead>
            <tr>
              <th></th>
              <th>";
echo _gettext("Tables");
            // line 22
            echo "</th>
              <th class=\"export_structure text-center\">";
echo _gettext("Structure");
            // line 23
            echo "</th>
              <th class=\"export_data text-center\">";
echo _gettext("Data");
            // line 24
            echo "</th>
            </tr>
            <tr>
              <td></td>
              <td class=\"align-middle\">";
echo _gettext("Select all");
            // line 28
            echo "</td>
              <td class=\"export_structure text-center\">
                <input type=\"checkbox\" id=\"table_structure_all\" aria-label=\"";
echo _gettext("Export the structure of all tables.");
            // line 30
            echo "\">
              </td>
              <td class=\"export_data text-center\">
                <input type=\"checkbox\" id=\"table_data_all\" aria-label=\"";
echo _gettext("Export the data of all tables.");
            // line 33
            echo "\">
              </td>
            </tr>
          </thead>

          <tbody>
            ";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["tables"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["each_table"]) {
                // line 40
                echo "              <tr class=\"marked\">
                <td>
                  <input class=\"checkall\" type=\"checkbox\" name=\"table_select[]\" value=\"";
                // line 42
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["each_table"], "name", [], "any", false, false, false, 42), "html", null, true);
                echo "\"";
                echo ((twig_get_attribute($this->env, $this->source, $context["each_table"], "is_checked_select", [], "any", false, false, false, 42)) ? (" checked") : (""));
                echo ">
                </td>
                <td class=\"align-middle text-nowrap\">";
                // line 44
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["each_table"], "name", [], "any", false, false, false, 44), "html", null, true);
                echo "</td>
                <td class=\"export_structure text-center\">
                  <input type=\"checkbox\" name=\"table_structure[]\" value=\"";
                // line 46
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["each_table"], "name", [], "any", false, false, false, 46), "html", null, true);
                echo "\"";
                echo ((twig_get_attribute($this->env, $this->source, $context["each_table"], "is_checked_structure", [], "any", false, false, false, 46)) ? (" checked") : (""));
                echo ">
                </td>
                <td class=\"export_data text-center\">
                  <input type=\"checkbox\" name=\"table_data[]\" value=\"";
                // line 49
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["each_table"], "name", [], "any", false, false, false, 49), "html", null, true);
                echo "\"";
                echo ((twig_get_attribute($this->env, $this->source, $context["each_table"], "is_checked_data", [], "any", false, false, false, 49)) ? (" checked") : (""));
                echo ">
                </td>
              </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['each_table'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "          </tbody>
        </table>
      </div>
    </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "database/export/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  175 => 53,  163 => 49,  155 => 46,  150 => 44,  143 => 42,  139 => 40,  135 => 39,  127 => 33,  121 => 30,  116 => 28,  109 => 24,  105 => 23,  101 => 22,  91 => 16,  87 => 14,  83 => 13,  80 => 12,  76 => 11,  68 => 7,  65 => 6,  61 => 5,  58 => 4,  54 => 3,  49 => 1,  45 => 61,  43 => 60,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "database/export/index.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\database\\export\\index.twig");
    }
}
