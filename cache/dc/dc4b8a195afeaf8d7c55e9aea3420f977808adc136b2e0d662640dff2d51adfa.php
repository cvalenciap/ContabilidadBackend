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

/* notacr2.1.xml.twig */
class __TwigTemplate_a0a9448980473e3426be76e8f218fee242fee1af275551df18760b593c279b60 extends \Twig\Template
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
        echo "<?xml version=\"1.0\" encoding=\"utf-8\" standalone=\"no\"?>
<CreditNote xmlns=\"urn:oasis:names:specification:ubl:schema:xsd:CreditNote-2\"
            xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\"
            xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\"
            xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\"
            xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    <cbc:UBLVersionID>2.1</cbc:UBLVersionID>
    <cbc:CustomizationID>2.0</cbc:CustomizationID>
    <cbc:ID>";
        // line 14
        echo $this->getAttribute(($context["doc"] ?? null), "serie", []);
        echo "-";
        echo $this->getAttribute(($context["doc"] ?? null), "correlativo", []);
        echo "</cbc:ID>
    <cbc:IssueDate>";
        // line 15
        echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? null), "fechaEmision", []), "Y-m-d");
        echo "</cbc:IssueDate>
    <cbc:IssueTime>";
        // line 16
        echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? null), "fechaEmision", []), "H:i:s");
        echo "</cbc:IssueTime>
    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "legends", []));
        foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
            // line 18
            echo "<cbc:Note languageLocaleID=\"";
            echo $this->getAttribute($context["leg"], "code", []);
            echo "\"><![CDATA[";
            echo $this->getAttribute($context["leg"], "value", []);
            echo "]]></cbc:Note>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leg'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "<cbc:DocumentCurrencyCode>";
        echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
        echo "</cbc:DocumentCurrencyCode>
    <cac:DiscrepancyResponse>
        <cbc:ReferenceID>";
        // line 22
        echo $this->getAttribute(($context["doc"] ?? null), "numDocfectado", []);
        echo "</cbc:ReferenceID>
        <cbc:ResponseCode>";
        // line 23
        echo $this->getAttribute(($context["doc"] ?? null), "codMotivo", []);
        echo "</cbc:ResponseCode>
        <cbc:Description>";
        // line 24
        echo $this->getAttribute(($context["doc"] ?? null), "desMotivo", []);
        echo "</cbc:Description>
    </cac:DiscrepancyResponse>
    ";
        // line 26
        if ($this->getAttribute(($context["doc"] ?? null), "compra", [])) {
            // line 27
            echo "<cac:OrderReference>
        <cbc:ID>";
            // line 28
            echo $this->getAttribute(($context["doc"] ?? null), "compra", []);
            echo "</cbc:ID>
    </cac:OrderReference>
    ";
        }
        // line 31
        echo "<cac:BillingReference>
        <cac:InvoiceDocumentReference>
            <cbc:ID>";
        // line 33
        echo $this->getAttribute(($context["doc"] ?? null), "numDocfectado", []);
        echo "</cbc:ID>
            <cbc:DocumentTypeCode>";
        // line 34
        echo $this->getAttribute(($context["doc"] ?? null), "tipDocAfectado", []);
        echo "</cbc:DocumentTypeCode>
        </cac:InvoiceDocumentReference>
    </cac:BillingReference>
    ";
        // line 37
        if ($this->getAttribute(($context["doc"] ?? null), "guias", [])) {
            // line 38
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "guias", []));
            foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                // line 39
                echo "<cac:DespatchDocumentReference>
        <cbc:ID>";
                // line 40
                echo $this->getAttribute($context["guia"], "nroDoc", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 41
                echo $this->getAttribute($context["guia"], "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
    </cac:DespatchDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 45
        if ($this->getAttribute(($context["doc"] ?? null), "relDocs", [])) {
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "relDocs", []));
            foreach ($context['_seq'] as $context["_key"] => $context["rel"]) {
                // line 47
                echo "<cac:AdditionalDocumentReference>
        <cbc:ID>";
                // line 48
                echo $this->getAttribute($context["rel"], "nroDoc", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 49
                echo $this->getAttribute($context["rel"], "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
    </cac:AdditionalDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 53
        $context["emp"] = $this->getAttribute(($context["doc"] ?? null), "company", []);
        // line 54
        echo "<cac:Signature>
        <cbc:ID>";
        // line 55
        echo $this->getAttribute(($context["emp"] ?? null), "ruc", []);
        echo "</cbc:ID>
        <cbc:Note>GREENTER</cbc:Note>
        <cac:SignatoryParty>
            <cac:PartyIdentification>
                <cbc:ID>";
        // line 59
        echo $this->getAttribute(($context["emp"] ?? null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 62
        echo $this->getAttribute(($context["emp"] ?? null), "nombreComercial", []);
        echo "]]></cbc:Name>
            </cac:PartyName>
        </cac:SignatoryParty>
        <cac:DigitalSignatureAttachment>
            <cac:ExternalReference>
                <cbc:URI>#SIGN-GREEN</cbc:URI>
            </cac:ExternalReference>
        </cac:DigitalSignatureAttachment>
    </cac:Signature>
    <cac:AccountingSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">";
        // line 74
        echo $this->getAttribute(($context["emp"] ?? null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 77
        echo $this->getAttribute(($context["emp"] ?? null), "nombreComercial", []);
        echo "]]></cbc:Name>
            </cac:PartyName>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 80
        echo $this->getAttribute(($context["emp"] ?? null), "razonSocial", []);
        echo "]]></cbc:RegistrationName>
                ";
        // line 81
        $context["addr"] = $this->getAttribute(($context["emp"] ?? null), "address", []);
        // line 82
        echo "<cac:RegistrationAddress>
                    <cbc:ID>";
        // line 83
        echo $this->getAttribute(($context["addr"] ?? null), "ubigueo", []);
        echo "</cbc:ID>
                    <cbc:AddressTypeCode>";
        // line 84
        echo $this->getAttribute(($context["addr"] ?? null), "codLocal", []);
        echo "</cbc:AddressTypeCode>
                    ";
        // line 85
        if ($this->getAttribute(($context["addr"] ?? null), "urbanizacion", [])) {
            // line 86
            echo "<cbc:CitySubdivisionName>";
            echo $this->getAttribute(($context["addr"] ?? null), "urbanizacion", []);
            echo "</cbc:CitySubdivisionName>
                    ";
        }
        // line 88
        echo "<cbc:CityName>";
        echo $this->getAttribute(($context["addr"] ?? null), "provincia", []);
        echo "</cbc:CityName>
                    <cbc:CountrySubentity>";
        // line 89
        echo $this->getAttribute(($context["addr"] ?? null), "departamento", []);
        echo "</cbc:CountrySubentity>
                    <cbc:District>";
        // line 90
        echo $this->getAttribute(($context["addr"] ?? null), "distrito", []);
        echo "</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
        // line 92
        echo $this->getAttribute(($context["addr"] ?? null), "direccion", []);
        echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
        // line 95
        echo $this->getAttribute(($context["addr"] ?? null), "codigoPais", []);
        echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
            </cac:PartyLegalEntity>
            ";
        // line 99
        if (($this->getAttribute(($context["emp"] ?? null), "email", []) || $this->getAttribute(($context["emp"] ?? null), "telephone", []))) {
            // line 100
            echo "<cac:Contact>
                    ";
            // line 101
            if ($this->getAttribute(($context["emp"] ?? null), "telephone", [])) {
                // line 102
                echo "<cbc:Telephone>";
                echo $this->getAttribute(($context["emp"] ?? null), "telephone", []);
                echo "</cbc:Telephone>
                    ";
            }
            // line 104
            if ($this->getAttribute(($context["emp"] ?? null), "email", [])) {
                // line 105
                echo "<cbc:ElectronicMail>";
                echo $this->getAttribute(($context["emp"] ?? null), "email", []);
                echo "</cbc:ElectronicMail>
                    ";
            }
            // line 107
            echo "</cac:Contact>
            ";
        }
        // line 109
        echo "</cac:Party>
    </cac:AccountingSupplierParty>
    ";
        // line 111
        $context["client"] = $this->getAttribute(($context["doc"] ?? null), "client", []);
        // line 112
        echo "<cac:AccountingCustomerParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"";
        // line 115
        echo $this->getAttribute(($context["client"] ?? null), "tipoDoc", []);
        echo "\">";
        echo $this->getAttribute(($context["client"] ?? null), "numDoc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 118
        echo $this->getAttribute(($context["client"] ?? null), "rznSocial", []);
        echo "]]></cbc:RegistrationName>
                ";
        // line 119
        if ($this->getAttribute(($context["client"] ?? null), "address", [])) {
            // line 120
            $context["addr"] = $this->getAttribute(($context["client"] ?? null), "address", []);
            // line 121
            echo "<cac:RegistrationAddress>
                        ";
            // line 122
            if ($this->getAttribute(($context["addr"] ?? null), "ubigueo", [])) {
                // line 123
                echo "<cbc:ID>";
                echo $this->getAttribute(($context["addr"] ?? null), "ubigueo", []);
                echo "</cbc:ID>
                        ";
            }
            // line 125
            echo "<cac:AddressLine>
                            <cbc:Line><![CDATA[";
            // line 126
            echo $this->getAttribute(($context["addr"] ?? null), "direccion", []);
            echo "]]></cbc:Line>
                        </cac:AddressLine>
                        <cac:Country>
                            <cbc:IdentificationCode>";
            // line 129
            echo $this->getAttribute(($context["addr"] ?? null), "codigoPais", []);
            echo "</cbc:IdentificationCode>
                        </cac:Country>
                    </cac:RegistrationAddress>
                ";
        }
        // line 133
        echo "</cac:PartyLegalEntity>
            ";
        // line 134
        if (($this->getAttribute(($context["client"] ?? null), "email", []) || $this->getAttribute(($context["client"] ?? null), "telephone", []))) {
            // line 135
            echo "<cac:Contact>
                    ";
            // line 136
            if ($this->getAttribute(($context["client"] ?? null), "telephone", [])) {
                // line 137
                echo "<cbc:Telephone>";
                echo $this->getAttribute(($context["client"] ?? null), "telephone", []);
                echo "</cbc:Telephone>
                    ";
            }
            // line 139
            if ($this->getAttribute(($context["client"] ?? null), "email", [])) {
                // line 140
                echo "<cbc:ElectronicMail>";
                echo $this->getAttribute(($context["client"] ?? null), "email", []);
                echo "</cbc:ElectronicMail>
                    ";
            }
            // line 142
            echo "</cac:Contact>
            ";
        }
        // line 144
        echo "</cac:Party>
    </cac:AccountingCustomerParty>
    <cac:TaxTotal>
        <cbc:TaxAmount currencyID=\"";
        // line 147
        echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "totalImpuestos", [])]);
        echo "</cbc:TaxAmount>
        ";
        // line 148
        if ($this->getAttribute(($context["doc"] ?? null), "mtoISC", [])) {
            // line 149
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 150
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoBaseIsc", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 151
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoISC", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Name>ISC</cbc:Name>
                        <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 161
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOperGravadas", [])) {
            // line 162
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 163
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOperGravadas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 164
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoIGV", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>1000</cbc:ID>
                        <cbc:Name>IGV</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 174
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOperInafectas", [])) {
            // line 175
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 176
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOperInafectas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 177
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9998</cbc:ID>
                        <cbc:Name>INA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 187
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOperExoneradas", [])) {
            // line 188
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 189
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOperExoneradas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 190
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9997</cbc:ID>
                        <cbc:Name>EXO</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 200
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOperGratuitas", [])) {
            // line 201
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 202
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOperGratuitas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 203
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9996</cbc:ID>
                        <cbc:Name>GRA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 213
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOperExportacion", [])) {
            // line 214
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 215
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOperExportacion", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 216
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9995</cbc:ID>
                        <cbc:Name>EXP</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 226
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOtrosTributos", [])) {
            // line 227
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 228
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoBaseOth", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 229
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOtrosTributos", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9999</cbc:ID>
                        <cbc:Name>OTROS</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
        }
        // line 239
        echo "</cac:TaxTotal>
    <cac:LegalMonetaryTotal>
        ";
        // line 241
        if ($this->getAttribute(($context["doc"] ?? null), "sumOtrosCargos", [])) {
            // line 242
            echo "<cbc:ChargeTotalAmount currencyID=\"";
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "sumOtrosCargos", [])]);
            echo "</cbc:ChargeTotalAmount>
        ";
        }
        // line 244
        echo "<cbc:PayableAmount currencyID=\"";
        echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoImpVenta", [])]);
        echo "</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>
    ";
        // line 246
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "details", []));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["detail"]) {
            // line 247
            echo "<cac:CreditNoteLine>
        <cbc:ID>";
            // line 248
            echo $this->getAttribute($context["loop"], "index", []);
            echo "</cbc:ID>
        <cbc:CreditedQuantity unitCode=\"";
            // line 249
            echo $this->getAttribute($context["detail"], "unidad", []);
            echo "\">";
            echo $this->getAttribute($context["detail"], "cantidad", []);
            echo "</cbc:CreditedQuantity>
        <cbc:LineExtensionAmount currencyID=\"";
            // line 250
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorVenta", [])]);
            echo "</cbc:LineExtensionAmount>
        <cac:PricingReference>
            ";
            // line 252
            if ($this->getAttribute($context["detail"], "mtoValorGratuito", [])) {
                // line 253
                echo "<cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 254
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorGratuito", []), 6]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>02</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            } else {
                // line 258
                echo "<cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 259
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoPrecioUnitario", []), 6]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            }
            // line 263
            echo "</cac:PricingReference>
        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
            // line 265
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "totalImpuestos", [])]);
            echo "</cbc:TaxAmount>
            ";
            // line 266
            if ($this->getAttribute($context["detail"], "isc", [])) {
                // line 267
                echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 268
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseIsc", [])]);
                echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 269
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "isc", [])]);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
                // line 271
                echo $this->getAttribute($context["detail"], "porcentajeIsc", []);
                echo "</cbc:Percent>
                    <cbc:TierRange>";
                // line 272
                echo $this->getAttribute($context["detail"], "tipSisIsc", []);
                echo "</cbc:TierRange>
                    <cac:TaxScheme>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Name>ISC</cbc:Name>
                        <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            }
            // line 281
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 282
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseIgv", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 283
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "igv", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
            // line 285
            echo $this->getAttribute($context["detail"], "porcentajeIgv", []);
            echo "</cbc:Percent>
                    <cbc:TaxExemptionReasonCode>";
            // line 286
            echo $this->getAttribute($context["detail"], "tipAfeIgv", []);
            echo "</cbc:TaxExemptionReasonCode>
                    ";
            // line 287
            $context["afect"] = Greenter\Xml\Filter\TributoFunction::getByAfectacion($this->getAttribute($context["detail"], "tipAfeIgv", []));
            // line 288
            echo "<cac:TaxScheme>
                        <cbc:ID>";
            // line 289
            echo $this->getAttribute(($context["afect"] ?? null), "id", []);
            echo "</cbc:ID>
                        <cbc:Name>";
            // line 290
            echo $this->getAttribute(($context["afect"] ?? null), "name", []);
            echo "</cbc:Name>
                        <cbc:TaxTypeCode>";
            // line 291
            echo $this->getAttribute(($context["afect"] ?? null), "code", []);
            echo "</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            // line 295
            if ($this->getAttribute($context["detail"], "otroTributo", [])) {
                // line 296
                echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 297
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseOth", [])]);
                echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 298
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "otroTributo", [])]);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
                // line 300
                echo $this->getAttribute($context["detail"], "porcentajeOth", []);
                echo "</cbc:Percent>
                    <cac:TaxScheme>
                        <cbc:ID>9999</cbc:ID>
                        <cbc:Name>OTROS</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            }
            // line 309
            echo "</cac:TaxTotal>
        <cac:Item>
            <cbc:Description><![CDATA[";
            // line 311
            echo $this->getAttribute($context["detail"], "descripcion", []);
            echo "]]></cbc:Description>
            ";
            // line 312
            if ($this->getAttribute($context["detail"], "codProducto", [])) {
                // line 313
                echo "<cac:SellersItemIdentification>
                    <cbc:ID>";
                // line 314
                echo $this->getAttribute($context["detail"], "codProducto", []);
                echo "</cbc:ID>
                </cac:SellersItemIdentification>
            ";
            }
            // line 317
            if ($this->getAttribute($context["detail"], "codProdSunat", [])) {
                // line 318
                echo "<cac:CommodityClassification>
                    <cbc:ItemClassificationCode>";
                // line 319
                echo $this->getAttribute($context["detail"], "codProdSunat", []);
                echo "</cbc:ItemClassificationCode>
                </cac:CommodityClassification>
            ";
            }
            // line 322
            if ($this->getAttribute($context["detail"], "codProdGS1", [])) {
                // line 323
                echo "<cac:StandardItemIdentification>
                    <cbc:ID>";
                // line 324
                echo $this->getAttribute($context["detail"], "codProdGS1", []);
                echo "</cbc:ID>
                </cac:StandardItemIdentification>
            ";
            }
            // line 327
            if ($this->getAttribute($context["detail"], "atributos", [])) {
                // line 328
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "atributos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["atr"]) {
                    // line 329
                    echo "<cac:AdditionalItemProperty >
                        <cbc:Name>";
                    // line 330
                    echo $this->getAttribute($context["atr"], "name", []);
                    echo "</cbc:Name>
                        <cbc:NameCode>";
                    // line 331
                    echo $this->getAttribute($context["atr"], "code", []);
                    echo "</cbc:NameCode>
                        ";
                    // line 332
                    if ($this->getAttribute($context["atr"], "value", [])) {
                        // line 333
                        echo "<cbc:Value>";
                        echo $this->getAttribute($context["atr"], "value", []);
                        echo "</cbc:Value>
                        ";
                    }
                    // line 335
                    if ((($this->getAttribute($context["atr"], "fecInicio", []) || $this->getAttribute($context["atr"], "fecFin", [])) || $this->getAttribute($context["atr"], "duracion", []))) {
                        // line 336
                        echo "<cac:UsabilityPeriod>
                                ";
                        // line 337
                        if ($this->getAttribute($context["atr"], "fecInicio", [])) {
                            // line 338
                            echo "<cbc:StartDate>";
                            echo twig_date_format_filter($this->env, $this->getAttribute($context["atr"], "fecInicio", []), "Y-m-d");
                            echo "</cbc:StartDate>
                                ";
                        }
                        // line 340
                        if ($this->getAttribute($context["atr"], "fecFin", [])) {
                            // line 341
                            echo "<cbc:EndDate>";
                            echo twig_date_format_filter($this->env, $this->getAttribute($context["atr"], "fecFin", []), "Y-m-d");
                            echo "</cbc:EndDate>
                                ";
                        }
                        // line 343
                        if ($this->getAttribute($context["atr"], "duracion", [])) {
                            // line 344
                            echo "<cbc:DurationMeasure unitCode=\"DAY\">";
                            echo $this->getAttribute($context["atr"], "duracion", []);
                            echo "</cbc:DurationMeasure>
                                ";
                        }
                        // line 346
                        echo "</cac:UsabilityPeriod>
                        ";
                    }
                    // line 348
                    echo "</cac:AdditionalItemProperty>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atr'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 351
            echo "</cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID=\"";
            // line 353
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorUnitario", []), 6]);
            echo "</cbc:PriceAmount>
        </cac:Price>
    </cac:CreditNoteLine>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['detail'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 357
        echo "</CreditNote>";
    }

    public function getTemplateName()
    {
        return "notacr2.1.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  887 => 357,  867 => 353,  863 => 351,  855 => 348,  851 => 346,  845 => 344,  843 => 343,  837 => 341,  835 => 340,  829 => 338,  827 => 337,  824 => 336,  822 => 335,  816 => 333,  814 => 332,  810 => 331,  806 => 330,  803 => 329,  799 => 328,  797 => 327,  791 => 324,  788 => 323,  786 => 322,  780 => 319,  777 => 318,  775 => 317,  769 => 314,  766 => 313,  764 => 312,  760 => 311,  756 => 309,  744 => 300,  737 => 298,  731 => 297,  728 => 296,  726 => 295,  719 => 291,  715 => 290,  711 => 289,  708 => 288,  706 => 287,  702 => 286,  698 => 285,  691 => 283,  685 => 282,  682 => 281,  670 => 272,  666 => 271,  659 => 269,  653 => 268,  650 => 267,  648 => 266,  642 => 265,  638 => 263,  629 => 259,  626 => 258,  617 => 254,  614 => 253,  612 => 252,  605 => 250,  599 => 249,  595 => 248,  592 => 247,  575 => 246,  567 => 244,  559 => 242,  557 => 241,  553 => 239,  538 => 229,  532 => 228,  529 => 227,  527 => 226,  514 => 216,  508 => 215,  505 => 214,  503 => 213,  490 => 203,  484 => 202,  481 => 201,  479 => 200,  466 => 190,  460 => 189,  457 => 188,  455 => 187,  442 => 177,  436 => 176,  433 => 175,  431 => 174,  416 => 164,  410 => 163,  407 => 162,  405 => 161,  390 => 151,  384 => 150,  381 => 149,  379 => 148,  373 => 147,  368 => 144,  364 => 142,  358 => 140,  356 => 139,  350 => 137,  348 => 136,  345 => 135,  343 => 134,  340 => 133,  333 => 129,  327 => 126,  324 => 125,  318 => 123,  316 => 122,  313 => 121,  311 => 120,  309 => 119,  305 => 118,  297 => 115,  292 => 112,  290 => 111,  286 => 109,  282 => 107,  276 => 105,  274 => 104,  268 => 102,  266 => 101,  263 => 100,  261 => 99,  254 => 95,  248 => 92,  243 => 90,  239 => 89,  234 => 88,  228 => 86,  226 => 85,  222 => 84,  218 => 83,  215 => 82,  213 => 81,  209 => 80,  203 => 77,  197 => 74,  182 => 62,  176 => 59,  169 => 55,  166 => 54,  164 => 53,  154 => 49,  150 => 48,  147 => 47,  143 => 46,  141 => 45,  131 => 41,  127 => 40,  124 => 39,  120 => 38,  118 => 37,  112 => 34,  108 => 33,  104 => 31,  98 => 28,  95 => 27,  93 => 26,  88 => 24,  84 => 23,  80 => 22,  74 => 20,  63 => 18,  59 => 17,  55 => 16,  51 => 15,  45 => 14,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "notacr2.1.xml.twig", "C:\\xampp\\htdocs\\slim\\vendor\\greenter\\xml\\src\\Xml\\Templates\\notacr2.1.xml.twig");
    }
}
