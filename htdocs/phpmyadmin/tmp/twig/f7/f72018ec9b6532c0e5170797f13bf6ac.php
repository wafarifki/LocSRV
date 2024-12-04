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

/* preferences/manage/main.twig */
class __TwigTemplate_030c61a09ad24656bf039d03b5b85a19 extends Template
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
<script type=\"text/javascript\">
    ";
        // line 3
        echo PhpMyAdmin\Sanitize::getJsValue("Messages.strSavedOn", _gettext("Saved on: @DATE@"));
        echo "
</script>
<div class=\"row\">
<div id=\"maincontainer\" class=\"container-fluid\">
<div class=\"row\">
    <div class=\"col-12 col-md-7\">
        <div class=\"card mt-4\">
          <div class=\"card-header\">
            ";
echo _gettext("Import");
        // line 12
        echo "          </div>
          <div class=\"card-body\">
            <form class=\"prefs-form disableAjax\" name=\"prefs_import\" action=\"";
        // line 14
        echo PhpMyAdmin\Url::getFromRoute("/preferences/manage");
        echo "\" method=\"post\"
                  enctype=\"multipart/form-data\">
                ";
        // line 16
        echo PhpMyAdmin\Url::getHiddenInputs();
        echo "
                <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["max_upload_size"] ?? null), "html", null, true);
        echo "\">
                <input type=\"hidden\" name=\"json\" value=\"\">
                <input type=\"radio\" id=\"import_text_file\" name=\"import_type\" value=\"text_file\" checked=\"checked\">
                <label for=\"import_text_file\"> ";
echo _gettext("Import from file");
        // line 20
        echo " </label>
                <div id=\"opts_import_text_file\" class=\"prefsmanage_opts\">
                    <label for=\"input_import_file\"> ";
echo _gettext("Browse your computer:");
        // line 22
        echo " </label>
                    <input type=\"file\" name=\"import_file\" id=\"input_import_file\">
                </div>
                <input type=\"radio\" id=\"import_local_storage\" name=\"import_type\" value=\"local_storage\"
                       disabled=\"disabled\">
                <label for=\"import_local_storage\"> ";
echo _gettext("Import from browser's storage");
        // line 27
        echo " </label>
                <div id=\"opts_import_local_storage\" class=\"prefsmanage_opts disabled\">
                    <div class=\"localStorage-supported\">
                        ";
echo _gettext("Settings will be imported from your browser's local storage.");
        // line 31
        echo "                        <br>
                        <div class=\"localStorage-exists\">
                            ";
echo _gettext("Saved on: @DATE@");
        // line 34
        echo "                        </div>
                        <div class=\"localStorage-empty\">
                            ";
        // line 36
        echo call_user_func_array($this->env->getFilter('notice')->getCallable(), [_gettext("You have no saved settings!")]);
        echo "
                        </div>
                    </div>
                    <div class=\"localStorage-unsupported\">
                        ";
        // line 40
        echo call_user_func_array($this->env->getFilter('notice')->getCallable(), [_gettext("This feature is not supported by your web browser")]);
        echo "
                    </div>
                </div>
                <input type=\"checkbox\" id=\"import_merge\" name=\"import_merge\">
                <label for=\"import_merge\"> ";
echo _gettext("Merge with current configuration");
        // line 44
        echo " </label>
                <br><br>
                <input class=\"btn btn-primary\" type=\"submit\" name=\"submit_import\" value=\"";
        // line 46
        echo twig_escape_filter($this->env, _gettext("Go"), "html", null, true);
        echo "\">
            </form>
          </div>
        </div>
        ";
        // line 50
        if (($context["exists_setup_and_not_exists_config"] ?? null)) {
            // line 51
            echo "            ";
            // line 52
            echo "            ";
            // line 53
            echo "            ";
            // line 54
            echo "            <div class=\"card mt-4\">
              <div class=\"card-header\">
                ";
echo _gettext("More settings");
            // line 57
            echo "              </div>
              <div class=\"card-body\">
                ";
            // line 59
            echo twig_sprintf(_gettext("You can set more settings by modifying config.inc.php, eg. by using %sSetup script%s."), "<a href=\"setup/index.php\" target=\"_blank\">", "</a>");
            echo "
                ";
            // line 60
            echo PhpMyAdmin\Html\MySQLDocumentation::showDocumentation("setup", "setup-script");
            echo "
              </div>
            </div>
        ";
        }
        // line 64
        echo "    </div>
    <div class=\"col-12 col-md-5\">
        <div class=\"card mt-4\">
          <div class=\"card-header\">
            ";
echo _gettext("Export");
        // line 69
        echo "          </div>
          <div class=\"card-body\">
            <div class=\"click-hide-message hide\">
                ";
        // line 72
        echo call_user_func_array($this->env->getFilter('raw_success')->getCallable(), [_gettext("Configuration has been saved.")]);
        echo "
            </div>
            <form class=\"prefs-form disableAjax\" name=\"prefs_export\"
                  action=\"";
        // line 75
        echo PhpMyAdmin\Url::getFromRoute("/preferences/manage");
        echo "\" method=\"post\">
                ";
        // line 76
        echo PhpMyAdmin\Url::getHiddenInputs();
        echo "
                <div>
                    <input type=\"radio\" id=\"export_text_file\" name=\"export_type\"
                           value=\"text_file\" checked=\"checked\">
                    <label for=\"export_text_file\">
                        ";
echo _gettext("Save as JSON file");
        // line 82
        echo "                    </label><br>
                    <input type=\"radio\" id=\"export_php_file\" name=\"export_type\" value=\"php_file\">
                    <label for=\"export_php_file\">
                        ";
echo _gettext("Save as PHP file");
        // line 86
        echo "                    </label><br>
                    <input type=\"radio\" id=\"export_local_storage\" name=\"export_type\" value=\"local_storage\"
                           disabled=\"disabled\">
                    <label for=\"export_local_storage\">
                        ";
echo _gettext("Save to browser's storage");
        // line 91
        echo "                    </label>
                </div>
                <div id=\"opts_export_local_storage\"
                     class=\"prefsmanage_opts disabled\">
                    <span class=\"localStorage-supported\">
                        ";
echo _gettext("Settings will be saved in your browser's local storage.");
        // line 97
        echo "                      <div class=\"localStorage-exists\">
                            <b>
                                ";
echo _gettext("Existing settings will be overwritten!");
        // line 100
        echo "                            </b>
                        </div>
                    </span>
                    <div class=\"localStorage-unsupported\">
                        ";
        // line 104
        echo call_user_func_array($this->env->getFilter('notice')->getCallable(), [_gettext("This feature is not supported by your web browser")]);
        echo "
                    </div>
                </div>
                <br>
                <input class=\"btn btn-primary\" type=\"submit\" name=\"submit_export\" value=\"";
echo _gettext("Go");
        // line 108
        echo "\">
            </form>
          </div>
        </div>
        <div class=\"card mt-4\">
          <div class=\"card-header\">
            ";
echo _gettext("Reset");
        // line 115
        echo "          </div>
          <div class=\"card-body\">
            <form class=\"prefs-form disableAjax\" name=\"prefs_reset\"
                  action=\"";
        // line 118
        echo PhpMyAdmin\Url::getFromRoute("/preferences/manage");
        echo "\" method=\"post\">
                ";
        // line 119
        echo PhpMyAdmin\Url::getHiddenInputs();
        echo "
                ";
echo _gettext("You can reset all your settings and restore them to default values.");
        // line 121
        echo "                <br><br>
                <input class=\"btn btn-secondary\" type=\"submit\" name=\"submit_clear\" value=\"";
echo _gettext("Reset");
        // line 122
        echo "\">
            </form>
          </div>
        </div>
    </div>
</div>
    <br class=\"clearfloat\">
</div>
</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "preferences/manage/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 122,  250 => 121,  245 => 119,  241 => 118,  236 => 115,  227 => 108,  219 => 104,  213 => 100,  208 => 97,  200 => 91,  193 => 86,  187 => 82,  178 => 76,  174 => 75,  168 => 72,  163 => 69,  156 => 64,  149 => 60,  145 => 59,  141 => 57,  136 => 54,  134 => 53,  132 => 52,  130 => 51,  128 => 50,  121 => 46,  117 => 44,  109 => 40,  102 => 36,  98 => 34,  93 => 31,  87 => 27,  79 => 22,  74 => 20,  67 => 17,  63 => 16,  58 => 14,  54 => 12,  42 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "preferences/manage/main.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\preferences\\manage\\main.twig");
    }
}
