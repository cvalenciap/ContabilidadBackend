<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* summary.html.twig */
class __TwigTemplate_6975d368cec99e427e62dae1a8e90a184d108dc85e494965736ce4bad206166d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<html>
<head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
    <style type=\"text/css\">
        ";
        // line 5
        $this->loadTemplate("assets/style.css", "summary.html.twig", 5)->display($context);
        // line 6
        echo "        .nmarg{margin: 0}
    </style>
</head>
<body class=\"white-bg\">
";
        // line 10
        $context["cp"] = $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "company", []);
        // line 11
        $context["fecGen"] = twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "fecGeneracion", []), "d/m/Y");
        // line 12
        echo "<table width=\"100%\">
    <tbody><tr>
        <td style=\"padding:30px; !important\">
            <table width=\"100%\" height=\"200px\" border=\"0\" aling=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tbody><tr>
                    <td width=\"50%\" height=\"90\" align=\"center\">
                        <span><img src=\"";
        // line 18
        echo $this->env->getRuntime('Greenter\Report\Filter\ImageFilter')->toBase64($this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "system", []), "logo", []));
        echo "\" height=\"80\" style=\"text-align:center\" border=\"0\"></span>
                    </td>
                    <td width=\"5%\" height=\"40\" align=\"center\"></td>
                    <td width=\"45%\" rowspan=\"2\" valign=\"bottom\" style=\"padding-left:0\">
                        <div class=\"tabla_borde\">
                            <table width=\"100%\" border=\"0\" height=\"200\" cellpadding=\"6\" cellspacing=\"0\">
                                <tbody><tr>
                                    <td align=\"center\">
                                        <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:29px\" text-align=\"center\">RESUMEN DIARIO DE</span>
                                        <br>
                                        <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:19px\" text-align=\"center\">BOLETAS DE VENTA</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        <span style=\"font-size:15px\" text-align=\"center\">R.U.C.: ";
        // line 38
        echo $this->getAttribute(($context["cp"] ?? $this->getContext($context, "cp")), "ruc", []);
        echo "</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        No.: <span>";
        // line 43
        echo $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "correlativo", []);
        echo "</span>
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td valign=\"bottom\" style=\"padding-left:0\">
                        <div class=\"tabla_borde\">
                            <table width=\"96%\" height=\"100%\" border=\"0\" border-radius=\"\" cellpadding=\"9\" cellspacing=\"0\">
                                <tbody><tr>
                                    <td align=\"center\">
                                        <strong><span style=\"font-size:15px\">";
        // line 56
        echo $this->getAttribute(($context["cp"] ?? $this->getContext($context, "cp")), "razonSocial", []);
        echo "</span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"left\">
                                        <strong>Dirección: </strong>";
        // line 61
        echo $this->getAttribute($this->getAttribute(($context["cp"] ?? $this->getContext($context, "cp")), "address", []), "direccion", []);
        echo "
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"left\">
                                        ";
        // line 66
        echo $this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "user", []), "header", []);
        echo "
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </td>
                </tr>
                </tbody></table>
            <div class=\"tabla_borde\">
                <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                    <tbody><tr>
                        <td width=\"60%\" height=\"15\" align=\"left\"><strong>Fecha de Emisión del Resumen:</strong>  ";
        // line 77
        echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "fecResumen", []), "d/m/Y");
        echo "</td>
                        <td width=\"40%\" height=\"15\" align=\"left\"><strong>Fecha de Generación:</strong>  ";
        // line 78
        echo ($context["fecGen"] ?? $this->getContext($context, "fecGen"));
        echo "</td>
                    </tr>
                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Moneda: </strong>  ";
        // line 81
        echo $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog("PEN", "021");
        echo " </td>
                        <td width=\"40%\" align=\"left\"></td>
                    </tr>
                    </tbody></table>
            </div><br>
            <div class=\"tabla_borde\">
                <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                    <tbody>
                    <tr>
                        <td align=\"center\" class=\"bold\">Documento</td>
                        <td align=\"center\" class=\"bold\">Condición</td>
                        <td align=\"center\" class=\"bold\">Impuestos</td>
                        <td align=\"center\" class=\"bold\">Totales</td>
                        <td align=\"center\" class=\"bold\">Imp. Total</td>
                    </tr>
                    ";
        // line 96
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "details", []));
        foreach ($context['_seq'] as $context["_key"] => $context["det"]) {
            // line 97
            echo "                        <tr class=\"border_top\">
                            <td>
                                <p class=\"nmarg\"><strong>";
            // line 99
            echo $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute($context["det"], "tipoDoc", []), "01");
            echo "</strong>  ";
            echo $this->getAttribute($context["det"], "serieNro", []);
            echo "</p>
                                ";
            // line 100
            if ($this->getAttribute($context["det"], "docReferencia", [])) {
                // line 101
                echo "                                ";
                $context["ref"] = $this->getAttribute($context["det"], "docReferencia", []);
                // line 102
                echo "                                <p class=\"nmarg\"><strong>DOC. REF.</strong>  ";
                echo $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute(($context["ref"] ?? $this->getContext($context, "ref")), "tipoDoc", []), "01");
                echo "  ";
                echo $this->getAttribute(($context["ref"] ?? $this->getContext($context, "ref")), "nroDoc", []);
                echo "</p>
                                ";
            }
            // line 104
            echo "                            </td>
                            <td align=\"center\">";
            // line 105
            echo $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute($context["det"], "estado", []), "19");
            echo "</td>
                            <td>
                                <p class=\"nmarg\"><strong>IGV</strong>  ";
            // line 107
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "mtoIGV", []));
            echo "</p>
                                ";
            // line 108
            if ($this->getAttribute($context["det"], "mtoISC", [])) {
                // line 109
                echo "                                <p class=\"nmarg\"><strong>ISC</strong>  ";
                echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "mtoISC", []));
                echo "</p>
                                ";
            }
            // line 111
            echo "                                ";
            if ($this->getAttribute($context["det"], "mtoOtrosTributos", [])) {
                // line 112
                echo "                                <p class=\"nmarg\"><strong>Otros Tributos</strong>  ";
                echo $this->getAttribute($context["det"], "mtoOtrosTributos", []);
                echo "</p>
                                ";
            }
            // line 114
            echo "                                ";
            if ($this->getAttribute($context["det"], "mtoOtrosCargos", [])) {
                // line 115
                echo "                                <p class=\"nmarg\"><strong>Otros Cargos</strong>  ";
                echo $this->getAttribute($context["det"], "mtoOtrosCargos", []);
                echo "</p>
                                ";
            }
            // line 117
            echo "                            </td>
                            <td>
                                ";
            // line 119
            if ($this->getAttribute($context["det"], "mtoOperGravadas", [])) {
                // line 120
                echo "                                <p class=\"nmarg\"><strong>Gravadas</strong>  ";
                echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "mtoOperGravadas", []));
                echo "</p>
                                ";
            }
            // line 122
            echo "                                ";
            if ($this->getAttribute($context["det"], "mtoOperInafectas", [])) {
                // line 123
                echo "                                <p class=\"nmarg\"><strong>Inafectas</strong>  ";
                echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "mtoOperInafectas", []));
                echo "</p>
                                ";
            }
            // line 125
            echo "                                ";
            if ($this->getAttribute($context["det"], "mtoOperExoneradas", [])) {
                // line 126
                echo "                                <p class=\"nmarg\"><strong>Exoneradas</strong>  ";
                echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "mtoOperExoneradas", []));
                echo "</p>
                                ";
            }
            // line 128
            echo "                                ";
            if ($this->getAttribute($context["det"], "mtoOperGratuitas", [])) {
                // line 129
                echo "                                <p class=\"nmarg\"><strong>Gratuitas</strong>  ";
                echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "mtoOperGratuitas", []));
                echo "</p>
                                ";
            }
            // line 131
            echo "                            </td>
                            <td align=\"center\">";
            // line 132
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "total", []));
            echo "
                                ";
            // line 133
            if (($this->getAttribute($context["det"], "percepcion", []) && $this->getAttribute($this->getAttribute($context["det"], "percepcion", []), "mto", []))) {
                // line 134
                echo "                                    ";
                $context["perc"] = $this->getAttribute($context["det"], "percepcion", []);
                echo "<br>
                                    <p class=\"nmarg\"><strong>Percepción</strong>  ";
                // line 135
                echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["perc"] ?? $this->getContext($context, "perc")), "mto", []));
                echo "</p>
                                    <p class=\"nmarg\"><strong>Total Pagar</strong>  ";
                // line 136
                echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["perc"] ?? $this->getContext($context, "perc")), "mtoTotal", []));
                echo "</p>
                                ";
            }
            // line 138
            echo "                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['det'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 141
        echo "                    </tbody>
                </table></div>
            <br>
            ";
        // line 144
        if (((isset($context["max_items"]) || array_key_exists("max_items", $context)) && (twig_length_filter($this->env, $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "details", [])) > ($context["max_items"] ?? $this->getContext($context, "max_items"))))) {
            // line 145
            echo "                <div style=\"page-break-after:always;\"></div>
            ";
        }
        // line 147
        echo "            ";
        if (($this->getAttribute($this->getAttribute(($context["params"] ?? null), "system", [], "any", false, true), "hash", [], "any", true, true) && $this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "system", []), "hash", []))) {
            // line 148
            echo "                <div>
                    <blockquote>
                        <strong>Resumen:</strong>   ";
            // line 150
            echo $this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "system", []), "hash", []);
            echo "
                    </blockquote>
                </div>
            ";
        }
        // line 154
        echo "        </td>
    </tr>
    </tbody></table>
</body></html>";
    }

    public function getTemplateName()
    {
        return "summary.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  321 => 154,  314 => 150,  310 => 148,  307 => 147,  303 => 145,  301 => 144,  296 => 141,  288 => 138,  283 => 136,  279 => 135,  274 => 134,  272 => 133,  268 => 132,  265 => 131,  259 => 129,  256 => 128,  250 => 126,  247 => 125,  241 => 123,  238 => 122,  232 => 120,  230 => 119,  226 => 117,  220 => 115,  217 => 114,  211 => 112,  208 => 111,  202 => 109,  200 => 108,  196 => 107,  191 => 105,  188 => 104,  180 => 102,  177 => 101,  175 => 100,  169 => 99,  165 => 97,  161 => 96,  143 => 81,  137 => 78,  133 => 77,  119 => 66,  111 => 61,  103 => 56,  87 => 43,  79 => 38,  56 => 18,  48 => 12,  46 => 11,  44 => 10,  38 => 6,  36 => 5,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "summary.html.twig", "C:\\xampp\\htdocs\\slim\\vendor\\greenter\\report\\src\\Report\\Templates\\summary.html.twig");
    }
}
