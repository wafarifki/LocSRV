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

/* server/engines/index.twig */
class __TwigTemplate_8084f8b04f4d3798c53201d489f9e571 extends Template
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
        echo "<div class=\"container-fluid\">
  <div class=\"row\">
  <h2>
    ";
        // line 4
        echo PhpMyAdmin\Html\Generator::getImage("b_engine");
        echo "
    ";
echo _gettext("Storage engines");
        // line 6
        echo "  </h2>
  </div>

  <div class=\"table-responsive\">
    <table class=\"table table-light table-striped table-hover w-auto\">
      <thead class=\"table-light\">
        <tr>
          <th scope=\"col\">";
echo _gettext("Storage Engine");
        // line 13
        echo "</th>
          <th scope=\"col\">";
echo _gettext("Description");
        // line 14
        echo "</th>
        </tr>
      </thead>
      <tbody>
        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["engines"] ?? null));
        foreach ($context['_seq'] as $context["engine"] => $context["details"]) {
            // line 19
            echo "          <tr class=\"";
            // line 20
            echo (((((($__internal_compile_0 = $context["details"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["Support"] ?? null) : null) == "NO") || ((($__internal_compile_1 = $context["details"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["Support"] ?? null) : null) == "DISABLED"))) ? (" disabled") : (""));
            echo "
            ";
            // line 21
            echo ((((($__internal_compile_2 = $context["details"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["Support"] ?? null) : null) == "DEFAULT")) ? (" marked") : (""));
            echo "\">
            <td>
              <a rel=\"newpage\" href=\"";
            // line 23
            echo PhpMyAdmin\Url::getFromRoute(("/server/engines/" . $context["engine"]));
            echo "\">
                ";
            // line 24
            echo twig_escape_filter($this->env, (($__internal_compile_3 = $context["details"]) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["Engine"] ?? null) : null), "html", null, true);
            echo "
              </a>
            </td>
            <td>";
            // line 27
            echo twig_escape_filter($this->env, (($__internal_compile_4 = $context["details"]) && is_array($__internal_compile_4) || $__internal_compile_4 instanceof ArrayAccess ? ($__internal_compile_4["Comment"] ?? null) : null), "html", null, true);
            echo "</td>
          </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['engine'], $context['details'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "      </tbody>
    </table>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "server/engines/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 30,  92 => 27,  86 => 24,  82 => 23,  77 => 21,  73 => 20,  71 => 19,  67 => 18,  61 => 14,  57 => 13,  47 => 6,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "server/engines/index.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\server\\engines\\index.twig");
    }
}
