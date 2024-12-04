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

/* header.twig */
class __TwigTemplate_e935917f9aa2e7c58a024a539ab3034a extends Template
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
        echo "<!doctype html>
<html lang=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["lang"] ?? null), "html", null, true);
        echo "\" dir=\"";
        echo twig_escape_filter($this->env, ($context["text_dir"] ?? null), "html", null, true);
        echo "\">
<head>
  <meta charset=\"utf-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <meta name=\"referrer\" content=\"no-referrer\">
  <meta name=\"robots\" content=\"noindex,nofollow\">
  ";
        // line 8
        if ( !($context["allow_third_party_framing"] ?? null)) {
            // line 9
            echo "<style id=\"cfs-style\">html{display: none;}</style>";
        }
        // line 11
        echo "
  <link rel=\"icon\" href=\"favicon.ico\" type=\"image/x-icon\">
  <link rel=\"shortcut icon\" href=\"favicon.ico\" type=\"image/x-icon\">
  <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/jquery/jquery-ui.css\">
  <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["base_dir"] ?? null), "html", null, true);
        echo "js/vendor/codemirror/lib/codemirror.css?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, ($context["base_dir"] ?? null), "html", null, true);
        echo "js/vendor/codemirror/addon/hint/show-hint.css?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["base_dir"] ?? null), "html", null, true);
        echo "js/vendor/codemirror/addon/lint/lint.css?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/css/theme";
        echo (((($context["text_dir"] ?? null) == "rtl")) ? (".rtl") : (""));
        echo ".css?";
        echo twig_escape_filter($this->env, ($context["version"] ?? null), "html", null, true);
        echo "\">
  <title>";
        // line 19
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
  ";
        // line 20
        echo ($context["scripts"] ?? null);
        echo "
  <noscript><style>html{display:block}</style></noscript>
</head>
<body";
        // line 23
        (( !twig_test_empty(($context["body_id"] ?? null))) ? (print (twig_escape_filter($this->env, (" id=" . ($context["body_id"] ?? null)), "html", null, true))) : (print ("")));
        echo ">
  ";
        // line 24
        echo ($context["navigation"] ?? null);
        echo "
  ";
        // line 25
        echo ($context["custom_header"] ?? null);
        echo "
  ";
        // line 26
        echo ($context["load_user_preferences"] ?? null);
        echo "

  ";
        // line 28
        if ( !($context["show_hint"] ?? null)) {
            // line 29
            echo "    <span id=\"no_hint\" class=\"hide\"></span>
  ";
        }
        // line 31
        echo "
  ";
        // line 32
        if (($context["is_warnings_enabled"] ?? null)) {
            // line 33
            echo "    <noscript>
      ";
            // line 34
            echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("Javascript must be enabled past this point!")]);
            echo "
    </noscript>
  ";
        }
        // line 37
        echo "
  ";
        // line 38
        if ((($context["is_menu_enabled"] ?? null) && (($context["server"] ?? null) > 0))) {
            // line 39
            echo "    ";
            echo ($context["menu"] ?? null);
            echo "
    <span id=\"page_nav_icons\" class=\"d-print-none\">
      <span id=\"lock_page_icon\"></span>
      <span id=\"page_settings_icon\">
        ";
            // line 43
            echo PhpMyAdmin\Html\Generator::getImage("s_cog", _gettext("Page-related settings"));
            echo "
      </span>
      <a id=\"goto_pagetop\" href=\"#\">";
            // line 45
            echo PhpMyAdmin\Html\Generator::getImage("s_top", _gettext("Click on the bar to scroll to top of page"));
            echo "</a>
    </span>
  ";
        }
        // line 48
        echo "
  ";
        // line 49
        echo ($context["console"] ?? null);
        echo "

  <div id=\"page_content\">
    ";
        // line 52
        echo ($context["messages"] ?? null);
        echo "

    ";
        // line 54
        echo ($context["recent_table"] ?? null);
        echo "
    ";
        // line 55
        echo twig_include($this->env, $context, "modals/preview_sql_modal.twig");
        echo "
    ";
        // line 56
        echo twig_include($this->env, $context, "modals/enum_set_editor.twig");
        echo "
    ";
        // line 57
        echo twig_include($this->env, $context, "modals/create_view.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  188 => 57,  184 => 56,  180 => 55,  176 => 54,  171 => 52,  165 => 49,  162 => 48,  156 => 45,  151 => 43,  143 => 39,  141 => 38,  138 => 37,  132 => 34,  129 => 33,  127 => 32,  124 => 31,  120 => 29,  118 => 28,  113 => 26,  109 => 25,  105 => 24,  101 => 23,  95 => 20,  91 => 19,  83 => 18,  77 => 17,  71 => 16,  65 => 15,  61 => 14,  56 => 11,  53 => 9,  51 => 8,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "header.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\header.twig");
    }
}
