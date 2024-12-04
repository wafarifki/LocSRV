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

/* export.twig */
class __TwigTemplate_7af0df16c299ca71d07868177be22f92 extends Template
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
            'message' => [$this, 'block_message'],
            'selection_options' => [$this, 'block_selection_options'],
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
        echo PhpMyAdmin\Html\Generator::getImage("b_export", _gettext("Export"));
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

  ";
        // line 10
        $this->displayBlock('message', $context, $blocks);
        // line 11
        echo "
  ";
        // line 12
        if (twig_get_attribute($this->env, $this->source, ($context["templates"] ?? null), "is_enabled", [], "any", false, false, false, 12)) {
            // line 13
            echo "    <div class=\"card mb-3\">
      <div class=\"card-header\">";
echo _gettext("Export templates:");
            // line 14
            echo "</div>
      <div class=\"card-body row gy-3\">
        <form method=\"post\" action=\"";
            // line 16
            echo PhpMyAdmin\Url::getFromRoute("/export/template/create");
            echo "\" class=\"col-12 col-md ajax\">
          <fieldset>
            <legend>";
echo _gettext("New template:");
            // line 18
            echo "</legend>
            <div class=\"row g-3 align-items-center\">
              <div class=\"col-auto\">
                <label for=\"templateName\" class=\"col-form-label\">";
echo _gettext("Template name");
            // line 21
            echo "</label>
              </div>
              <div class=\"col-auto\">
                <input class=\"form-control\" type=\"text\" name=\"templateName\" id=\"templateName\" maxlength=\"64\" placeholder=\"";
echo _gettext("Template name");
            // line 24
            echo "\" required>
              </div>
              <div class=\"col-auto\">
                <input class=\"btn btn-secondary\" type=\"submit\" name=\"createTemplate\" id=\"createTemplate\" value=\"";
echo _gettext("Create");
            // line 27
            echo "\">
              </div>
            </div>
          </fieldset>
        </form>

        <form method=\"post\" id=\"existingTemplatesForm\" class=\"col-12 col-md ajax\">
          <fieldset>
            <legend>";
echo _gettext("Existing templates:");
            // line 35
            echo "</legend>
            <div class=\"row g-3 align-items-center\">
              <div class=\"col-auto\">
                <label for=\"template\" class=\"col-form-label\">";
echo _gettext("Template:");
            // line 38
            echo "</label>
              </div>
              <div class=\"col-auto\">
                <select class=\"form-select\" name=\"template\" id=\"template\" required>
                  <option value=\"\">-- ";
echo _gettext("Select a template");
            // line 42
            echo " --</option>
                  ";
            // line 43
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["templates"] ?? null), "templates", [], "any", false, false, false, 43));
            foreach ($context['_seq'] as $context["_key"] => $context["template"]) {
                // line 44
                echo "                    <option value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["template"], "getId", [], "method", false, false, false, 44), "html", null, true);
                echo "\"";
                echo (((twig_get_attribute($this->env, $this->source, $context["template"], "getId", [], "method", false, false, false, 44) == twig_get_attribute($this->env, $this->source, ($context["templates"] ?? null), "selected", [], "any", false, false, false, 44))) ? (" selected") : (""));
                echo ">
                      ";
                // line 45
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["template"], "getName", [], "method", false, false, false, 45), "html", null, true);
                echo "
                    </option>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['template'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "                </select>
              </div>
              <div class=\"col-auto\">
                <input class=\"btn btn-secondary\" type=\"submit\" formaction=\"";
            // line 51
            echo PhpMyAdmin\Url::getFromRoute("/export/template/update");
            echo "\" name=\"updateTemplate\" id=\"updateTemplate\" value=\"";
echo _gettext("Update");
            echo "\">
              </div>
              <div class=\"col-auto\">
                <input class=\"btn btn-secondary\" type=\"submit\" formaction=\"";
            // line 54
            echo PhpMyAdmin\Url::getFromRoute("/export/template/delete");
            echo "\" name=\"deleteTemplate\" id=\"deleteTemplate\" value=\"";
echo _gettext("Delete");
            echo "\">
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  ";
        }
        // line 62
        echo "
  ";
        // line 63
        if ( !twig_test_empty(($context["sql_query"] ?? null))) {
            // line 64
            echo "    <div class=\"card mb-3\">
      <div class=\"card-header\">
        ";
            // line 67
            echo "        ";
echo _gettext("SQL query:");
            // line 68
            echo "      </div>
      <div class=\"card-body\">
        <div id=\"sqlqueryform\">
          ";
            // line 72
            echo "          <input class=\"btn btn-secondary\" type=\"submit\" id=\"showsqlquery\" value=\"";
echo _gettext("Show SQL query");
            echo "\">
        </div>
        <div class=\"d-none\"></div>
      </div>
    </div>
    <div class=\"modal fade\" id=\"showSqlQueryModal\" tabindex=\"-1\" aria-labelledby=\"showSqlQueryModalLabel\" aria-hidden=\"true\">
      <div class=\"modal-dialog\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"showSqlQueryModalLabel\">";
echo _gettext("Loading");
            // line 81
            echo "</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"";
echo _gettext("Close");
            // line 82
            echo "\"></button>
          </div>
          <div class=\"modal-body\">
            <div id=\"export_sql_modal_content\">
              <code class=\"sql\">
                <pre id=\"sql_preview_query\">";
            // line 87
            echo twig_escape_filter($this->env, ($context["sql_query"] ?? null), "html", null, true);
            echo "</pre>
              </code>
            </div>
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">";
echo _gettext("Close");
            // line 92
            echo "</button>
          </div>
        </div>
      </div>
    </div>
  ";
        }
        // line 98
        echo "
  <form method=\"post\" action=\"";
        // line 99
        echo PhpMyAdmin\Url::getFromRoute("/export");
        echo "\" name=\"dump\" class=\"disableAjax\">
    ";
        // line 100
        echo PhpMyAdmin\Url::getHiddenInputs(($context["hidden_inputs"] ?? null));
        echo "

    ";
        // line 102
        if ((($context["export_method"] ?? null) != "custom-no-form")) {
            // line 103
            echo "      <div class=\"card mb-3\" id=\"quick_or_custom\">
        <div class=\"card-header\">";
echo _gettext("Export method:");
            // line 104
            echo "</div>
        <div class=\"card-body\">
          <div class=\"form-check\">
            <input class=\"form-check-input\" type=\"radio\" name=\"quick_or_custom\" value=\"quick\" id=\"radio_quick_export\"";
            // line 107
            echo (((($context["export_method"] ?? null) == "quick")) ? (" checked") : (""));
            echo ">
            <label class=\"form-check-label\" for=\"radio_quick_export\">";
echo _gettext("Quick - display only the minimal options");
            // line 108
            echo "</label>
          </div>
          <div class=\"form-check\">
            <input class=\"form-check-input\" type=\"radio\" name=\"quick_or_custom\" value=\"custom\" id=\"radio_custom_export\"";
            // line 111
            echo (((($context["export_method"] ?? null) == "custom")) ? (" checked") : (""));
            echo ">
            <label class=\"form-check-label\" for=\"radio_custom_export\">";
echo _gettext("Custom - display all possible options");
            // line 112
            echo "</label>
          </div>
        </div>
      </div>
    ";
        }
        // line 117
        echo "
    <div class=\"card mb-3\" id=\"format\">
      <div class=\"card-header\">";
echo _gettext("Format:");
        // line 119
        echo "</div>
      <div class=\"card-body\">
        <select class=\"form-select\" id=\"plugins\" name=\"what\" aria-label=\"";
echo _gettext("File format to export");
        // line 121
        echo "\">
          ";
        // line 122
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plugins_choice"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 123
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 123), "html", null, true);
            echo "\"";
            echo ((twig_get_attribute($this->env, $this->source, $context["option"], "is_selected", [], "any", false, false, false, 123)) ? (" selected") : (""));
            echo ">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "text", [], "any", false, false, false, 123), "html", null, true);
            echo "</option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 125
        echo "        </select>

        ";
        // line 127
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plugins_choice"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 128
            echo "          <input type=\"hidden\" id=\"force_file_";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 128), "html", null, true);
            echo "\" value=\"";
            echo ((twig_get_attribute($this->env, $this->source, $context["option"], "force_file", [], "any", false, false, false, 128)) ? ("true") : ("false"));
            echo "\">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
        echo "      </div>
    </div>

    ";
        // line 133
        $this->displayBlock('selection_options', $context, $blocks);
        // line 134
        echo "
    ";
        // line 135
        if ( !twig_test_empty(($context["rows"] ?? null))) {
            // line 136
            echo "      <div class=\"card mb-3\" id=\"rows\">
        <div class=\"card-header\">";
echo _gettext("Rows:");
            // line 137
            echo "</div>
        <div class=\"card-body\">
          <div class=\"form-check\">
            <input class=\"form-check-input\" type=\"radio\" name=\"allrows\" value=\"1\" id=\"radio_allrows_1\"";
            // line 140
            echo ((((null === twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "allrows", [], "any", false, false, false, 140)) || (twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "allrows", [], "any", false, false, false, 140) == 1))) ? (" checked") : (""));
            echo ">
            <label class=\"form-check-label\" for=\"radio_allrows_1\">";
echo _gettext("Dump all rows");
            // line 141
            echo "</label>
          </div>
          <div class=\"form-check mb-2\">
            <input class=\"form-check-input\" type=\"radio\" name=\"allrows\" value=\"0\" id=\"radio_allrows_0\"";
            // line 144
            echo ((( !(null === twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "allrows", [], "any", false, false, false, 144)) && (twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "allrows", [], "any", false, false, false, 144) == 0))) ? (" checked") : (""));
            echo ">
            <label class=\"form-check-label\" for=\"radio_allrows_0\">";
echo _gettext("Dump some row(s)");
            // line 145
            echo "</label>
          </div>
          <ul class=\"list-group\">
            <li class=\"list-group-item\">
              <label class=\"form-label\" for=\"limit_to\">";
echo _gettext("Number of rows:");
            // line 149
            echo "</label>
              <input class=\"form-control\" type=\"text\" id=\"limit_to\" name=\"limit_to\" size=\"5\" value=\"";
            // line 151
            if ( !(null === twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "limit_to", [], "any", false, false, false, 151))) {
                // line 152
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "limit_to", [], "any", false, false, false, 152), "html", null, true);
            } elseif (( !twig_test_empty(twig_get_attribute($this->env, $this->source,             // line 153
($context["rows"] ?? null), "unlim_num_rows", [], "any", false, false, false, 153)) && (twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "unlim_num_rows", [], "any", false, false, false, 153) != 0))) {
                // line 154
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "unlim_num_rows", [], "any", false, false, false, 154), "html", null, true);
            } else {
                // line 156
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "number_of_rows", [], "any", false, false, false, 156), "html", null, true);
            }
            // line 157
            echo "\" onfocus=\"this.select()\">
            </li>
            <li class=\"list-group-item\">
              <label class=\"form-label\" for=\"limit_from\">";
echo _gettext("Row to begin at:");
            // line 160
            echo "</label>
              <input class=\"form-control\" type=\"text\" id=\"limit_from\" name=\"limit_from\" size=\"5\" value=\"";
            // line 161
            (( !(null === twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "limit_from", [], "any", false, false, false, 161))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "limit_from", [], "any", false, false, false, 161), "html", null, true))) : (print (0)));
            echo "\" onfocus=\"this.select()\">
            </li>
          </ul>
        </div>
      </div>
    ";
        }
        // line 167
        echo "
    ";
        // line 168
        if (($context["has_save_dir"] ?? null)) {
            // line 169
            echo "      <div class=\"card mb-3 d-none\" id=\"output_quick_export\">
        <div class=\"card-header\">";
echo _gettext("Output:");
            // line 170
            echo "</div>
        <div class=\"card-body\">
          <div class=\"form-check form-switch\">
            <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" name=\"quick_export_onserver\" value=\"saveit\" id=\"checkbox_quick_dump_onserver\"";
            // line 173
            echo ((($context["export_is_checked"] ?? null)) ? (" checked") : (""));
            echo ">
            <label class=\"form-check-label\" for=\"checkbox_quick_dump_onserver\">
              ";
            // line 175
            echo twig_sprintf(_gettext("Save on server in the directory <strong>%s</strong>"), twig_escape_filter($this->env, ($context["save_dir"] ?? null)));
            echo "
            </label>
          </div>
          <div class=\"form-check form-switch\">
            <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" name=\"quick_export_onserver_overwrite\" value=\"saveitover\" id=\"checkbox_quick_dump_onserver_overwrite\"";
            // line 180
            echo ((($context["export_overwrite_is_checked"] ?? null)) ? (" checked") : (""));
            echo ">
            <label class=\"form-check-label\" for=\"checkbox_quick_dump_onserver_overwrite\">
              ";
echo _gettext("Overwrite existing file(s)");
            // line 183
            echo "            </label>
          </div>
        </div>
      </div>
    ";
        }
        // line 188
        echo "
    <div class=\"modal fade\" id=\"renameExportModal\" tabindex=\"-1\" aria-labelledby=\"renameExportModalLabel\" aria-hidden=\"true\">
      <div class=\"modal-dialog modal-xl\">
        <div class=\"modal-content\">
          <div class=\"modal-header\">
            <h5 class=\"modal-title\" id=\"renameExportModalLabel\">";
echo _gettext("Rename exported databases/tables/columns");
        // line 193
        echo "</h5>
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"";
echo _gettext("Close");
        // line 194
        echo "\"></button>
          </div>
          <div class=\"modal-body overflow-auto\">
            <table class=\"table align-middle mb-3\" id=\"alias_data\">
              <thead>
                <tr>
                  <th colspan=\"4\">
                    ";
echo _gettext("Defined aliases");
        // line 202
        echo "                  </th>
                </tr>
              </thead>

              <tbody>
                ";
        // line 207
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["aliases"] ?? null));
        foreach ($context['_seq'] as $context["db"] => $context["db_data"]) {
            // line 208
            echo "                  ";
            if ((twig_get_attribute($this->env, $this->source, $context["db_data"], "alias", [], "any", true, true, false, 208) &&  !(null === twig_get_attribute($this->env, $this->source, $context["db_data"], "alias", [], "any", false, false, false, 208)))) {
                // line 209
                echo "                    <tr>
                      <th>";
echo _pgettext("Alias", "Database");
                // line 210
                echo "</th>
                      <td>";
                // line 211
                echo twig_escape_filter($this->env, $context["db"], "html", null, true);
                echo "</td>
                      <td>
                        <input name=\"aliases[";
                // line 213
                echo twig_escape_filter($this->env, $context["db"], "html", null, true);
                echo "][alias]\" value=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["db_data"], "alias", [], "any", false, false, false, 213), "html", null, true);
                echo "\" type=\"text\">
                      </td>
                      <td>
                        <button class=\"alias_remove btn btn-secondary\">";
echo _gettext("Remove");
                // line 216
                echo "</button>
                      </td>
                    </tr>
                  ";
            }
            // line 220
            echo "
                  ";
            // line 221
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((((twig_get_attribute($this->env, $this->source, $context["db_data"], "tables", [], "any", true, true, false, 221) &&  !(null === twig_get_attribute($this->env, $this->source, $context["db_data"], "tables", [], "any", false, false, false, 221)))) ? (twig_get_attribute($this->env, $this->source, $context["db_data"], "tables", [], "any", false, false, false, 221)) : ([])));
            foreach ($context['_seq'] as $context["table"] => $context["table_data"]) {
                // line 222
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["table_data"], "alias", [], "any", true, true, false, 222) &&  !(null === twig_get_attribute($this->env, $this->source, $context["table_data"], "alias", [], "any", false, false, false, 222)))) {
                    // line 223
                    echo "                      <tr>
                        <th>";
echo _pgettext("Alias", "Table");
                    // line 224
                    echo "</th>
                        <td>";
                    // line 225
                    echo twig_escape_filter($this->env, $context["db"], "html", null, true);
                    echo ".";
                    echo twig_escape_filter($this->env, $context["table"], "html", null, true);
                    echo "</td>
                        <td>
                          <input name=\"aliases[";
                    // line 227
                    echo twig_escape_filter($this->env, $context["db"], "html", null, true);
                    echo "][tables][";
                    echo twig_escape_filter($this->env, $context["table"], "html", null, true);
                    echo "][alias]\" value=\"";
                    echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["table_data"], "alias", [], "any", false, false, false, 227), "html", null, true);
                    echo "\" type=\"text\">
                        </td>
                        <td>
                          <button class=\"alias_remove btn btn-secondary\">";
echo _gettext("Remove");
                    // line 230
                    echo "</button>
                        </td>
                      </tr>
                    ";
                }
                // line 234
                echo "
                    ";
                // line 235
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((((twig_get_attribute($this->env, $this->source, $context["table_data"], "columns", [], "any", true, true, false, 235) &&  !(null === twig_get_attribute($this->env, $this->source, $context["table_data"], "columns", [], "any", false, false, false, 235)))) ? (twig_get_attribute($this->env, $this->source, $context["table_data"], "columns", [], "any", false, false, false, 235)) : ([])));
                foreach ($context['_seq'] as $context["column"] => $context["column_name"]) {
                    // line 236
                    echo "                      <tr>
                        <th>";
echo _pgettext("Alias", "Column");
                    // line 237
                    echo "</th>
                        <td>";
                    // line 238
                    echo twig_escape_filter($this->env, $context["db"], "html", null, true);
                    echo ".";
                    echo twig_escape_filter($this->env, $context["table"], "html", null, true);
                    echo ".";
                    echo twig_escape_filter($this->env, $context["column"], "html", null, true);
                    echo "</td>
                        <td>
                          <input name=\"aliases[";
                    // line 240
                    echo twig_escape_filter($this->env, $context["db"], "html", null, true);
                    echo "][tables][";
                    echo twig_escape_filter($this->env, $context["table"], "html", null, true);
                    echo "][colums][";
                    echo twig_escape_filter($this->env, $context["column"], "html", null, true);
                    echo "]\" value=\"";
                    echo twig_escape_filter($this->env, $context["column_name"], "html", null, true);
                    echo "\" type=\"text\">
                        </td>
                        <td>
                          <button class=\"alias_remove btn btn-secondary\">";
echo _gettext("Remove");
                    // line 243
                    echo "</button>
                        </td>
                      </tr>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['column'], $context['column_name'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 247
                echo "                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['table'], $context['table_data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 248
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['db'], $context['db_data'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 249
        echo "              </tbody>

              ";
        // line 252
        echo "              <tfoot class=\"hide\">
                <tr>
                  <th></th>
                  <td></td>
                  <td>
                    <input name=\"aliases_new\" value=\"\" type=\"text\">
                  </td>
                  <td>
                    <button class=\"alias_remove btn btn-secondary\">";
echo _gettext("Remove");
        // line 260
        echo "</button>
                  </td>
                </tr>
              </tfoot>
            </table>

            <table class=\"table align-middle\">
              <thead>
                <tr>
                  <th colspan=\"4\">";
echo _gettext("Define new aliases");
        // line 269
        echo "</th>
                </tr>
              </thead>
              <tr>
                <td>
                  <label>";
echo _gettext("Select database:");
        // line 274
        echo "</label>
                </td>
                <td>
                  <select id=\"db_alias_select\">
                    <option value=\"\"></option>
                  </select>
                </td>
                <td>
                  <input id=\"db_alias_name\" placeholder=\"";
echo _gettext("New database name");
        // line 282
        echo "\" disabled=\"1\">
                </td>
                <td>
                  <button id=\"db_alias_button\" class=\"btn btn-secondary\" disabled=\"1\">";
echo _gettext("Add");
        // line 285
        echo "</button>
                </td>
              </tr>
              <tr>
                <td>
                  <label>";
echo _gettext("Select table:");
        // line 290
        echo "</label>
                </td>
                <td>
                  <select id=\"table_alias_select\">
                    <option value=\"\"></option>
                  </select>
                </td>
                <td>
                  <input id=\"table_alias_name\" placeholder=\"";
echo _gettext("New table name");
        // line 298
        echo "\" disabled=\"1\">
                </td>
                <td>
                  <button id=\"table_alias_button\" class=\"btn btn-secondary\" disabled=\"1\">";
echo _gettext("Add");
        // line 301
        echo "</button>
                </td>
              </tr>
              <tr>
                <td>
                  <label>";
echo _gettext("Select column:");
        // line 306
        echo "</label>
                </td>
                <td>
                  <select id=\"column_alias_select\">
                    <option value=\"\"></option>
                  </select>
                </td>
                <td>
                  <input id=\"column_alias_name\" placeholder=\"";
echo _gettext("New column name");
        // line 314
        echo "\" disabled=\"1\">
                </td>
                <td>
                  <button id=\"column_alias_button\" class=\"btn btn-secondary\" disabled=\"1\">";
echo _gettext("Add");
        // line 317
        echo "</button>
                </td>
              </tr>
            </table>
          </div>
          <div class=\"modal-footer\">
            <button type=\"button\" class=\"btn btn-secondary\" id=\"saveAndCloseBtn\" data-bs-dismiss=\"modal\">
              ";
echo _gettext("Save & close");
        // line 325
        echo "            </button>
          </div>
        </div>
      </div>
    </div>

    <div class=\"card mb-3\" id=\"output\">
      <div class=\"card-header\">";
echo _gettext("Output:");
        // line 332
        echo "</div>
      <ul class=\"list-group list-group-flush\">
        <li class=\"list-group-item\">
          <div class=\"form-check form-switch\">
            <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" id=\"btn_alias_config\"";
        // line 336
        echo ((($context["has_aliases"] ?? null)) ? (" checked") : (""));
        echo ">
            <label class=\"form-check-label\" for=\"btn_alias_config\">";
echo _gettext("Rename exported databases/tables/columns");
        // line 337
        echo "</label>
          </div>
        </li>

        ";
        // line 341
        if ((($context["export_type"] ?? null) != "server")) {
            // line 342
            echo "          <li class=\"list-group-item\">
            <div class=\"form-check form-switch\">
              <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" name=\"lock_tables\" value=\"something\" id=\"checkbox_lock_tables\"";
            // line 345
            echo (((( !($context["repopulate"] ?? null) && ($context["is_checked_lock_tables"] ?? null)) || ($context["lock_tables"] ?? null))) ? (" checked") : (""));
            echo ">
              <label class=\"form-check-label\" for=\"checkbox_lock_tables\">
                ";
            // line 347
            echo twig_sprintf(_gettext("Use %s statement"), "<code>LOCK TABLES</code>");
            echo "
              </label>
            </div>
          </li>
        ";
        }
        // line 352
        echo "
        <li class=\"list-group-item\">
          <div class=\"form-check\">
            <input class=\"form-check-input\" type=\"radio\" id=\"radio_view_as_text\" name=\"output_format\" value=\"astext\"";
        // line 355
        echo (((($context["repopulate"] ?? null) || (($context["export_asfile"] ?? null) == false))) ? (" checked") : (""));
        echo ">
            <label class=\"form-check-label\" for=\"radio_view_as_text\">";
echo _gettext("View output as text");
        // line 356
        echo "</label>
          </div>
          <div class=\"form-check mb-2\">
            <input class=\"form-check-input\" type=\"radio\" name=\"output_format\" value=\"sendit\" id=\"radio_dump_asfile\"";
        // line 359
        echo ((( !($context["repopulate"] ?? null) && ($context["is_checked_asfile"] ?? null))) ? (" checked") : (""));
        echo ">
            <label class=\"form-check-label\" for=\"radio_dump_asfile\">";
echo _gettext("Save output to a file");
        // line 360
        echo "</label>
          </div>
          <div class=\"hstack gap-3\">
            <div class=\"vr\"></div>
            <ul class=\"list-group\" id=\"ul_save_asfile\">
              ";
        // line 365
        if (($context["has_save_dir"] ?? null)) {
            // line 366
            echo "                <li class=\"list-group-item\">
                  <div class=\"form-check form-switch\">
                    <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" name=\"onserver\" value=\"saveit\" id=\"checkbox_dump_onserver\"";
            // line 368
            echo ((($context["is_checked_export"] ?? null)) ? (" checked") : (""));
            echo ">
                    <label class=\"form-check-label\" for=\"checkbox_dump_onserver\">
                      ";
            // line 370
            echo twig_sprintf(_gettext("Save on server in the directory <strong>%s</strong>"), twig_escape_filter($this->env, ($context["save_dir"] ?? null)));
            echo "
                    </label>
                  </div>
                  <div class=\"form-check form-switch\">
                    <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" name=\"onserver_overwrite\" value=\"saveitover\" id=\"checkbox_dump_onserver_overwrite\"";
            // line 375
            echo ((($context["is_checked_export_overwrite"] ?? null)) ? (" checked") : (""));
            echo ">
                    <label class=\"form-check-label\" for=\"checkbox_dump_onserver_overwrite\">
                      ";
echo _gettext("Overwrite existing file(s)");
            // line 378
            echo "                    </label>
                  </div>
                </li>
              ";
        }
        // line 382
        echo "
              <li class=\"list-group-item\">
                <div class=\"row g-3 align-items-center\">
                  <div class=\"col-auto\">
                    <label for=\"filename_template\" class=\"col-form-label\">
                      ";
echo _gettext("File name template:");
        // line 388
        echo "                      ";
        echo PhpMyAdmin\Html\Generator::showHint(twig_sprintf(_gettext("This value is interpreted using the 'strftime' function, so you can use time formatting strings. Additionally the following transformations will happen: %s Other text will be kept as is. See the FAQ 6.27 for details."), ($context["filename_hint"] ?? null)));
        echo "
                    </label>
                  </div>
                  <div class=\"col-auto\">
                    <input type=\"text\" class=\"form-control\" name=\"filename_template\" id=\"filename_template\" value=\"";
        // line 392
        echo twig_escape_filter($this->env, ($context["filename_template"] ?? null), "html", null, true);
        echo "\">
                  </div>
                  <div class=\"col-auto\">
                    <div class=\"form-check form-switch\">
                      <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" name=\"remember_template\" id=\"checkbox_remember_template\"";
        // line 396
        echo ((($context["is_checked_remember_file_template"] ?? null)) ? (" checked") : (""));
        echo ">
                      <label class=\"form-check-label\" for=\"checkbox_remember_template\">
                        ";
echo _gettext("Use this for future exports");
        // line 399
        echo "                      </label>
                    </div>
                  </div>
                </div>
              </li>

              ";
        // line 405
        if (($context["is_encoding_supported"] ?? null)) {
            // line 406
            echo "                <li class=\"list-group-item\">
                  <div class=\"row\">
                    <div class=\"col-auto\">
                      <label for=\"select_charset\" class=\"col-form-label\">";
echo _gettext("Character set of the file:");
            // line 409
            echo "</label>
                    </div>
                    <div class=\"col-auto\">
                      <select class=\"form-select\" id=\"select_charset\" name=\"charset\">
                        ";
            // line 413
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["encodings"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["charset"]) {
                // line 414
                echo "                          <option value=\"";
                echo twig_escape_filter($this->env, $context["charset"], "html", null, true);
                echo "\"";
                // line 415
                echo ((((twig_test_empty(($context["export_charset"] ?? null)) && ($context["charset"] == "utf-8")) || ($context["charset"] == ($context["export_charset"] ?? null)))) ? (" selected") : (""));
                echo ">";
                // line 416
                echo twig_escape_filter($this->env, $context["charset"], "html", null, true);
                // line 417
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['charset'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 419
            echo "                      </select>
                    </div>
                  </div>
                </li>
              ";
        }
        // line 424
        echo "
              ";
        // line 425
        if ((($context["has_zip"] ?? null) || ($context["has_gzip"] ?? null))) {
            // line 426
            echo "                <li class=\"list-group-item\">
                  <div class=\"row\">
                    <div class=\"col-auto\">
                      <label for=\"compression\" class=\"col-form-label\">";
echo _gettext("Compression:");
            // line 429
            echo "</label>
                    </div>
                    <div class=\"col-auto\">
                      <select class=\"form-select\" id=\"compression\" name=\"compression\">
                        <option value=\"none\">";
echo _gettext("None");
            // line 433
            echo "</option>
                        ";
            // line 434
            if (($context["has_zip"] ?? null)) {
                // line 435
                echo "                          <option value=\"zip\"";
                // line 436
                echo (((($context["selected_compression"] ?? null) == "zip")) ? (" selected") : (""));
                echo ">
                            ";
echo _gettext("zipped");
                // line 438
                echo "                          </option>
                        ";
            }
            // line 440
            echo "                        ";
            if (($context["has_gzip"] ?? null)) {
                // line 441
                echo "                          <option value=\"gzip\"";
                // line 442
                echo (((($context["selected_compression"] ?? null) == "gzip")) ? (" selected") : (""));
                echo ">
                            ";
echo _gettext("gzipped");
                // line 444
                echo "                          </option>
                        ";
            }
            // line 446
            echo "                      </select>
                    </div>
                  </div>
                </li>
              ";
        } else {
            // line 451
            echo "                <input type=\"hidden\" name=\"compression\" value=\"";
            echo twig_escape_filter($this->env, ($context["selected_compression"] ?? null), "html", null, true);
            echo "\">
              ";
        }
        // line 453
        echo "
              ";
        // line 454
        if (((($context["export_type"] ?? null) == "server") || (($context["export_type"] ?? null) == "database"))) {
            // line 455
            echo "                <li class=\"list-group-item\">
                  <div class=\"form-check form-switch\">
                    <input class=\"form-check-input\" type=\"checkbox\" role=\"switch\" id=\"checkbox_as_separate_files\" name=\"as_separate_files\" value=\"";
            // line 457
            echo twig_escape_filter($this->env, ($context["export_type"] ?? null), "html", null, true);
            echo "\"";
            // line 458
            echo ((($context["is_checked_as_separate_files"] ?? null)) ? (" checked") : (""));
            echo ">
                    <label class=\"form-check-label\" for=\"checkbox_as_separate_files\">
                      ";
            // line 460
            if ((($context["export_type"] ?? null) == "server")) {
                // line 461
                echo "                        ";
echo _gettext("Export databases as separate files");
                // line 462
                echo "                      ";
            } elseif ((($context["export_type"] ?? null) == "database")) {
                // line 463
                echo "                        ";
echo _gettext("Export tables as separate files");
                // line 464
                echo "                      ";
            }
            // line 465
            echo "                    </label>
                  </div>
                </li>
              ";
        }
        // line 469
        echo "            </ul>
          </div>
        </li>

        <li class=\"list-group-item\">
          <label for=\"maxsize\" class=\"form-label\">";
echo _gettext("Skip tables larger than:");
        // line 474
        echo "</label>
          <input class=\"form-control\" type=\"number\" id=\"maxsize\" name=\"maxsize\" aria-describedby=\"maxsizeHelp\">
          <div id=\"maxsizeHelp\" class=\"form-text\">";
echo _gettext("The size is measured in MiB.");
        // line 476
        echo "</div>
        </li>
      </ul>
    </div>

    <div class=\"card mb-3\" id=\"format_specific_opts\">
      <div class=\"card-header\">";
echo _gettext("Format-specific options:");
        // line 482
        echo "</div>
      <div class=\"card-body\">
        ";
        // line 484
        echo ($context["options"] ?? null);
        echo "
      </div>
    </div>

    ";
        // line 488
        if (($context["can_convert_kanji"] ?? null)) {
            // line 489
            echo "      ";
            // line 490
            echo "      <div class=\"card mb-3\" id=\"kanji_encoding\">
        <div class=\"card-header\">";
echo _gettext("Encoding Conversion:");
            // line 491
            echo "</div>
        <div class=\"card-body\">
          ";
            // line 493
            $this->loadTemplate("encoding/kanji_encoding_form.twig", "export.twig", 493)->display($context);
            // line 494
            echo "        </div>
      </div>
    ";
        }
        // line 497
        echo "
    <div id=\"submit\">
      <input id=\"buttonGo\" class=\"btn btn-primary\" type=\"submit\" value=\"";
echo _gettext("Export");
        // line 499
        echo "\" data-exec-time-limit=\"";
        echo twig_escape_filter($this->env, ($context["exec_time_limit"] ?? null), "html", null, true);
        echo "\">
    </div>
  </form>
</div>
";
    }

    // line 4
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 10
    public function block_message($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 133
    public function block_selection_options($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "export.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1074 => 133,  1068 => 10,  1062 => 4,  1052 => 499,  1047 => 497,  1042 => 494,  1040 => 493,  1036 => 491,  1032 => 490,  1030 => 489,  1028 => 488,  1021 => 484,  1017 => 482,  1008 => 476,  1003 => 474,  995 => 469,  989 => 465,  986 => 464,  983 => 463,  980 => 462,  977 => 461,  975 => 460,  970 => 458,  967 => 457,  963 => 455,  961 => 454,  958 => 453,  952 => 451,  945 => 446,  941 => 444,  936 => 442,  934 => 441,  931 => 440,  927 => 438,  922 => 436,  920 => 435,  918 => 434,  915 => 433,  908 => 429,  902 => 426,  900 => 425,  897 => 424,  890 => 419,  883 => 417,  881 => 416,  878 => 415,  874 => 414,  870 => 413,  864 => 409,  858 => 406,  856 => 405,  848 => 399,  842 => 396,  835 => 392,  827 => 388,  819 => 382,  813 => 378,  807 => 375,  800 => 370,  795 => 368,  791 => 366,  789 => 365,  782 => 360,  777 => 359,  772 => 356,  767 => 355,  762 => 352,  754 => 347,  749 => 345,  745 => 342,  743 => 341,  737 => 337,  732 => 336,  726 => 332,  716 => 325,  706 => 317,  700 => 314,  689 => 306,  681 => 301,  675 => 298,  664 => 290,  656 => 285,  650 => 282,  639 => 274,  631 => 269,  619 => 260,  608 => 252,  604 => 249,  598 => 248,  592 => 247,  583 => 243,  570 => 240,  561 => 238,  558 => 237,  554 => 236,  550 => 235,  547 => 234,  541 => 230,  530 => 227,  523 => 225,  520 => 224,  516 => 223,  513 => 222,  509 => 221,  506 => 220,  500 => 216,  491 => 213,  486 => 211,  483 => 210,  479 => 209,  476 => 208,  472 => 207,  465 => 202,  455 => 194,  451 => 193,  443 => 188,  436 => 183,  430 => 180,  423 => 175,  418 => 173,  413 => 170,  409 => 169,  407 => 168,  404 => 167,  395 => 161,  392 => 160,  386 => 157,  383 => 156,  380 => 154,  378 => 153,  376 => 152,  374 => 151,  371 => 149,  364 => 145,  359 => 144,  354 => 141,  349 => 140,  344 => 137,  340 => 136,  338 => 135,  335 => 134,  333 => 133,  328 => 130,  317 => 128,  313 => 127,  309 => 125,  296 => 123,  292 => 122,  289 => 121,  284 => 119,  279 => 117,  272 => 112,  267 => 111,  262 => 108,  257 => 107,  252 => 104,  248 => 103,  246 => 102,  241 => 100,  237 => 99,  234 => 98,  226 => 92,  217 => 87,  210 => 82,  206 => 81,  192 => 72,  187 => 68,  184 => 67,  180 => 64,  178 => 63,  175 => 62,  162 => 54,  154 => 51,  149 => 48,  140 => 45,  133 => 44,  129 => 43,  126 => 42,  119 => 38,  113 => 35,  102 => 27,  96 => 24,  90 => 21,  84 => 18,  78 => 16,  74 => 14,  70 => 13,  68 => 12,  65 => 11,  63 => 10,  58 => 8,  54 => 7,  50 => 5,  48 => 4,  44 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "export.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\export.twig");
    }
}
