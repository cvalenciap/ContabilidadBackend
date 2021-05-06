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

/* invoice2.1.xml.twig */
class __TwigTemplate_74f277920d54b9846ca0a72da4d35f6bb5a935303decf690b7c1a6a735efb709 extends \Twig\Template
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
<Invoice xmlns=\"urn:oasis:names:specification:ubl:schema:xsd:Invoice-2\"
         xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\"
         xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\"
         xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\"
         xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    ";
        // line 12
        $context["emp"] = $this->getAttribute(($context["doc"] ?? null), "company", []);
        // line 13
        echo "<cbc:UBLVersionID>2.1</cbc:UBLVersionID>
    <cbc:CustomizationID>2.0</cbc:CustomizationID>
    <cbc:ID>";
        // line 15
        echo $this->getAttribute(($context["doc"] ?? null), "serie", []);
        echo "-";
        echo $this->getAttribute(($context["doc"] ?? null), "correlativo", []);
        echo "</cbc:ID>
    <cbc:IssueDate>";
        // line 16
        echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? null), "fechaEmision", []), "Y-m-d");
        echo "</cbc:IssueDate>
    <cbc:IssueTime>";
        // line 17
        echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? null), "fechaEmision", []), "H:i:s");
        echo "</cbc:IssueTime>
    ";
        // line 18
        if ($this->getAttribute(($context["doc"] ?? null), "fecVencimiento", [])) {
            // line 19
            echo "<cbc:DueDate>";
            echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? null), "fecVencimiento", []), "Y-m-d");
            echo "</cbc:DueDate>
    ";
        }
        // line 21
        echo "<cbc:InvoiceTypeCode listID=\"";
        echo $this->getAttribute(($context["doc"] ?? null), "tipoOperacion", []);
        echo "\">";
        echo $this->getAttribute(($context["doc"] ?? null), "tipoDoc", []);
        echo "</cbc:InvoiceTypeCode>
    ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "legends", []));
        foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
            // line 23
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
        // line 25
        echo "<cbc:DocumentCurrencyCode>";
        echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
        echo "</cbc:DocumentCurrencyCode>
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
        if ($this->getAttribute(($context["doc"] ?? null), "guias", [])) {
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "guias", []));
            foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                // line 33
                echo "<cac:DespatchDocumentReference>
        <cbc:ID>";
                // line 34
                echo $this->getAttribute($context["guia"], "nroDoc", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 35
                echo $this->getAttribute($context["guia"], "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
    </cac:DespatchDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 39
        if ($this->getAttribute(($context["doc"] ?? null), "relDocs", [])) {
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "relDocs", []));
            foreach ($context['_seq'] as $context["_key"] => $context["rel"]) {
                // line 41
                echo "<cac:AdditionalDocumentReference>
        <cbc:ID>";
                // line 42
                echo $this->getAttribute($context["rel"], "nroDoc", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 43
                echo $this->getAttribute($context["rel"], "tipoDoc", []);
                echo "</cbc:DocumentTypeCode>
    </cac:AdditionalDocumentReference>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 47
        if ($this->getAttribute(($context["doc"] ?? null), "anticipos", [])) {
            // line 48
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "anticipos", []));
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
            foreach ($context['_seq'] as $context["_key"] => $context["ant"]) {
                // line 49
                echo "<cac:AdditionalDocumentReference>
        <cbc:ID>";
                // line 50
                echo $this->getAttribute($context["ant"], "nroDocRel", []);
                echo "</cbc:ID>
        <cbc:DocumentTypeCode>";
                // line 51
                echo $this->getAttribute($context["ant"], "tipoDocRel", []);
                echo "</cbc:DocumentTypeCode>
        <cbc:DocumentStatusCode>";
                // line 52
                echo $this->getAttribute($context["loop"], "index", []);
                echo "</cbc:DocumentStatusCode>
        <cac:IssuerParty>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">";
                // line 55
                echo $this->getAttribute(($context["emp"] ?? null), "ruc", []);
                echo "</cbc:ID>
            </cac:PartyIdentification>
        </cac:IssuerParty>
    </cac:AdditionalDocumentReference>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ant'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 61
        echo "<cac:Signature>
        <cbc:ID>";
        // line 62
        echo $this->getAttribute(($context["emp"] ?? null), "ruc", []);
        echo "</cbc:ID>
        <cbc:Note>GREENTER</cbc:Note>
        <cac:SignatoryParty>
            <cac:PartyIdentification>
                <cbc:ID>";
        // line 66
        echo $this->getAttribute(($context["emp"] ?? null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 69
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
        // line 81
        echo $this->getAttribute(($context["emp"] ?? null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 84
        echo $this->getAttribute(($context["emp"] ?? null), "nombreComercial", []);
        echo "]]></cbc:Name>
            </cac:PartyName>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 87
        echo $this->getAttribute(($context["emp"] ?? null), "razonSocial", []);
        echo "]]></cbc:RegistrationName>
                ";
        // line 88
        $context["addr"] = $this->getAttribute(($context["emp"] ?? null), "address", []);
        // line 89
        echo "<cac:RegistrationAddress>
                    <cbc:ID>";
        // line 90
        echo $this->getAttribute(($context["addr"] ?? null), "ubigueo", []);
        echo "</cbc:ID>
                    <cbc:AddressTypeCode>";
        // line 91
        echo $this->getAttribute(($context["addr"] ?? null), "codLocal", []);
        echo "</cbc:AddressTypeCode>
                    ";
        // line 92
        if ($this->getAttribute(($context["addr"] ?? null), "urbanizacion", [])) {
            // line 93
            echo "<cbc:CitySubdivisionName>";
            echo $this->getAttribute(($context["addr"] ?? null), "urbanizacion", []);
            echo "</cbc:CitySubdivisionName>
                    ";
        }
        // line 95
        echo "<cbc:CityName>";
        echo $this->getAttribute(($context["addr"] ?? null), "provincia", []);
        echo "</cbc:CityName>
                    <cbc:CountrySubentity>";
        // line 96
        echo $this->getAttribute(($context["addr"] ?? null), "departamento", []);
        echo "</cbc:CountrySubentity>
                    <cbc:District>";
        // line 97
        echo $this->getAttribute(($context["addr"] ?? null), "distrito", []);
        echo "</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
        // line 99
        echo $this->getAttribute(($context["addr"] ?? null), "direccion", []);
        echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
        // line 102
        echo $this->getAttribute(($context["addr"] ?? null), "codigoPais", []);
        echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
            </cac:PartyLegalEntity>
            ";
        // line 106
        if (($this->getAttribute(($context["emp"] ?? null), "email", []) || $this->getAttribute(($context["emp"] ?? null), "telephone", []))) {
            // line 107
            echo "<cac:Contact>
                ";
            // line 108
            if ($this->getAttribute(($context["emp"] ?? null), "telephone", [])) {
                // line 109
                echo "<cbc:Telephone>";
                echo $this->getAttribute(($context["emp"] ?? null), "telephone", []);
                echo "</cbc:Telephone>
                ";
            }
            // line 111
            if ($this->getAttribute(($context["emp"] ?? null), "email", [])) {
                // line 112
                echo "<cbc:ElectronicMail>";
                echo $this->getAttribute(($context["emp"] ?? null), "email", []);
                echo "</cbc:ElectronicMail>
                ";
            }
            // line 114
            echo "</cac:Contact>
            ";
        }
        // line 116
        echo "</cac:Party>
    </cac:AccountingSupplierParty>
    ";
        // line 118
        $context["client"] = $this->getAttribute(($context["doc"] ?? null), "client", []);
        // line 119
        echo "<cac:AccountingCustomerParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"";
        // line 122
        echo $this->getAttribute(($context["client"] ?? null), "tipoDoc", []);
        echo "\">";
        echo $this->getAttribute(($context["client"] ?? null), "numDoc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 125
        echo $this->getAttribute(($context["client"] ?? null), "rznSocial", []);
        echo "]]></cbc:RegistrationName>
                ";
        // line 126
        if ($this->getAttribute(($context["client"] ?? null), "address", [])) {
            // line 127
            $context["addr"] = $this->getAttribute(($context["client"] ?? null), "address", []);
            // line 128
            echo "<cac:RegistrationAddress>
                    ";
            // line 129
            if ($this->getAttribute(($context["addr"] ?? null), "ubigueo", [])) {
                // line 130
                echo "<cbc:ID>";
                echo $this->getAttribute(($context["addr"] ?? null), "ubigueo", []);
                echo "</cbc:ID>
                    ";
            }
            // line 132
            echo "<cac:AddressLine>
                        <cbc:Line><![CDATA[";
            // line 133
            echo $this->getAttribute(($context["addr"] ?? null), "direccion", []);
            echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
            // line 136
            echo $this->getAttribute(($context["addr"] ?? null), "codigoPais", []);
            echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
                ";
        }
        // line 140
        echo "</cac:PartyLegalEntity>
            ";
        // line 141
        if (($this->getAttribute(($context["client"] ?? null), "email", []) || $this->getAttribute(($context["client"] ?? null), "telephone", []))) {
            // line 142
            echo "<cac:Contact>
                ";
            // line 143
            if ($this->getAttribute(($context["client"] ?? null), "telephone", [])) {
                // line 144
                echo "<cbc:Telephone>";
                echo $this->getAttribute(($context["client"] ?? null), "telephone", []);
                echo "</cbc:Telephone>
                ";
            }
            // line 146
            if ($this->getAttribute(($context["client"] ?? null), "email", [])) {
                // line 147
                echo "<cbc:ElectronicMail>";
                echo $this->getAttribute(($context["client"] ?? null), "email", []);
                echo "</cbc:ElectronicMail>
                ";
            }
            // line 149
            echo "</cac:Contact>
            ";
        }
        // line 151
        echo "</cac:Party>
    </cac:AccountingCustomerParty>
    ";
        // line 153
        $context["seller"] = $this->getAttribute(($context["doc"] ?? null), "seller", []);
        // line 154
        if (($context["seller"] ?? null)) {
            // line 155
            echo "<cac:SellerSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"";
            // line 158
            echo $this->getAttribute(($context["seller"] ?? null), "tipoDoc", []);
            echo "\">";
            echo $this->getAttribute(($context["seller"] ?? null), "numDoc", []);
            echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
            // line 161
            echo $this->getAttribute(($context["seller"] ?? null), "rznSocial", []);
            echo "]]></cbc:RegistrationName>
                ";
            // line 162
            if ($this->getAttribute(($context["seller"] ?? null), "address", [])) {
                // line 163
                $context["addr"] = $this->getAttribute(($context["seller"] ?? null), "address", []);
                // line 164
                echo "<cac:RegistrationAddress>
                    ";
                // line 165
                if ($this->getAttribute(($context["addr"] ?? null), "ubigueo", [])) {
                    // line 166
                    echo "<cbc:ID>";
                    echo $this->getAttribute(($context["addr"] ?? null), "ubigueo", []);
                    echo "</cbc:ID>
                    ";
                }
                // line 168
                echo "<cac:AddressLine>
                        <cbc:Line><![CDATA[";
                // line 169
                echo $this->getAttribute(($context["addr"] ?? null), "direccion", []);
                echo "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
                // line 172
                echo $this->getAttribute(($context["addr"] ?? null), "codigoPais", []);
                echo "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
                ";
            }
            // line 176
            echo "</cac:PartyLegalEntity>
            ";
            // line 177
            if (($this->getAttribute(($context["seller"] ?? null), "email", []) || $this->getAttribute(($context["seller"] ?? null), "telephone", []))) {
                // line 178
                echo "<cac:Contact>
                ";
                // line 179
                if ($this->getAttribute(($context["seller"] ?? null), "telephone", [])) {
                    // line 180
                    echo "<cbc:Telephone>";
                    echo $this->getAttribute(($context["seller"] ?? null), "telephone", []);
                    echo "</cbc:Telephone>
                ";
                }
                // line 182
                if ($this->getAttribute(($context["seller"] ?? null), "email", [])) {
                    // line 183
                    echo "<cbc:ElectronicMail>";
                    echo $this->getAttribute(($context["seller"] ?? null), "email", []);
                    echo "</cbc:ElectronicMail>
                ";
                }
                // line 185
                echo "</cac:Contact>
            ";
            }
            // line 187
            echo "</cac:Party>
    </cac:SellerSupplierParty>
    ";
        }
        // line 190
        if ($this->getAttribute(($context["doc"] ?? null), "detraccion", [])) {
            // line 191
            $context["detr"] = $this->getAttribute(($context["doc"] ?? null), "detraccion", []);
            // line 192
            echo "<cac:PaymentMeans>
        <cbc:PaymentMeansCode>";
            // line 193
            echo $this->getAttribute(($context["detr"] ?? null), "codMedioPago", []);
            echo "</cbc:PaymentMeansCode>
        <cac:PayeeFinancialAccount>
            <cbc:ID>";
            // line 195
            echo $this->getAttribute(($context["detr"] ?? null), "ctaBanco", []);
            echo "</cbc:ID>
        </cac:PayeeFinancialAccount>
    </cac:PaymentMeans>
    <cac:PaymentTerms>
        <cbc:PaymentMeansID>";
            // line 199
            echo $this->getAttribute(($context["detr"] ?? null), "codBienDetraccion", []);
            echo "</cbc:PaymentMeansID>
        <cbc:PaymentPercent>";
            // line 200
            echo $this->getAttribute(($context["detr"] ?? null), "percent", []);
            echo "</cbc:PaymentPercent>
        <cbc:Amount currencyID=\"PEN\">";
            // line 201
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["detr"] ?? null), "mount", [])]);
            echo "</cbc:Amount>
    </cac:PaymentTerms>
    ";
        }
        // line 204
        if ($this->getAttribute(($context["doc"] ?? null), "perception", [])) {
            // line 205
            echo "<cac:PaymentTerms>
        <cbc:ID>Percepcion</cbc:ID>
        <cbc:Amount currencyID=\"PEN\">";
            // line 207
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($this->getAttribute(($context["doc"] ?? null), "perception", []), "mtoTotal", [])]);
            echo "</cbc:Amount>
    </cac:PaymentTerms>
    ";
        }
        // line 210
        if ($this->getAttribute(($context["doc"] ?? null), "anticipos", [])) {
            // line 211
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "anticipos", []));
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
            foreach ($context['_seq'] as $context["_key"] => $context["ant"]) {
                // line 212
                echo "<cac:PrepaidPayment>
        <cbc:ID>";
                // line 213
                echo $this->getAttribute($context["loop"], "index", []);
                echo "</cbc:ID>
        <cbc:PaidAmount currencyID=\"";
                // line 214
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["ant"], "total", [])]);
                echo "</cbc:PaidAmount>
    </cac:PrepaidPayment>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ant'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 218
        if ($this->getAttribute(($context["doc"] ?? null), "cargos", [])) {
            // line 219
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "cargos", []));
            foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
                // line 220
                echo "<cac:AllowanceCharge>
        <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
                // line 222
                echo $this->getAttribute($context["cargo"], "codTipo", []);
                echo "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
                // line 223
                echo $this->getAttribute($context["cargo"], "factor", []);
                echo "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"";
                // line 224
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["cargo"], "monto", [])]);
                echo "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"";
                // line 225
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["cargo"], "montoBase", [])]);
                echo "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 229
        if ($this->getAttribute(($context["doc"] ?? null), "descuentos", [])) {
            // line 230
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["doc"] ?? null), "descuentos", []));
            foreach ($context['_seq'] as $context["_key"] => $context["desc"]) {
                // line 231
                echo "<cac:AllowanceCharge>
        <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
                // line 233
                echo $this->getAttribute($context["desc"], "codTipo", []);
                echo "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
                // line 234
                echo $this->getAttribute($context["desc"], "factor", []);
                echo "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"";
                // line 235
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["desc"], "monto", [])]);
                echo "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"";
                // line 236
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["desc"], "montoBase", [])]);
                echo "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desc'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 240
        if ($this->getAttribute(($context["doc"] ?? null), "perception", [])) {
            // line 241
            $context["perc"] = $this->getAttribute(($context["doc"] ?? null), "perception", []);
            // line 242
            echo "<cac:AllowanceCharge>
        <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
            // line 244
            echo $this->getAttribute(($context["perc"] ?? null), "codReg", []);
            echo "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
            // line 245
            echo $this->getAttribute(($context["perc"] ?? null), "porcentaje", []);
            echo "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"PEN\">";
            // line 246
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["perc"] ?? null), "mto", [])]);
            echo "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"PEN\">";
            // line 247
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["perc"] ?? null), "mtoBase", [])]);
            echo "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
        }
        // line 250
        echo "<cac:TaxTotal>
        <cbc:TaxAmount currencyID=\"";
        // line 251
        echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "totalImpuestos", [])]);
        echo "</cbc:TaxAmount>
        ";
        // line 252
        if ($this->getAttribute(($context["doc"] ?? null), "mtoISC", [])) {
            // line 253
            echo "<cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 254
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoBaseIsc", [])]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 255
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
        // line 265
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOperGravadas", [])) {
            // line 266
            echo "<cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 267
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOperGravadas", [])]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 268
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
        // line 278
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOperInafectas", [])) {
            // line 279
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 280
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOperInafectas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 281
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
        // line 291
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOperExoneradas", [])) {
            // line 292
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 293
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOperExoneradas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 294
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
        // line 304
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOperGratuitas", [])) {
            // line 305
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 306
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOperGratuitas", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 307
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
        // line 317
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOperExportacion", [])) {
            // line 318
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 319
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoOperExportacion", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 320
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
        // line 330
        if ($this->getAttribute(($context["doc"] ?? null), "mtoOtrosTributos", [])) {
            // line 331
            echo "<cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
            // line 332
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoBaseOth", [])]);
            echo "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
            // line 333
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
        // line 343
        echo "</cac:TaxTotal>
    <cac:LegalMonetaryTotal>
        <cbc:LineExtensionAmount currencyID=\"";
        // line 345
        echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "valorVenta", [])]);
        echo "</cbc:LineExtensionAmount>
        ";
        // line 346
        if ($this->getAttribute(($context["doc"] ?? null), "mtoDescuentos", [])) {
            // line 347
            echo "<cbc:AllowanceTotalAmount currencyID=\"";
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoDescuentos", [])]);
            echo "</cbc:AllowanceTotalAmount>
        ";
        }
        // line 349
        if ($this->getAttribute(($context["doc"] ?? null), "sumOtrosCargos", [])) {
            // line 350
            echo "<cbc:ChargeTotalAmount currencyID=\"";
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "sumOtrosCargos", [])]);
            echo "</cbc:ChargeTotalAmount>
        ";
        }
        // line 352
        if ($this->getAttribute(($context["doc"] ?? null), "totalAnticipos", [])) {
            // line 353
            echo "<cbc:PrepaidAmount currencyID=\"";
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "totalAnticipos", [])]);
            echo "</cbc:PrepaidAmount>
        ";
        }
        // line 355
        echo "<cbc:PayableAmount currencyID=\"";
        echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
        echo "\">";
        echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute(($context["doc"] ?? null), "mtoImpVenta", [])]);
        echo "</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>
    ";
        // line 357
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
            // line 358
            echo "<cac:InvoiceLine>
        <cbc:ID>";
            // line 359
            echo $this->getAttribute($context["loop"], "index", []);
            echo "</cbc:ID>
        <cbc:InvoicedQuantity unitCode=\"";
            // line 360
            echo $this->getAttribute($context["detail"], "unidad", []);
            echo "\">";
            echo $this->getAttribute($context["detail"], "cantidad", []);
            echo "</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID=\"";
            // line 361
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorVenta", [])]);
            echo "</cbc:LineExtensionAmount>
        <cac:PricingReference>
            ";
            // line 363
            if ($this->getAttribute($context["detail"], "mtoValorGratuito", [])) {
                // line 364
                echo "<cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 365
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorGratuito", []), 6]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>02</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            } else {
                // line 369
                echo "<cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 370
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoPrecioUnitario", []), 6]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            }
            // line 374
            echo "</cac:PricingReference>
        ";
            // line 375
            if ($this->getAttribute($context["detail"], "cargos", [])) {
                // line 376
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "cargos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
                    // line 377
                    echo "<cac:AllowanceCharge>
            <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>";
                    // line 379
                    echo $this->getAttribute($context["cargo"], "codTipo", []);
                    echo "</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>";
                    // line 380
                    echo $this->getAttribute($context["cargo"], "factor", []);
                    echo "</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"";
                    // line 381
                    echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                    echo "\">";
                    echo $this->getAttribute($context["cargo"], "monto", []);
                    echo "</cbc:Amount>
            <cbc:BaseAmount currencyID=\"";
                    // line 382
                    echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                    echo "\">";
                    echo $this->getAttribute($context["cargo"], "montoBase", []);
                    echo "</cbc:BaseAmount>
        </cac:AllowanceCharge>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 386
            if ($this->getAttribute($context["detail"], "descuentos", [])) {
                // line 387
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "descuentos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["desc"]) {
                    // line 388
                    echo "<cac:AllowanceCharge>
            <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>";
                    // line 390
                    echo $this->getAttribute($context["desc"], "codTipo", []);
                    echo "</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>";
                    // line 391
                    echo $this->getAttribute($context["desc"], "factor", []);
                    echo "</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"";
                    // line 392
                    echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                    echo "\">";
                    echo $this->getAttribute($context["desc"], "monto", []);
                    echo "</cbc:Amount>
            <cbc:BaseAmount currencyID=\"";
                    // line 393
                    echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                    echo "\">";
                    echo $this->getAttribute($context["desc"], "montoBase", []);
                    echo "</cbc:BaseAmount>
        </cac:AllowanceCharge>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desc'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 397
            echo "<cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
            // line 398
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "totalImpuestos", [])]);
            echo "</cbc:TaxAmount>
            ";
            // line 399
            if ($this->getAttribute($context["detail"], "isc", [])) {
                // line 400
                echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 401
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseIsc", [])]);
                echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 402
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "isc", [])]);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
                // line 404
                echo $this->getAttribute($context["detail"], "porcentajeIsc", []);
                echo "</cbc:Percent>
                    <cbc:TierRange>";
                // line 405
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
            // line 414
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 415
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseIgv", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 416
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "igv", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
            // line 418
            echo $this->getAttribute($context["detail"], "porcentajeIgv", []);
            echo "</cbc:Percent>
                    <cbc:TaxExemptionReasonCode>";
            // line 419
            echo $this->getAttribute($context["detail"], "tipAfeIgv", []);
            echo "</cbc:TaxExemptionReasonCode>
                    ";
            // line 420
            $context["afect"] = Greenter\Xml\Filter\TributoFunction::getByAfectacion($this->getAttribute($context["detail"], "tipAfeIgv", []));
            // line 421
            echo "<cac:TaxScheme>
                        <cbc:ID>";
            // line 422
            echo $this->getAttribute(($context["afect"] ?? null), "id", []);
            echo "</cbc:ID>
                        <cbc:Name>";
            // line 423
            echo $this->getAttribute(($context["afect"] ?? null), "name", []);
            echo "</cbc:Name>
                        <cbc:TaxTypeCode>";
            // line 424
            echo $this->getAttribute(($context["afect"] ?? null), "code", []);
            echo "</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            // line 428
            if ($this->getAttribute($context["detail"], "otroTributo", [])) {
                // line 429
                echo "<cac:TaxSubtotal>
                    <cbc:TaxableAmount currencyID=\"";
                // line 430
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseOth", [])]);
                echo "</cbc:TaxableAmount>
                    <cbc:TaxAmount currencyID=\"";
                // line 431
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "otroTributo", [])]);
                echo "</cbc:TaxAmount>
                    <cac:TaxCategory>
                        <cbc:Percent>";
                // line 433
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
            // line 442
            echo "</cac:TaxTotal>
        <cac:Item>
            <cbc:Description><![CDATA[";
            // line 444
            echo $this->getAttribute($context["detail"], "descripcion", []);
            echo "]]></cbc:Description>
            ";
            // line 445
            if ($this->getAttribute($context["detail"], "codProducto", [])) {
                // line 446
                echo "<cac:SellersItemIdentification>
                <cbc:ID>";
                // line 447
                echo $this->getAttribute($context["detail"], "codProducto", []);
                echo "</cbc:ID>
            </cac:SellersItemIdentification>
            ";
            }
            // line 450
            if ($this->getAttribute($context["detail"], "codProdSunat", [])) {
                // line 451
                echo "<cac:CommodityClassification>
                <cbc:ItemClassificationCode>";
                // line 452
                echo $this->getAttribute($context["detail"], "codProdSunat", []);
                echo "</cbc:ItemClassificationCode>
            </cac:CommodityClassification>
            ";
            }
            // line 455
            if ($this->getAttribute($context["detail"], "codProdGS1", [])) {
                // line 456
                echo "<cac:StandardItemIdentification>
                <cbc:ID>";
                // line 457
                echo $this->getAttribute($context["detail"], "codProdGS1", []);
                echo "</cbc:ID>
            </cac:StandardItemIdentification>
            ";
            }
            // line 460
            if ($this->getAttribute($context["detail"], "atributos", [])) {
                // line 461
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "atributos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["atr"]) {
                    // line 462
                    echo "<cac:AdditionalItemProperty >
                        <cbc:Name>";
                    // line 463
                    echo $this->getAttribute($context["atr"], "name", []);
                    echo "</cbc:Name>
                        <cbc:NameCode>";
                    // line 464
                    echo $this->getAttribute($context["atr"], "code", []);
                    echo "</cbc:NameCode>
                        ";
                    // line 465
                    if ($this->getAttribute($context["atr"], "value", [])) {
                        // line 466
                        echo "<cbc:Value>";
                        echo $this->getAttribute($context["atr"], "value", []);
                        echo "</cbc:Value>
                        ";
                    }
                    // line 468
                    if ((($this->getAttribute($context["atr"], "fecInicio", []) || $this->getAttribute($context["atr"], "fecFin", [])) || $this->getAttribute($context["atr"], "duracion", []))) {
                        // line 469
                        echo "<cac:UsabilityPeriod>
                                ";
                        // line 470
                        if ($this->getAttribute($context["atr"], "fecInicio", [])) {
                            // line 471
                            echo "<cbc:StartDate>";
                            echo twig_date_format_filter($this->env, $this->getAttribute($context["atr"], "fecInicio", []), "Y-m-d");
                            echo "</cbc:StartDate>
                                ";
                        }
                        // line 473
                        if ($this->getAttribute($context["atr"], "fecFin", [])) {
                            // line 474
                            echo "<cbc:EndDate>";
                            echo twig_date_format_filter($this->env, $this->getAttribute($context["atr"], "fecFin", []), "Y-m-d");
                            echo "</cbc:EndDate>
                                ";
                        }
                        // line 476
                        if ($this->getAttribute($context["atr"], "duracion", [])) {
                            // line 477
                            echo "<cbc:DurationMeasure unitCode=\"DAY\">";
                            echo $this->getAttribute($context["atr"], "duracion", []);
                            echo "</cbc:DurationMeasure>
                                ";
                        }
                        // line 479
                        echo "</cac:UsabilityPeriod>
                        ";
                    }
                    // line 481
                    echo "</cac:AdditionalItemProperty>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atr'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 484
            echo "</cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID=\"";
            // line 486
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorUnitario", []), 6]);
            echo "</cbc:PriceAmount>
        </cac:Price>
    </cac:InvoiceLine>
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
        // line 490
        echo "</Invoice>
";
    }

    public function getTemplateName()
    {
        return "invoice2.1.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1308 => 490,  1288 => 486,  1284 => 484,  1276 => 481,  1272 => 479,  1266 => 477,  1264 => 476,  1258 => 474,  1256 => 473,  1250 => 471,  1248 => 470,  1245 => 469,  1243 => 468,  1237 => 466,  1235 => 465,  1231 => 464,  1227 => 463,  1224 => 462,  1220 => 461,  1218 => 460,  1212 => 457,  1209 => 456,  1207 => 455,  1201 => 452,  1198 => 451,  1196 => 450,  1190 => 447,  1187 => 446,  1185 => 445,  1181 => 444,  1177 => 442,  1165 => 433,  1158 => 431,  1152 => 430,  1149 => 429,  1147 => 428,  1140 => 424,  1136 => 423,  1132 => 422,  1129 => 421,  1127 => 420,  1123 => 419,  1119 => 418,  1112 => 416,  1106 => 415,  1103 => 414,  1091 => 405,  1087 => 404,  1080 => 402,  1074 => 401,  1071 => 400,  1069 => 399,  1063 => 398,  1060 => 397,  1048 => 393,  1042 => 392,  1038 => 391,  1034 => 390,  1030 => 388,  1026 => 387,  1024 => 386,  1012 => 382,  1006 => 381,  1002 => 380,  998 => 379,  994 => 377,  990 => 376,  988 => 375,  985 => 374,  976 => 370,  973 => 369,  964 => 365,  961 => 364,  959 => 363,  952 => 361,  946 => 360,  942 => 359,  939 => 358,  922 => 357,  914 => 355,  906 => 353,  904 => 352,  896 => 350,  894 => 349,  886 => 347,  884 => 346,  878 => 345,  874 => 343,  859 => 333,  853 => 332,  850 => 331,  848 => 330,  835 => 320,  829 => 319,  826 => 318,  824 => 317,  811 => 307,  805 => 306,  802 => 305,  800 => 304,  787 => 294,  781 => 293,  778 => 292,  776 => 291,  763 => 281,  757 => 280,  754 => 279,  752 => 278,  737 => 268,  731 => 267,  728 => 266,  726 => 265,  711 => 255,  705 => 254,  702 => 253,  700 => 252,  694 => 251,  691 => 250,  685 => 247,  681 => 246,  677 => 245,  673 => 244,  669 => 242,  667 => 241,  665 => 240,  653 => 236,  647 => 235,  643 => 234,  639 => 233,  635 => 231,  631 => 230,  629 => 229,  617 => 225,  611 => 224,  607 => 223,  603 => 222,  599 => 220,  595 => 219,  593 => 218,  573 => 214,  569 => 213,  566 => 212,  549 => 211,  547 => 210,  541 => 207,  537 => 205,  535 => 204,  529 => 201,  525 => 200,  521 => 199,  514 => 195,  509 => 193,  506 => 192,  504 => 191,  502 => 190,  497 => 187,  493 => 185,  487 => 183,  485 => 182,  479 => 180,  477 => 179,  474 => 178,  472 => 177,  469 => 176,  462 => 172,  456 => 169,  453 => 168,  447 => 166,  445 => 165,  442 => 164,  440 => 163,  438 => 162,  434 => 161,  426 => 158,  421 => 155,  419 => 154,  417 => 153,  413 => 151,  409 => 149,  403 => 147,  401 => 146,  395 => 144,  393 => 143,  390 => 142,  388 => 141,  385 => 140,  378 => 136,  372 => 133,  369 => 132,  363 => 130,  361 => 129,  358 => 128,  356 => 127,  354 => 126,  350 => 125,  342 => 122,  337 => 119,  335 => 118,  331 => 116,  327 => 114,  321 => 112,  319 => 111,  313 => 109,  311 => 108,  308 => 107,  306 => 106,  299 => 102,  293 => 99,  288 => 97,  284 => 96,  279 => 95,  273 => 93,  271 => 92,  267 => 91,  263 => 90,  260 => 89,  258 => 88,  254 => 87,  248 => 84,  242 => 81,  227 => 69,  221 => 66,  214 => 62,  211 => 61,  191 => 55,  185 => 52,  181 => 51,  177 => 50,  174 => 49,  157 => 48,  155 => 47,  145 => 43,  141 => 42,  138 => 41,  134 => 40,  132 => 39,  122 => 35,  118 => 34,  115 => 33,  111 => 32,  109 => 31,  103 => 28,  100 => 27,  98 => 26,  93 => 25,  82 => 23,  78 => 22,  71 => 21,  65 => 19,  63 => 18,  59 => 17,  55 => 16,  49 => 15,  45 => 13,  43 => 12,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "invoice2.1.xml.twig", "C:\\xampp\\htdocs\\slim\\vendor\\greenter\\xml\\src\\Xml\\Templates\\invoice2.1.xml.twig");
    }
}
