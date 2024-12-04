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

/* import.twig */
class __TwigTemplate_8d339ca14ebe8f9f770000017fc9fb6b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"container\">
  <h2 class=\"my-3\">
    ";
        // line 3
        echo PhpMyAdmin\Html\Generator::getImage("b_import", _gettext("Import"));
        echo "
    ";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        // line 5
        echo "  </h2>

  ";
        // line 7
        echo ($context["page_settings_error_html"] ?? null);
        echo "
  ";
        // line 8
        echo ($context["page_settings_html"] ?? null);
        echo "

  <iframe id=\"import_upload_iframe\" name=\"import_upload_iframe\" width=\"1\" height=\"1\" class=\"hide\"></iframe>
  <div id=\"import_form_status\" class=\"hide\"></div>
  <div id=\"importmain\">
    <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['PhpMyAdmin\Twig\AssetExtension']->getImagePath("ajax_clock_small.gif"), "html", null, true);
        echo "\" width=\"16\" height=\"16\" alt=\"ajax clock\" class=\"hide\">

    <script type=\"text/javascript\">
//<![CDATA[
";
        // line 17
        $this->loadTemplate("import/javascript.twig", "import.twig", 17)->display(twig_to_array(["upload_id" => ($context["upload_id"] ?? null), "handler" => ($context["handler"] ?? null)]));
        // line 18
        echo "//]]>
    </script>

    <form id=\"import_file_form\" action=\"";
        // line 21
        echo PhpMyAdmin\Url::getFromRoute("/import");
        echo "\" method=\"post\" enctype=\"multipart/form-data\" name=\"import\" class=\"ajax\"";
        // line 22
        if ((($context["handler"] ?? null) != "PhpMyAdmin\\Plugins\\Import\\Upload\\UploadNoplugin")) {
            echo " target=\"import_upload_iframe\"";
        }
        echo ">
      ";
        // line 23
        echo PhpMyAdmin\Url::getHiddenInputs(($context["hidden_inputs"] ?? null));
        echo "

      <div class=\"card mb-3\">
        <div class=\"card-header\">";
echo _gettext("File to import:");
        // line 26
        echo "</div>
        <div class=\"card-body\">
          ";
        // line 29
        echo "          ";
        if ( !twig_test_empty(($context["compressions"] ?? null))) {
            // line 30
            echo "            <p class=\"card-text\">
              ";
            // line 31
            echo twig_escape_filter($this->env, twig_sprintf(_gettext("File may be compressed (%s) or uncompressed."), twig_join_filter(($context["compressions"] ?? null), ", ")), "html", null, true);
            echo "<br>
              ";
echo _gettext("A compressed file's name must end in <strong>.[format].[compression]</strong>. Example: <strong>.sql.zip</strong>");
            // line 33
            echo "            </p>
          ";
        }
        // line 35
        echo "
          ";
        // line 36
        if ((($context["is_upload"] ?? null) &&  !twig_test_empty(($context["upload_dir"] ?? null)))) {
            // line 37
            echo "            ";
            $context["use_local_file_import"] = ( !twig_test_empty(($context["timeout_passed_global"] ?? null)) &&  !twig_test_empty(($context["local_import_file"] ?? null)));
            // line 38
            echo "            <ul class=\"nav nav-pills mb-3\" id=\"importFileTab\" role=\"tablist\">
              <li class=\"nav-item\" role=\"presentation\">
                <button class=\"nav-link";
            // line 40
            echo (( !($context["use_local_file_import"] ?? null)) ? (" active") : (""));
            echo "\" id=\"uploadFileTab\" data-bs-toggle=\"tab\" data-bs-target=\"#uploadFile\" type=\"button\" role=\"tab\" aria-controls=\"uploadFile\" aria-selected=\"";
            echo (( !($context["use_local_file_import"] ?? null)) ? ("true") : ("false"));
            echo "\">";
echo _gettext("Upload a file");
            echo "</button>
              </li>
              <li class=\"nav-item\" role=\"presentation\">
                <button class=\"nav-link";
            // line 43
            echo ((($context["use_local_file_import"] ?? null)) ? (" active") : (""));
            echo "\" id=\"localFileTab\" data-bs-toggle=\"tab\" data-bs-target=\"#localFile\" type=\"button\" role=\"tab\" aria-controls=\"localFile\" aria-selected=\"";
            echo ((($context["use_local_file_import"] ?? null)) ? ("true") : ("false"));
            echo "\">";
echo _gettext("Select file to import");
            echo "</button>
              </li>
            </ul>
            <div class=\"tab-content mb-3\" id=\"importFileTabContent\">
              <div class=\"tab-pane fade";
            // line 47
            echo (( !($context["use_local_file_import"] ?? null)) ? (" show active") : (""));
            echo "\" id=\"uploadFile\" role=\"tabpanel\" aria-labelledby=\"uploadFileTab\">
                <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"";
            // line 48
            echo twig_escape_filter($this->env, ($context["max_upload_size"] ?? null), "html", null, true);
            echo "\">
                <div class=\"mb-3\">
                  <label class=\"form-label\" for=\"input_import_file\">";
echo _gettext("Browse your computer:");
            // line 50
            echo " <small>";
            echo twig_escape_filter($this->env, ($context["formatted_maximum_upload_size"] ?? null), "html", null, true);
            echo "</small></label>
                  <input class=\"form-control\" type=\"file\" name=\"import_file\" id=\"input_import_file\">
                </div>
                <div id=\"upload_form_status\" class=\"hide\"></div>
                <div id=\"upload_form_status_info\" class=\"hide\"></div>
                <p class=\"card-text\">";
echo _gettext("You may also drag and drop a file on any page.");
            // line 55
            echo "</p>
              </div>

              <div class=\"tab-pane fade";
            // line 58
            echo ((($context["use_local_file_import"] ?? null)) ? (" show active") : (""));
            echo "\" id=\"localFile\" role=\"tabpanel\" aria-labelledby=\"localFileTab\">
                ";
            // line 59
            if ((($context["local_files"] ?? null) === false)) {
                // line 60
                echo "                  ";
                echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("The directory you set for upload work cannot be reached.")]);
                echo "
                ";
            } elseif ( !twig_test_empty(            // line 61
($context["local_files"] ?? null))) {
                // line 62
                echo "                  <label class=\"form-label\" for=\"select_local_import_file\">";
                echo PhpMyAdmin\Sanitize::sanitizeMessage(twig_sprintf(_gettext("Select from the web server upload directory [strong]%s[/strong]:"), ($context["user_upload_dir"] ?? null)));
                echo "</label>
                  <select class=\"form-select\" size=\"1\" name=\"local_import_file\" id=\"select_local_import_file\">
                    <option value=\"\"></option>
                    ";
                // line 65
                echo ($context["local_files"] ?? null);
                echo "
                  </select>
                ";
            } else {
                // line 68
                echo "                  <div class=\"alert alert-info\" role=\"alert\">
                    ";
echo _gettext("There are no files to import!");
                // line 70
                echo "                  </div>
                ";
            }
            // line 72
            echo "              </div>
            </div>
          ";
        } elseif (        // line 74
($context["is_upload"] ?? null)) {
            // line 75
            echo "            <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"";
            echo twig_escape_filter($this->env, ($context["max_upload_size"] ?? null), "html", null, true);
            echo "\">
            <div class=\"mb-3\">
              <label class=\"form-label\" for=\"input_import_file\">";
echo _gettext("Browse your computer:");
            // line 77
            echo " <small>";
            echo twig_escape_filter($this->env, ($context["formatted_maximum_upload_size"] ?? null), "html", null, true);
            echo "</small></label>
              <input class=\"form-control\" type=\"file\" name=\"import_file\" id=\"input_import_file\">
            </div>
            <div id=\"upload_form_status\" class=\"hide\"></div>
            <div id=\"upload_form_status_info\" class=\"hide\"></div>
            <p class=\"card-text\">";
echo _gettext("You may also drag and drop a file on any page.");
            // line 82
            echo "</p>
          ";
        } elseif ( !twig_test_empty(        // line 83
($context["upload_dir"] ?? null))) {
            // line 84
            echo "            ";
            if ((($context["local_files"] ?? null) === false)) {
                // line 85
                echo "              ";
                echo call_user_func_array($this->env->getFilter('error')->getCallable(), [_gettext("The directory you set for upload work cannot be reached.")]);
                echo "
            ";
            } elseif ( !twig_test_empty(            // line 86
($context["local_files"] ?? null))) {
                // line 87
                echo "              <div class=\"mb-3\">
                <label class=\"form-label\" for=\"select_local_import_file\">";
                // line 88
                echo PhpMyAdmin\Sanitize::sanitizeMessage(twig_sprintf(_gettext("Select from the web server upload directory [strong]%s[/strong]:"), ($context["user_upload_dir"] ?? null)));
                echo "</label>
                <select class=\"form-select\" size=\"1\" name=\"local_import_file\" id=\"select_local_import_file\">
                  <option value=\"\"></option>
                  ";
                // line 91
                echo ($context["local_files"] ?? null);
                echo "
                </select>
              </div>
            ";
            } else {
                // line 95
                echo "              <div class=\"alert alert-info\" role=\"alert\">
                ";
echo _gettext("There are no files to import!");
                // line 97
                echo "              </div>
            ";
            }
            // line 99
            echo "          ";
        } else {
            // line 100
            echo "            ";
            echo call_user_func_array($this->env->getFilter('notice')->getCallable(), [_gettext("File uploads are not allowed on this server.")]);
            echo "
          ";
        }
        // line 102
        echo "
          <label class=\"form-label\" for=\"charset_of_file\">";
echo _gettext("Character set of the file:");
        // line 103
        echo "</label>
          ";
        // line 104
        if (($context["is_encoding_supported"] ?? null)) {
            // line 105
            echo "            <select class=\"form-select\" id=\"charset_of_file\" name=\"charset_of_file\" size=\"1\">
              ";
            // line 106
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["encodings"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
                // line 107
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, $context["charset"], "html", null, true);
                echo "\"";
                if (((twig_test_empty(($context["import_charset"] ?? null)) && ($context["charset"] == "utf-8")) || ($context["charset"] == ($context["import_charset"] ?? null)))) {
                    echo " selected";
                }
                echo ">";
                // line 108
                echo twig_escape_filter($this->env, $context["charset"], "html", null, true);
                // line 109
                echo "</option>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 111
            echo "            </select>
          ";
        } else {
            // line 113
            echo "            <select class=\"form-select\" lang=\"en\" dir=\"ltr\" name=\"charset_of_file\" id=\"charset_of_file\">
              <option value=\"\"></option>
              ";
            // line 115
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["charsets"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
                // line 116
                echo "                <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "getName", [], "method", false, false, false, 116), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "getDescription", [], "method", false, false, false, 116), "html", null, true);
                echo "\"";
                echo (((twig_get_attribute($this->env, $this->source, $context["charset"], "getName", [], "method", false, false, false, 116) == "utf8")) ? (" selected") : (""));
                echo ">";
                // line 117
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["charset"], "getName", [], "method", false, false, false, 117), "html", null, true);
                // line 118
                echo "</option>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 120
            echo "            </select>
          ";
        }
        // line 122
        echo "        </div>
      </div>

      <div class=\"card mb-3\">
        <div class=\"card-header\">";
echo _gettext("Partial import:");
        // line 126
        echo "</div>
        <div class=\"card-body\">
          ";
        // line 128
        if ((array_key_exists("timeout_passed", $context) && ($context["timeout_passed"] ?? null))) {
            // line 129
            echo "            <input type=\"hidden\" name=\"skip\" value=\"";
            echo twig_escape_filter($this->env, ($context["offset"] ?? null), "html", null, true);
            echo "\">
            <div class=\"alert alert-info\" role=\"alert\">
              ";
            // line 131
            echo twig_escape_filter($this->env, twig_sprintf(_gettext("Previous import timed out, after resubmitting will continue from position %d."), ($context["offset"] ?? null)), "html", null, true);
            echo "
            </div>
          ";
        }
        // line 134
        echo "
          <div class=\"form-check form-switch mb-3\">
            <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" name=\"allow_interrupt\" value=\"yes\" id=\"checkbox_allow_interrupt\"";
        // line 136
        echo ($context["is_allow_interrupt_checked"] ?? null);
        echo " aria-describedby=\"allowInterruptHelp\">
            <label class=\"form-check-label\" for=\"checkbox_allow_interrupt\">
              ";
echo _gettext("Allow the interruption of an import in case the script detects it is close to the PHP timeout limit.");
        // line 139
        echo "            </label>
            <div id=\"allowInterruptHelp\" class=\"form-text\">";
echo _gettext("This might be a good way to import large files, however it can break transactions.");
        // line 140
        echo "</div>
          </div>

          ";
        // line 143
        if ( !(array_key_exists("timeout_passed", $context) && ($context["timeout_passed"] ?? null))) {
            // line 144
            echo "            <label class=\"form-label\" for=\"text_skip_queries\">";
echo _gettext("Skip this number of queries (for SQL) starting from the first one:");
            echo "</label>
            <input class=\"form-control\" type=\"number\" name=\"skip_queries\" value=\"";
            // line 145
            echo ($context["skip_queries_default"] ?? null);
            echo "\" id=\"text_skip_queries\" min=\"0\">
          ";
        } else {
            // line 147
            echo "            ";
            // line 148
            echo "            <input type=\"hidden\" name=\"skip_queries\" value=\"";
            echo ($context["skip_queries_default"] ?? null);
            echo "\" id=\"text_skip_queries\">
          ";
        }
        // line 150
        echo "        </div>
      </div>

      <div class=\"card mb-3\">
        <div class=\"card-header\">";
echo _gettext("Other options");
        // line 154
        echo "</div>
        <div class=\"card-body\">
          <input type=\"hidden\" name=\"fk_checks\" value=\"0\">
          <div class=\"form-check form-switch\">
            <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" name=\"fk_checks\" id=\"fk_checks\" value=\"1\"";
        // line 158
        echo ((($context["is_foreign_key_check"] ?? null)) ? (" checked") : (""));
        echo ">
            <label class=\"form-check-label\" for=\"fk_checks\">";
echo _gettext("Enable foreign key checks");
        // line 159
        echo "</label>
          </div>
        </div>
      </div>

      <div class=\"card mb-3\">
        <div class=\"card-header\">";
echo _gettext("Format");
        // line 165
        echo "</div>
        <div class=\"card-body\">
          <select class=\"form-select\" id=\"plugins\" name=\"format\" aria-label=\"";
echo _gettext("Format");
        // line 167
        echo "\">
            ";
        // line 168
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plugins_choice"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 169
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 169), "html", null, true);
            echo "\"";
            echo ((twig_get_attribute($this->env, $this->source, $context["option"], "is_selected", [], "any", false, false, false, 169)) ? (" selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "text", [], "any", false, false, false, 169), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 171
        echo "          </select>

          ";
        // line 173
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plugins_choice"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 174
            echo "            <input type=\"hidden\" id=\"force_file_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 174), "html", null, true);
            echo "\" value=\"true\">
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 176
        echo "
          <div id=\"import_notification\"></div>
        </div>
      </div>

      <div class=\"card mb-3\" id=\"format_specific_opts\">
        <div class=\"card-header\">";
echo _gettext("Format-specific options:");
        // line 182
        echo "</div>
        <div class=\"card-body\">
          ";
        // line 184
        echo ($context["options"] ?? null);
        echo "
        </div>
      </div>

      ";
        // line 189
        echo "      ";
        if (($context["can_convert_kanji"] ?? null)) {
            // line 190
            echo "        <div class=\"card mb-3\" id=\"kanji_encoding\">
          <div class=\"card-header\">";
echo _gettext("Encoding Conversion:");
            // line 191
            echo "</div>
          <div class=\"card-body\">
            ";
            // line 193
            $this->loadTemplate("encoding/kanji_encoding_form.twig", "import.twig", 193)->display($context);
            // line 194
            echo "          </div>
        </div>
      ";
        }
        // line 197
        echo "
      <div id=\"submit\">
        <input id=\"buttonGo\" class=\"btn btn-primary\" type=\"submit\" value=\"";
echo _gettext("Import");
        // line 199
        echo "\">
      </div>
    </form>
  </div>
</div>
";
    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "import.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  527 => 4,  518 => 199,  513 => 197,  508 => 194,  506 => 193,  502 => 191,  498 => 190,  495 => 189,  488 => 184,  484 => 182,  475 => 176,  466 => 174,  462 => 173,  458 => 171,  445 => 169,  441 => 168,  438 => 167,  433 => 165,  424 => 159,  419 => 158,  413 => 154,  406 => 150,  400 => 148,  398 => 147,  393 => 145,  388 => 144,  386 => 143,  381 => 140,  377 => 139,  371 => 136,  367 => 134,  361 => 131,  355 => 129,  353 => 128,  349 => 126,  342 => 122,  338 => 120,  331 => 118,  329 => 117,  321 => 116,  317 => 115,  313 => 113,  309 => 111,  302 => 109,  300 => 108,  292 => 107,  288 => 106,  285 => 105,  283 => 104,  280 => 103,  276 => 102,  270 => 100,  267 => 99,  263 => 97,  259 => 95,  252 => 91,  246 => 88,  243 => 87,  241 => 86,  236 => 85,  233 => 84,  231 => 83,  228 => 82,  218 => 77,  211 => 75,  209 => 74,  205 => 72,  201 => 70,  197 => 68,  191 => 65,  184 => 62,  182 => 61,  177 => 60,  175 => 59,  171 => 58,  166 => 55,  156 => 50,  150 => 48,  146 => 47,  135 => 43,  125 => 40,  121 => 38,  118 => 37,  116 => 36,  113 => 35,  109 => 33,  104 => 31,  101 => 30,  98 => 29,  94 => 26,  87 => 23,  81 => 22,  78 => 21,  73 => 18,  71 => 17,  64 => 13,  56 => 8,  52 => 7,  48 => 5,  46 => 4,  42 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "import.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\import.twig");
    }
}
