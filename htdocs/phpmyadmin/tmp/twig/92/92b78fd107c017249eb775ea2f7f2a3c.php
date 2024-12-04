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

/* preferences/two_factor/main.twig */
class __TwigTemplate_1a0fbaa7fc987f1456c7b97ee48eb206 extends Template
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
        echo "<div class=\"row\">
  <div class=\"col\">
    <div class=\"card mt-4\">
      <div class=\"card-header\">
        ";
echo _gettext("Two-factor authentication status");
        // line 6
        echo "        ";
        echo PhpMyAdmin\Html\MySQLDocumentation::showDocumentation("two_factor");
        echo "
      </div>
      <div class=\"card-body\">
    ";
        // line 9
        if (($context["enabled"] ?? null)) {
            // line 10
            echo "      ";
            if ((($context["num_backends"] ?? null) == 0)) {
                // line 11
                echo "        <p>";
echo _gettext("Two-factor authentication is not available, please install optional dependencies to enable authentication backends.");
                echo "</p>
        <p>";
echo _gettext("Following composer packages are missing:");
                // line 12
                echo "</p>
        <ul>
          ";
                // line 14
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["missing"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 15
                    echo "            <li><code>";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "dep", [], "any", false, false, false, 15), "html", null, true);
                    echo "</code> (";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["item"], "class", [], "any", false, false, false, 15), "html", null, true);
                    echo ")</li>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 17
                echo "        </ul>
      ";
            } else {
                // line 19
                echo "        ";
                if (($context["backend_id"] ?? null)) {
                    // line 20
                    echo "          <p>";
echo _gettext("Two-factor authentication is available and configured for this account.");
                    echo "</p>
        ";
                } else {
                    // line 22
                    echo "          <p>";
echo _gettext("Two-factor authentication is available, but not configured for this account.");
                    echo "</p>
        ";
                }
                // line 24
                echo "      ";
            }
            // line 25
            echo "    ";
        } else {
            // line 26
            echo "      <p>";
echo _gettext("Two-factor authentication is not available, enable phpMyAdmin configuration storage to use it.");
            echo "</p>
    ";
        }
        // line 28
        echo "      </div>
    </div>
  </div>
</div>

";
        // line 33
        if (($context["backend_id"] ?? null)) {
            // line 34
            echo "<div class=\"row\">
  <div class=\"col\">
    <div class=\"card mt-4\">
      <div class=\"card-header\">
        ";
            // line 38
            echo twig_escape_filter($this->env, ($context["backend_name"] ?? null), "html", null, true);
            echo "
      </div>
      <div class=\"card-body\">
      <p>";
echo _gettext("You have enabled two factor authentication.");
            // line 41
            echo "</p>
      <p>";
            // line 42
            echo twig_escape_filter($this->env, ($context["backend_description"] ?? null), "html", null, true);
            echo "</p>
      <form method=\"post\" action=\"";
            // line 43
            echo PhpMyAdmin\Url::getFromRoute("/preferences/two-factor");
            echo "\">
        ";
            // line 44
            echo PhpMyAdmin\Url::getHiddenInputs();
            echo "
        <input class=\"btn btn-secondary\" type=\"submit\" name=\"2fa_remove\" value=\"";
echo _gettext("Disable two-factor authentication");
            // line 46
            echo "\">
      </form>
      </div>
    </div>
  </div>
</div>
";
        } elseif ((        // line 52
($context["num_backends"] ?? null) > 0)) {
            // line 53
            echo "<div class=\"row\">
  <div class=\"col\">
    <div class=\"card mt-4\">
      <div class=\"card-header\">
        ";
echo _gettext("Configure two-factor authentication");
            // line 58
            echo "      </div>
      <div class=\"card-body\">
      <form method=\"post\" action=\"";
            // line 60
            echo PhpMyAdmin\Url::getFromRoute("/preferences/two-factor");
            echo "\">
        ";
            // line 61
            echo PhpMyAdmin\Url::getHiddenInputs();
            echo "
        ";
            // line 62
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["backends"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["backend"]) {
                // line 63
                echo "          <label class=\"d-block\">
            <input type=\"radio\" name=\"2fa_configure\" value=\"";
                // line 64
                echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["backend"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["id"] ?? null) : null), "html", null, true);
                echo "\"";
                // line 65
                echo ((((($__internal_compile_1 = $context["backend"]) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1["id"] ?? null) : null) == "")) ? (" checked") : (""));
                echo ">
            <strong>";
                // line 66
                echo twig_escape_filter($this->env, (($__internal_compile_2 = $context["backend"]) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2["name"] ?? null) : null), "html", null, true);
                echo "</strong>
            <p>";
                // line 67
                echo twig_escape_filter($this->env, (($__internal_compile_3 = $context["backend"]) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3["description"] ?? null) : null), "html", null, true);
                echo "</p>
          </label>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['backend'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 70
            echo "        <input class=\"btn btn-secondary\" type=\"submit\" value=\"";
echo _gettext("Configure two-factor authentication");
            echo "\">
      </form>
      </div>
    </div>
  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "preferences/two_factor/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 70,  197 => 67,  193 => 66,  189 => 65,  186 => 64,  183 => 63,  179 => 62,  175 => 61,  171 => 60,  167 => 58,  160 => 53,  158 => 52,  150 => 46,  145 => 44,  141 => 43,  137 => 42,  134 => 41,  127 => 38,  121 => 34,  119 => 33,  112 => 28,  106 => 26,  103 => 25,  100 => 24,  94 => 22,  88 => 20,  85 => 19,  81 => 17,  70 => 15,  66 => 14,  62 => 12,  56 => 11,  53 => 10,  51 => 9,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "preferences/two_factor/main.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\preferences\\two_factor\\main.twig");
    }
}
