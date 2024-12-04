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

/* preferences/header.twig */
class __TwigTemplate_5e13e66308906bcbb6537458a9e6833a extends Template
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
    <ul id=\"user_prefs_tabs\" class=\"nav nav-pills m-2\">
      <li class=\"nav-item\">
        <a href=\"";
        // line 5
        echo PhpMyAdmin\Url::getFromRoute("/preferences/manage");
        echo "\" class=\"nav-link";
        echo (((($context["route"] ?? null) == "/preferences/manage")) ? (" active") : (""));
        echo "\">
          ";
echo _gettext("Manage your settings");
        // line 7
        echo "        </a>
      </li>

      <li class=\"nav-item\">
        <a href=\"";
        // line 11
        echo PhpMyAdmin\Url::getFromRoute("/preferences/two-factor");
        echo "\" class=\"nav-link";
        echo (((($context["route"] ?? null) == "/preferences/two-factor")) ? (" active") : (""));
        echo "\">
          ";
echo _gettext("Two-factor authentication");
        // line 13
        echo "        </a>
      </li>

      <li class=\"nav-item\">
        <a href=\"";
        // line 17
        echo PhpMyAdmin\Url::getFromRoute("/preferences/features");
        echo "\" class=\"nav-link";
        echo (((($context["route"] ?? null) == "/preferences/features")) ? (" active") : (""));
        echo "\">
          ";
        // line 18
        echo PhpMyAdmin\Html\Generator::getIcon("b_tblops", _gettext("Features"), false, false, "TabsMode");
        echo "
        </a>
      </li>

      <li class=\"nav-item\">
        <a href=\"";
        // line 23
        echo PhpMyAdmin\Url::getFromRoute("/preferences/sql");
        echo "\" class=\"nav-link";
        echo (((($context["route"] ?? null) == "/preferences/sql")) ? (" active") : (""));
        echo "\">
          ";
        // line 24
        echo PhpMyAdmin\Html\Generator::getIcon("b_sql", _gettext("SQL queries"), false, false, "TabsMode");
        echo "
        </a>
      </li>

      <li class=\"nav-item\">
        <a href=\"";
        // line 29
        echo PhpMyAdmin\Url::getFromRoute("/preferences/navigation");
        echo "\" class=\"nav-link";
        echo (((($context["route"] ?? null) == "/preferences/navigation")) ? (" active") : (""));
        echo "\">
          ";
        // line 30
        echo PhpMyAdmin\Html\Generator::getIcon("b_select", _gettext("Navigation panel"), false, false, "TabsMode");
        echo "
        </a>
      </li>

      <li class=\"nav-item\">
        <a href=\"";
        // line 35
        echo PhpMyAdmin\Url::getFromRoute("/preferences/main-panel");
        echo "\" class=\"nav-link";
        echo (((($context["route"] ?? null) == "/preferences/main-panel")) ? (" active") : (""));
        echo "\">
          ";
        // line 36
        echo PhpMyAdmin\Html\Generator::getIcon("b_props", _gettext("Main panel"), false, false, "TabsMode");
        echo "
        </a>
      </li>

      <li class=\"nav-item\">
        <a href=\"";
        // line 41
        echo PhpMyAdmin\Url::getFromRoute("/preferences/export");
        echo "\" class=\"nav-link";
        echo (((($context["route"] ?? null) == "/preferences/export")) ? (" active") : (""));
        echo "\">
          ";
        // line 42
        echo PhpMyAdmin\Html\Generator::getIcon("b_export", _gettext("Export"), false, false, "TabsMode");
        echo "
        </a>
      </li>

      <li class=\"nav-item\">
        <a href=\"";
        // line 47
        echo PhpMyAdmin\Url::getFromRoute("/preferences/import");
        echo "\" class=\"nav-link";
        echo (((($context["route"] ?? null) == "/preferences/import")) ? (" active") : (""));
        echo "\">
          ";
        // line 48
        echo PhpMyAdmin\Html\Generator::getIcon("b_import", _gettext("Import"), false, false, "TabsMode");
        echo "
        </a>
      </li>
    </ul>
  </div>

  ";
        // line 54
        if (($context["is_saved"] ?? null)) {
            // line 55
            echo "    ";
            echo call_user_func_array($this->env->getFilter('raw_success')->getCallable(), [_gettext("Configuration has been saved.")]);
            echo "
  ";
        }
        // line 57
        echo "
  ";
        // line 58
        if ( !($context["has_config_storage"] ?? null)) {
            // line 59
            echo "    ";
            ob_start(function () { return ''; });
            // line 60
            echo "      ";
echo _gettext("Your preferences will be saved for current session only. Storing them permanently requires %sphpMyAdmin configuration storage%s.");
            // line 61
            echo "    ";
            $___internal_parse_0_ = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 59
            echo call_user_func_array($this->env->getFilter('notice')->getCallable(), [twig_sprintf($___internal_parse_0_, (("<a href=\"" . PhpMyAdmin\Html\MySQLDocumentation::getDocumentationLink("setup", "linked-tables")) . "\" target=\"_blank\" rel=\"noopener noreferrer\">"), "</a>")]);
            // line 62
            echo "  ";
        }
    }

    public function getTemplateName()
    {
        return "preferences/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 62,  176 => 59,  173 => 61,  170 => 60,  167 => 59,  165 => 58,  162 => 57,  156 => 55,  154 => 54,  145 => 48,  139 => 47,  131 => 42,  125 => 41,  117 => 36,  111 => 35,  103 => 30,  97 => 29,  89 => 24,  83 => 23,  75 => 18,  69 => 17,  63 => 13,  56 => 11,  50 => 7,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "preferences/header.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\preferences\\header.twig");
    }
}
