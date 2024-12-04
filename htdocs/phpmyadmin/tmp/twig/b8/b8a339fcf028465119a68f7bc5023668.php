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

/* import/javascript.twig */
class __TwigTemplate_c3baa8b07e86505a16651147d57ba986 extends Template
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
        echo "\$( function() {
    ";
        // line 3
        echo "    \$(\"#buttonGo\").on(\"click\", function() {
        ";
        // line 5
        echo "        \$(\"#upload_form_form\").css(\"display\", \"none\");

        ";
        // line 7
        if ((($context["handler"] ?? null) != "PhpMyAdmin\\Plugins\\Import\\Upload\\UploadNoplugin")) {
            // line 8
            echo "            ";
            // line 9
            echo "            ";
            $context["ajax_url"] = (("index.php?route=/import-status&id=" . ($context["upload_id"] ?? null)) . PhpMyAdmin\Url::getCommonRaw(["import_status" => 1], "&"));
            // line 12
            echo "            ";
            $context["promot_str"] = PhpMyAdmin\Sanitize::jsFormat(_gettext("The file being uploaded is probably larger than the maximum allowed size or this is a known bug in webkit based (Safari, Google Chrome, Arora etc.) browsers."), false);
            // line 13
            echo "            ";
            $context["statustext_str"] = PhpMyAdmin\Sanitize::escapeJsString(_gettext("%s of %s"));
            // line 14
            echo "            ";
            $context["second_str"] = PhpMyAdmin\Sanitize::jsFormat(_gettext("%s/sec."), false);
            // line 15
            echo "            ";
            $context["remaining_min"] = PhpMyAdmin\Sanitize::jsFormat(_gettext("About %MIN min. %SEC sec. remaining."), false);
            // line 16
            echo "            ";
            $context["remaining_second"] = PhpMyAdmin\Sanitize::jsFormat(_gettext("About %SEC sec. remaining."), false);
            // line 17
            echo "            ";
            $context["processed_str"] = PhpMyAdmin\Sanitize::jsFormat(_gettext("The file is being processed, please be patient."), false);
            // line 18
            echo "            ";
            $context["import_url"] = PhpMyAdmin\Url::getCommonRaw(["import_status" => 1], "&");
            // line 19
            echo "
            ";
            // line 20
            ob_start(function () { return ''; });
            // line 21
            echo "                    <div class=\"upload_progress\">
                        <div class=\"upload_progress_bar_outer\">
                            <div class=\"percentage\"></div>
                            <div id=\"status\" class=\"upload_progress_bar_inner\">
                                <div class=\"percentage\"></div>
                            </div>
                        </div>
                        <div>
                            <img src=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->extensions['PhpMyAdmin\Twig\AssetExtension']->getImagePath("ajax_clock_small.gif"), "html", null, true);
            echo "\" width=\"16\" height=\"16\" alt=\"ajax clock\"> ";
            echo PhpMyAdmin\Sanitize::jsFormat(_gettext("Uploading your import file…"), false);
            // line 30
            echo "</div>
                        <div id=\"statustext\"></div>
                    </div>
            ";
            $context["upload_html"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 34
            echo "
            ";
            // line 36
            echo "            var finished = false;
            var percent  = 0.0;
            var total    = 0;
            var complete = 0;
            var original_title = parent && parent.document ? parent.document.title : false;
            var import_start;

            var perform_upload = function () {
            new \$.getJSON(
                \"";
            // line 45
            echo ($context["ajax_url"] ?? null);
            echo "\",
                {},
                function(response) {
                    finished = response.finished;
                    percent = response.percent;
                    total = response.total;
                    complete = response.complete;

                    if (total==0 && complete==0 && percent==0) {
                        \$(\"#upload_form_status_info\").html('<img src=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->extensions['PhpMyAdmin\Twig\AssetExtension']->getImagePath("ajax_clock_small.gif"), "html", null, true);
            echo "\" width=\"16\" height=\"16\" alt=\"ajax clock\"> ";
            echo ($context["promot_str"] ?? null);
            echo "');
                        \$(\"#upload_form_status\").css(\"display\", \"none\");
                    } else {
                        var now = new Date();
                        now = Date.UTC(
                            now.getFullYear(),
                            now.getMonth(),
                            now.getDate(),
                            now.getHours(),
                            now.getMinutes(),
                            now.getSeconds())
                            + now.getMilliseconds() - 1000;
                        var statustext = Functions.sprintf(
                            \"";
            // line 67
            echo ($context["statustext_str"] ?? null);
            echo "\",
                            Functions.formatBytes(
                                complete, 1, Messages.strDecimalSeparator
                            ),
                            Functions.formatBytes(
                                total, 1, Messages.strDecimalSeparator
                            )
                        );

                        if (\$(\"#importmain\").is(\":visible\")) {
                            ";
            // line 78
            echo "                            \$(\"#importmain\").hide();
                            \$(\"#import_form_status\")
                            .html('";
            // line 80
            echo twig_spaceless(($context["upload_html"] ?? null));
            echo "')
                            .show();
                            import_start = now;
                        }
                        else if (percent > 9 || complete > 2000000) {
                            ";
            // line 86
            echo "                            var used_time = now - import_start;
                            var seconds = parseInt(((total - complete) / complete) * used_time / 1000);
                            var speed = Functions.sprintf(
                                \"";
            // line 89
            echo ($context["second_str"] ?? null);
            echo "\",
                                Functions.formatBytes(complete / used_time * 1000, 1, Messages.strDecimalSeparator)
                            );

                            var minutes = parseInt(seconds / 60);
                            seconds %= 60;
                            var estimated_time;
                            if (minutes > 0) {
                                estimated_time = \"";
            // line 97
            echo ($context["remaining_min"] ?? null);
            echo "\"
                                    .replace(\"%MIN\", minutes)
                                    .replace(\"%SEC\", seconds);
                            }
                            else {
                                estimated_time = \"";
            // line 102
            echo ($context["remaining_second"] ?? null);
            echo "\"
                                .replace(\"%SEC\", seconds);
                            }

                            statustext += \"<br>\" + speed + \"<br><br>\" + estimated_time;
                        }

                        var percent_str = Math.round(percent) + \"%\";
                        \$(\"#status\").animate({width: percent_str}, 150);
                        \$(\".percentage\").text(percent_str);

                        ";
            // line 114
            echo "                        if (original_title !== false) {
                            parent.document.title
                                = percent_str + \" - \" + original_title;
                        }
                        else {
                            document.title
                                = percent_str + \" - \" + original_title;
                        }
                        \$(\"#statustext\").html(statustext);
                    }

                    if (finished == true) {
                        if (original_title !== false) {
                            parent.document.title = original_title;
                        }
                        else {
                            document.title = original_title;
                        }
                        \$(\"#importmain\").hide();
                        ";
            // line 134
            echo "                        \$(\"#import_form_status\")
                        .html('<img src=\"";
            // line 135
            echo twig_escape_filter($this->env, $this->extensions['PhpMyAdmin\Twig\AssetExtension']->getImagePath("ajax_clock_small.gif"), "html", null, true);
            echo "\" width=\"16\" height=\"16\" alt=\"ajax clock\"> ";
            echo ($context["processed_str"] ?? null);
            echo "')
                        .show();
                        \$(\"#import_form_status\").load(\"index.php?route=/import-status&message=true&";
            // line 137
            echo ($context["import_url"] ?? null);
            echo "\");
                        Navigation.reload();

                        ";
            // line 141
            echo "                    }
                    else {
                        setTimeout(perform_upload, 1000);
                    }
                });
            };
            setTimeout(perform_upload, 1000);
        ";
        } else {
            // line 149
            echo "            ";
            // line 150
            echo "            ";
            ob_start(function () { return ''; });
            // line 151
            echo "<img src=\"";
            echo twig_escape_filter($this->env, $this->extensions['PhpMyAdmin\Twig\AssetExtension']->getImagePath("ajax_clock_small.gif"), "html", null, true);
            echo "\" width=\"16\" height=\"16\" alt=\"ajax clock\">";
            // line 152
            echo PhpMyAdmin\Sanitize::jsFormat(_gettext("Please be patient, the file is being uploaded. Details about the upload are not available."), false);
            // line 153
            echo PhpMyAdmin\Html\MySQLDocumentation::showDocumentation("faq", "faq2-9");
            $context["image_tag"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
            // line 155
            echo "            \$('#upload_form_status_info').html('";
            echo ($context["image_tag"] ?? null);
            echo "');
            \$(\"#upload_form_status\").css(\"display\", \"none\");
        ";
        }
        // line 158
        echo "    });
});
";
    }

    public function getTemplateName()
    {
        return "import/javascript.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  275 => 158,  268 => 155,  265 => 153,  263 => 152,  259 => 151,  256 => 150,  254 => 149,  244 => 141,  238 => 137,  231 => 135,  228 => 134,  207 => 114,  193 => 102,  185 => 97,  174 => 89,  169 => 86,  161 => 80,  157 => 78,  144 => 67,  126 => 54,  114 => 45,  103 => 36,  100 => 34,  94 => 30,  90 => 29,  80 => 21,  78 => 20,  75 => 19,  72 => 18,  69 => 17,  66 => 16,  63 => 15,  60 => 14,  57 => 13,  54 => 12,  51 => 9,  49 => 8,  47 => 7,  43 => 5,  40 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "import/javascript.twig", "W:\\laragon\\etc\\apps\\phpMyAdmin\\templates\\import\\javascript.twig");
    }
}
