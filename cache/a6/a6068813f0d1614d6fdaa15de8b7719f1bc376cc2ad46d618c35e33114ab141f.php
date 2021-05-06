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

/* invoice.html.twig */
class __TwigTemplate_25b07c3352458eb0e29487767cf10dc90c5091e8e410d0782714f79eff0f82df extends \Twig\Template
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
        $this->loadTemplate("assets/style.css", "invoice.html.twig", 5)->display($context);
        // line 6
        echo "    </style>
</head>
<body class=\"white-bg\">
";
        // line 9
        $context["cp"] = $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "company", []);
        // line 10
        $context["isNota"] = twig_in_filter($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "tipoDoc", []), [0 => "07", 1 => "08"]);
        // line 11
        $context["isAnticipo"] = ($this->getAttribute(($context["doc"] ?? null), "totalAnticipos", [], "any", true, true) && ($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "totalAnticipos", []) > 0));
        // line 12
        $context["name"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "tipoDoc", []), "01");
        // line 13
        echo "<table width=\"100%\">
    <tbody><tr>
        <td style=\"padding:30px; !important\">
            <table width=\"100%\" height=\"200px\" border=\"0\" aling=\"center\" cellpadding=\"0\" cellspacing=\"0\">
                <tbody><tr>
                    <td width=\"50%\" height=\"90\" align=\"center\">
                        <span><img src=\"";
        // line 19
        echo $this->env->getRuntime('Greenter\Report\Filter\ImageFilter')->toBase64($this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "system", []), "logo", []));
        echo "\" height=\"80\" style=\"text-align:center\" border=\"0\"></span>
                    </td>
                    <td width=\"5%\" height=\"40\" align=\"center\"></td>
                    <td width=\"45%\" rowspan=\"2\" valign=\"bottom\" style=\"padding-left:0\">
                        <div class=\"tabla_borde\">
                            <table width=\"100%\" border=\"0\" height=\"200\" cellpadding=\"6\" cellspacing=\"0\">
                                <tbody><tr>
                                    <td align=\"center\">
                                        <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:29px\" text-align=\"center\">";
        // line 27
        echo ($context["name"] ?? $this->getContext($context, "name"));
        echo "</span>
                                        <br>
                                        <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:19px\" text-align=\"center\">E L E C T R Ó N I C A</span>
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
        // line 39
        echo $this->getAttribute(($context["cp"] ?? $this->getContext($context, "cp")), "ruc", []);
        echo "</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        No.: <span>";
        // line 44
        echo $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "serie", []);
        echo "-";
        echo $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "correlativo", []);
        echo "</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"center\">
                                        Nro. R.I. Emisor: <span>";
        // line 49
        echo $this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "user", []), "resolucion", []);
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
        // line 62
        echo $this->getAttribute(($context["cp"] ?? $this->getContext($context, "cp")), "razonSocial", []);
        echo "</span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"left\">
                                        <strong>Dirección: </strong>";
        // line 67
        echo $this->getAttribute($this->getAttribute(($context["cp"] ?? $this->getContext($context, "cp")), "address", []), "direccion", []);
        echo "
                                    </td>
                                </tr>
                                <tr>
                                    <td align=\"left\">
                                        ";
        // line 72
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
                ";
        // line 81
        $context["cl"] = $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "client", []);
        // line 82
        echo "                <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                    <tbody><tr>
                        <td width=\"60%\" align=\"left\"><strong>Razón Social:</strong>  ";
        // line 84
        echo $this->getAttribute(($context["cl"] ?? $this->getContext($context, "cl")), "rznSocial", []);
        echo "</td>
                        <td width=\"40%\" align=\"left\"><strong>";
        // line 85
        echo $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute(($context["cl"] ?? $this->getContext($context, "cl")), "tipoDoc", []), "06");
        echo ":</strong>  ";
        echo $this->getAttribute(($context["cl"] ?? $this->getContext($context, "cl")), "numDoc", []);
        echo "</td>
                    </tr>
                    <tr>
                        <td width=\"60%\" align=\"left\">
                            <strong>Fecha Emisión: </strong>  ";
        // line 89
        echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "fechaEmision", []), "d/m/Y");
        echo "
                            ";
        // line 90
        if ((twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "fechaEmision", []), "H:i:s") != "00:00:00")) {
            echo " ";
            echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "fechaEmision", []), "H:i:s");
            echo " ";
        }
        // line 91
        echo "                            ";
        if (($this->getAttribute(($context["doc"] ?? null), "fecVencimiento", [], "any", true, true) && $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "fecVencimiento", []))) {
            // line 92
            echo "                            <br><br><strong>Fecha Vencimiento: </strong>  ";
            echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "fecVencimiento", []), "d/m/Y");
            echo "
                            ";
        }
        // line 94
        echo "                        </td>
                        <td width=\"40%\" align=\"left\"><strong>Dirección: </strong>  ";
        // line 95
        if ($this->getAttribute(($context["cl"] ?? $this->getContext($context, "cl")), "address", [])) {
            echo $this->getAttribute($this->getAttribute(($context["cl"] ?? $this->getContext($context, "cl")), "address", []), "direccion", []);
        }
        echo "</td>
                    </tr>
                    ";
        // line 97
        if (($context["isNota"] ?? $this->getContext($context, "isNota"))) {
            // line 98
            echo "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Tipo Doc. Ref.: </strong>  ";
            // line 99
            echo $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "tipDocAfectado", []), "01");
            echo "</td>
                        <td width=\"40%\" align=\"left\"><strong>Documento Ref.: </strong>  ";
            // line 100
            echo $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "numDocfectado", []);
            echo "</td>
                    </tr>
                    ";
        }
        // line 103
        echo "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Tipo Moneda: </strong>  ";
        // line 104
        echo $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "tipoMoneda", []), "021");
        echo " </td>
                        <td width=\"40%\" align=\"left\">";
        // line 105
        if (($this->getAttribute(($context["doc"] ?? null), "compra", [], "any", true, true) && $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "compra", []))) {
            echo "<strong>O/C: </strong>  ";
            echo $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "compra", []);
        }
        echo "</td>
                    </tr>
                    ";
        // line 107
        if ($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "guias", [])) {
            // line 108
            echo "                    <tr>
                        <td width=\"60%\" align=\"left\"><strong>Guias: </strong>
                        ";
            // line 110
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "guias", []));
            foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                // line 111
                echo "                            ";
                echo $this->getAttribute($context["guia"], "nroDoc", []);
                echo "&nbsp;&nbsp;
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 112
            echo "</td>
                        <td width=\"40%\"></td>
                    </tr>
                    ";
        }
        // line 116
        echo "                    </tbody></table>
            </div><br>
            ";
        // line 118
        $context["moneda"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "tipoMoneda", []), "02");
        // line 119
        echo "            <div class=\"tabla_borde\">
                <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                    <tbody>
                        <tr>
                            <td align=\"center\" class=\"bold\">Cantidad</td>
                            <td align=\"center\" class=\"bold\">Código</td>
                            <td align=\"center\" class=\"bold\">Descripción</td>
                            <td align=\"center\" class=\"bold\">Valor Unitario</td>
                            <td align=\"center\" class=\"bold\">Valor Total</td>
                        </tr>
                        ";
        // line 129
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "details", []));
        foreach ($context['_seq'] as $context["_key"] => $context["det"]) {
            // line 130
            echo "                        <tr class=\"border_top\">
                            <td align=\"center\">
                                ";
            // line 132
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "cantidad", []));
            echo "
                                ";
            // line 133
            echo $this->getAttribute($context["det"], "unidad", []);
            echo "
                            </td>
                            <td align=\"center\">
                                ";
            // line 136
            echo $this->getAttribute($context["det"], "codProducto", []);
            echo "
                            </td>
                            <td align=\"center\" width=\"300px\">
                                <span>";
            // line 139
            echo $this->getAttribute($context["det"], "descripcion", []);
            echo "</span><br>
                            </td>
                            <td align=\"center\">
                                ";
            // line 142
            echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
            echo "
                                ";
            // line 143
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "mtoValorUnitario", []));
            echo "
                            </td>
                            <td align=\"center\">
                                ";
            // line 146
            echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
            echo "
                                ";
            // line 147
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["det"], "mtoValorVenta", []));
            echo "
                            </td>
                        </tr>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['det'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 151
        echo "                    </tbody>
                </table></div>
            <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                <tbody><tr>
                    <td width=\"50%\" valign=\"top\">
                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                            <tbody>
                            <tr>
                                <td colspan=\"4\">
                                    <br>
                                    <br>
                                    <span style=\"font-family:Tahoma, Geneva, sans-serif; font-size:12px\" text-align=\"center\"><strong>";
        // line 162
        echo $this->env->getRuntime('Greenter\Report\Filter\ResolveFilter')->getValueLegend($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "legends", []), "1000");
        echo "</strong></span>
                                    <br>
                                    <br>
                                    <strong>Información Adicional</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                            <tbody>
                            <tr class=\"border_top\">
                                <td width=\"30%\" style=\"font-size: 10px;\">
                                    LEYENDA:
                                </td>
                                <td width=\"70%\" style=\"font-size: 10px;\">
                                    <p>
                                        ";
        // line 178
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "legends", []));
        foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
            // line 179
            echo "                                        ";
            if (($this->getAttribute($context["leg"], "code", []) != "1000")) {
                // line 180
                echo "                                            ";
                echo $this->getAttribute($context["leg"], "value", []);
                echo "<br>
                                        ";
            }
            // line 182
            echo "                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 183
        echo "                                    </p>
                                </td>
                            </tr>
                            ";
        // line 186
        if (($context["isNota"] ?? $this->getContext($context, "isNota"))) {
            // line 187
            echo "                            <tr class=\"border_top\">
                                <td width=\"30%\" style=\"font-size: 10px;\">
                                    MOTIVO DE EMISIÓN:
                                </td>
                                <td width=\"70%\" style=\"font-size: 10px;\">
                                    ";
            // line 192
            echo $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "desMotivo", []);
            echo "
                                </td>
                            </tr>
                            ";
        }
        // line 196
        echo "                            ";
        if ($this->getAttribute($this->getAttribute(($context["params"] ?? null), "user", [], "any", false, true), "extras", [], "any", true, true)) {
            // line 197
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "user", []), "extras", []));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 198
                echo "                                    <tr class=\"border_top\">
                                        <td width=\"30%\" style=\"font-size: 10px;\">
                                            ";
                // line 200
                echo twig_upper_filter($this->env, $this->getAttribute($context["item"], "name", []));
                echo ":
                                        </td>
                                        <td width=\"70%\" style=\"font-size: 10px;\">
                                            ";
                // line 203
                echo $this->getAttribute($context["item"], "value", []);
                echo "
                                        </td>
                                    </tr>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 207
            echo "                            ";
        }
        // line 208
        echo "                            </tbody>
                        </table>
                        ";
        // line 210
        if (($context["isAnticipo"] ?? $this->getContext($context, "isAnticipo"))) {
            // line 211
            echo "                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\">
                            <tbody>
                            <tr>
                                <td>
                                    <br>
                                    <strong>Anticipo</strong>
                                    <br>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table width=\"100%\" border=\"0\" cellpadding=\"5\" cellspacing=\"0\" style=\"font-size: 10px;\">
                            <tbody>
                            <tr>
                                <td width=\"30%\"><b>Nro. Doc.</b></td>
                                <td width=\"70%\"><b>Total</b></td>
                            </tr>
                            ";
            // line 228
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "anticipos", []));
            foreach ($context['_seq'] as $context["_key"] => $context["atp"]) {
                // line 229
                echo "                            <tr class=\"border_top\">
                                <td width=\"30%\">";
                // line 230
                echo $this->getAttribute($context["atp"], "nroDocRel", []);
                echo "</td>
                                <td width=\"70%\">";
                // line 231
                echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
                echo " ";
                echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute($context["atp"], "total", []));
                echo "</td>
                            </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atp'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 234
            echo "                            </tbody>
                        </table>
                        ";
        }
        // line 237
        echo "                    </td>
                    <td width=\"50%\" valign=\"top\">
                        <br>
                        <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-valores-totales\">
                            <tbody>
                            ";
        // line 242
        if (($context["isAnticipo"] ?? $this->getContext($context, "isAnticipo"))) {
            // line 243
            echo "                                <tr class=\"border_bottom\">
                                    <td align=\"right\"><strong>Total Anticipo:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 245
            echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "totalAnticipos", []));
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 248
        echo "                            ";
        if ($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoOperGravadas", [])) {
            // line 249
            echo "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Gravadas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 251
            echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoOperGravadas", []));
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 254
        echo "                            ";
        if ($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoOperInafectas", [])) {
            // line 255
            echo "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Inafectas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 257
            echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoOperInafectas", []));
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 260
        echo "                            ";
        if ($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoOperExoneradas", [])) {
            // line 261
            echo "                            <tr class=\"border_bottom\">
                                <td align=\"right\"><strong>Op. Exoneradas:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 263
            echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoOperExoneradas", []));
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 266
        echo "                            <tr>
                                <td align=\"right\"><strong>I.G.V. ";
        // line 267
        if ($this->getAttribute($this->getAttribute(($context["params"] ?? null), "user", [], "any", false, true), "numIGV", [], "any", true, true)) {
            echo " ";
            echo $this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "user", []), "numIGV", []);
        }
        echo "%:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
        // line 268
        echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
        echo "  ";
        echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoIGV", []));
        echo "</span></td>
                            </tr>
                            ";
        // line 270
        if ($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoISC", [])) {
            // line 271
            echo "                            <tr>
                                <td align=\"right\"><strong>I.S.C.:</strong></td>
                                <td width=\"120\" align=\"right\"><span>";
            // line 273
            echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoISC", []));
            echo "</span></td>
                            </tr>
                            ";
        }
        // line 276
        echo "                            ";
        if ($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "sumOtrosCargos", [])) {
            // line 277
            echo "                                <tr>
                                    <td align=\"right\"><strong>Otros Cargos:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 279
            echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "sumOtrosCargos", []));
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 282
        echo "                            ";
        if ($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoOtrosTributos", [])) {
            // line 283
            echo "                                <tr>
                                    <td align=\"right\"><strong>Otros Tributos:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 285
            echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoOtrosTributos", []));
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 288
        echo "                            <tr>
                                <td align=\"right\"><strong>Precio Venta:</strong></td>
                                <td width=\"120\" align=\"right\"><span id=\"ride-importeTotal\" class=\"ride-importeTotal\">";
        // line 290
        echo ($context["moneda"] ?? $this->getContext($context, "moneda"));
        echo "  ";
        echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "mtoImpVenta", []));
        echo "</span></td>
                            </tr>
                            ";
        // line 292
        if (($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "perception", []) && $this->getAttribute($this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "perception", []), "mto", []))) {
            // line 293
            echo "                                ";
            $context["perc"] = $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "perception", []);
            // line 294
            echo "                                ";
            $context["soles"] = $this->env->getRuntime('Greenter\Report\Filter\DocumentFilter')->getValueCatalog("PEN", "02");
            // line 295
            echo "                                <tr>
                                    <td align=\"right\"><strong>Percepción:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 297
            echo ($context["soles"] ?? $this->getContext($context, "soles"));
            echo "  ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["perc"] ?? $this->getContext($context, "perc")), "mto", []));
            echo "</span></td>
                                </tr>
                                <tr>
                                    <td align=\"right\"><strong>Total a Pagar:</strong></td>
                                    <td width=\"120\" align=\"right\"><span>";
            // line 301
            echo ($context["soles"] ?? $this->getContext($context, "soles"));
            echo " ";
            echo $this->env->getRuntime('Greenter\Report\Filter\FormatFilter')->number($this->getAttribute(($context["perc"] ?? $this->getContext($context, "perc")), "mtoTotal", []));
            echo "</span></td>
                                </tr>
                            ";
        }
        // line 304
        echo "                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody></table>
            <br>
            <br>
            ";
        // line 311
        if (((isset($context["max_items"]) || array_key_exists("max_items", $context)) && (twig_length_filter($this->env, $this->getAttribute(($context["doc"] ?? $this->getContext($context, "doc")), "details", [])) > ($context["max_items"] ?? $this->getContext($context, "max_items"))))) {
            // line 312
            echo "                <div style=\"page-break-after:always;\"></div>
            ";
        }
        // line 314
        echo "            <div>
                <hr style=\"display: block; height: 1px; border: 0; border-top: 1px solid #666; margin: 20px 0; padding: 0;\"><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
                    <tbody><tr>
                        <td width=\"85%\">
                            <blockquote>
                                ";
        // line 319
        if ($this->getAttribute($this->getAttribute(($context["params"] ?? null), "user", [], "any", false, true), "footer", [], "any", true, true)) {
            // line 320
            echo "                                    ";
            echo $this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "user", []), "footer", []);
            echo "
                                ";
        }
        // line 322
        echo "                                ";
        if (($this->getAttribute($this->getAttribute(($context["params"] ?? null), "system", [], "any", false, true), "hash", [], "any", true, true) && $this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "system", []), "hash", []))) {
            // line 323
            echo "                                    <strong>Resumen:</strong>   ";
            echo $this->getAttribute($this->getAttribute(($context["params"] ?? $this->getContext($context, "params")), "system", []), "hash", []);
            echo "<br>
                                ";
        }
        // line 325
        echo "                                <span>Representación Impresa de la ";
        echo ($context["name"] ?? $this->getContext($context, "name"));
        echo " ELECTRÓNICA.</span>
                            </blockquote>
                        </td>
                        <td width=\"15%\" align=\"right\">
                            <img src=\"";
        // line 329
        echo $this->env->getRuntime('Greenter\Report\Filter\ImageFilter')->toBase64($this->env->getRuntime('Greenter\Report\Render\QrRender')->getImage(($context["doc"] ?? $this->getContext($context, "doc"))), "png");
        echo "\" alt=\"Qr Image\">
                        </td>
                    </tr>
                    </tbody></table>
            </div>
        </td>
    </tr>
    </tbody></table>
</body></html>
";
    }

    public function getTemplateName()
    {
        return "invoice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  691 => 329,  683 => 325,  677 => 323,  674 => 322,  668 => 320,  666 => 319,  659 => 314,  655 => 312,  653 => 311,  644 => 304,  636 => 301,  627 => 297,  623 => 295,  620 => 294,  617 => 293,  615 => 292,  608 => 290,  604 => 288,  596 => 285,  592 => 283,  589 => 282,  581 => 279,  577 => 277,  574 => 276,  566 => 273,  562 => 271,  560 => 270,  553 => 268,  546 => 267,  543 => 266,  535 => 263,  531 => 261,  528 => 260,  520 => 257,  516 => 255,  513 => 254,  505 => 251,  501 => 249,  498 => 248,  490 => 245,  486 => 243,  484 => 242,  477 => 237,  472 => 234,  461 => 231,  457 => 230,  454 => 229,  450 => 228,  431 => 211,  429 => 210,  425 => 208,  422 => 207,  412 => 203,  406 => 200,  402 => 198,  397 => 197,  394 => 196,  387 => 192,  380 => 187,  378 => 186,  373 => 183,  367 => 182,  361 => 180,  358 => 179,  354 => 178,  335 => 162,  322 => 151,  312 => 147,  308 => 146,  302 => 143,  298 => 142,  292 => 139,  286 => 136,  280 => 133,  276 => 132,  272 => 130,  268 => 129,  256 => 119,  254 => 118,  250 => 116,  244 => 112,  235 => 111,  231 => 110,  227 => 108,  225 => 107,  217 => 105,  213 => 104,  210 => 103,  204 => 100,  200 => 99,  197 => 98,  195 => 97,  188 => 95,  185 => 94,  179 => 92,  176 => 91,  170 => 90,  166 => 89,  157 => 85,  153 => 84,  149 => 82,  147 => 81,  135 => 72,  127 => 67,  119 => 62,  103 => 49,  93 => 44,  85 => 39,  70 => 27,  59 => 19,  51 => 13,  49 => 12,  47 => 11,  45 => 10,  43 => 9,  38 => 6,  36 => 5,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "invoice.html.twig", "C:\\xampp\\htdocs\\slim\\vendor\\greenter\\report\\src\\Report\\Templates\\invoice.html.twig");
    }
}
