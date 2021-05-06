<?php

/* invoice2.1.xml.twig */
class __TwigTemplate_6934068a68e83c4671a28a6d04ee5ca35988045b207f08227f78e987855fdda1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
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
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
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
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
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
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
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
            if ($this->getAttribute($context["detail"], "mtoPrecioUnitario", [])) {
                // line 364
                echo "<cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 365
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoPrecioUnitario", []), 6]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            }
            // line 369
            if ($this->getAttribute($context["detail"], "mtoValorGratuito", [])) {
                // line 370
                echo "<cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                // line 371
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoValorGratuito", []), 6]);
                echo "</cbc:PriceAmount>
                <cbc:PriceTypeCode>02</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
            }
            // line 375
            echo "</cac:PricingReference>
        ";
            // line 376
            if ($this->getAttribute($context["detail"], "cargos", [])) {
                // line 377
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "cargos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
                    // line 378
                    echo "<cac:AllowanceCharge>
            <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>";
                    // line 380
                    echo $this->getAttribute($context["cargo"], "codTipo", []);
                    echo "</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>";
                    // line 381
                    echo $this->getAttribute($context["cargo"], "factor", []);
                    echo "</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"";
                    // line 382
                    echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                    echo "\">";
                    echo $this->getAttribute($context["cargo"], "monto", []);
                    echo "</cbc:Amount>
            <cbc:BaseAmount currencyID=\"";
                    // line 383
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
            // line 387
            if ($this->getAttribute($context["detail"], "descuentos", [])) {
                // line 388
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "descuentos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["desc"]) {
                    // line 389
                    echo "<cac:AllowanceCharge>
            <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>";
                    // line 391
                    echo $this->getAttribute($context["desc"], "codTipo", []);
                    echo "</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>";
                    // line 392
                    echo $this->getAttribute($context["desc"], "factor", []);
                    echo "</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"";
                    // line 393
                    echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                    echo "\">";
                    echo $this->getAttribute($context["desc"], "monto", []);
                    echo "</cbc:Amount>
            <cbc:BaseAmount currencyID=\"";
                    // line 394
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
            // line 398
            echo "<cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
            // line 399
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "totalImpuestos", [])]);
            echo "</cbc:TaxAmount>
            ";
            // line 400
            if ($this->getAttribute($context["detail"], "isc", [])) {
                // line 401
                echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 402
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseIsc", [])]);
                echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 403
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "isc", [])]);
                echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
                // line 405
                echo $this->getAttribute($context["detail"], "porcentajeIsc", []);
                echo "</cbc:Percent>
                    <cbc:TierRange>";
                // line 406
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
            // line 415
            echo "<cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
            // line 416
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseIgv", [])]);
            echo "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
            // line 417
            echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
            echo "\">";
            echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "igv", [])]);
            echo "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
            // line 419
            echo $this->getAttribute($context["detail"], "porcentajeIgv", []);
            echo "</cbc:Percent>
                    <cbc:TaxExemptionReasonCode>";
            // line 420
            echo $this->getAttribute($context["detail"], "tipAfeIgv", []);
            echo "</cbc:TaxExemptionReasonCode>
                    ";
            // line 421
            $context["afect"] = Greenter\Xml\Filter\TributoFunction::getByAfectacion($this->getAttribute($context["detail"], "tipAfeIgv", []));
            // line 422
            echo "<cac:TaxScheme>
                        <cbc:ID>";
            // line 423
            echo $this->getAttribute(($context["afect"] ?? null), "id", []);
            echo "</cbc:ID>
                        <cbc:Name>";
            // line 424
            echo $this->getAttribute(($context["afect"] ?? null), "name", []);
            echo "</cbc:Name>
                        <cbc:TaxTypeCode>";
            // line 425
            echo $this->getAttribute(($context["afect"] ?? null), "code", []);
            echo "</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
            // line 429
            if ($this->getAttribute($context["detail"], "otroTributo", [])) {
                // line 430
                echo "<cac:TaxSubtotal>
                    <cbc:TaxableAmount currencyID=\"";
                // line 431
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "mtoBaseOth", [])]);
                echo "</cbc:TaxableAmount>
                    <cbc:TaxAmount currencyID=\"";
                // line 432
                echo $this->getAttribute(($context["doc"] ?? null), "tipoMoneda", []);
                echo "\">";
                echo call_user_func_array($this->env->getFilter('n_format')->getCallable(), [$this->getAttribute($context["detail"], "otroTributo", [])]);
                echo "</cbc:TaxAmount>
                    <cac:TaxCategory>
                        <cbc:Percent>";
                // line 434
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
            // line 443
            echo "</cac:TaxTotal>
        <cac:Item>
            <cbc:Description><![CDATA[";
            // line 445
            echo $this->getAttribute($context["detail"], "descripcion", []);
            echo "]]></cbc:Description>
            ";
            // line 446
            if ($this->getAttribute($context["detail"], "codProducto", [])) {
                // line 447
                echo "<cac:SellersItemIdentification>
                <cbc:ID>";
                // line 448
                echo $this->getAttribute($context["detail"], "codProducto", []);
                echo "</cbc:ID>
            </cac:SellersItemIdentification>
            ";
            }
            // line 451
            if ($this->getAttribute($context["detail"], "codProdSunat", [])) {
                // line 452
                echo "<cac:CommodityClassification>
                <cbc:ItemClassificationCode>";
                // line 453
                echo $this->getAttribute($context["detail"], "codProdSunat", []);
                echo "</cbc:ItemClassificationCode>
            </cac:CommodityClassification>
            ";
            }
            // line 456
            if ($this->getAttribute($context["detail"], "codProdGS1", [])) {
                // line 457
                echo "<cac:StandardItemIdentification>
                <cbc:ID>";
                // line 458
                echo $this->getAttribute($context["detail"], "codProdGS1", []);
                echo "</cbc:ID>
            </cac:StandardItemIdentification>
            ";
            }
            // line 461
            if ($this->getAttribute($context["detail"], "atributos", [])) {
                // line 462
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["detail"], "atributos", []));
                foreach ($context['_seq'] as $context["_key"] => $context["atr"]) {
                    // line 463
                    echo "<cac:AdditionalItemProperty >
                        <cbc:Name>";
                    // line 464
                    echo $this->getAttribute($context["atr"], "name", []);
                    echo "</cbc:Name>
                        <cbc:NameCode>";
                    // line 465
                    echo $this->getAttribute($context["atr"], "code", []);
                    echo "</cbc:NameCode>
                        ";
                    // line 466
                    if ($this->getAttribute($context["atr"], "value", [])) {
                        // line 467
                        echo "<cbc:Value>";
                        echo $this->getAttribute($context["atr"], "value", []);
                        echo "</cbc:Value>
                        ";
                    }
                    // line 469
                    if ((($this->getAttribute($context["atr"], "fecInicio", []) || $this->getAttribute($context["atr"], "fecFin", [])) || $this->getAttribute($context["atr"], "duracion", []))) {
                        // line 470
                        echo "<cac:UsabilityPeriod>
                                ";
                        // line 471
                        if ($this->getAttribute($context["atr"], "fecInicio", [])) {
                            // line 472
                            echo "<cbc:StartDate>";
                            echo twig_date_format_filter($this->env, $this->getAttribute($context["atr"], "fecInicio", []), "Y-m-d");
                            echo "</cbc:StartDate>
                                ";
                        }
                        // line 474
                        if ($this->getAttribute($context["atr"], "fecFin", [])) {
                            // line 475
                            echo "<cbc:EndDate>";
                            echo twig_date_format_filter($this->env, $this->getAttribute($context["atr"], "fecFin", []), "Y-m-d");
                            echo "</cbc:EndDate>
                                ";
                        }
                        // line 477
                        if ($this->getAttribute($context["atr"], "duracion", [])) {
                            // line 478
                            echo "<cbc:DurationMeasure unitCode=\"DAY\">";
                            echo $this->getAttribute($context["atr"], "duracion", []);
                            echo "</cbc:DurationMeasure>
                                ";
                        }
                        // line 480
                        echo "</cac:UsabilityPeriod>
                        ";
                    }
                    // line 482
                    echo "</cac:AdditionalItemProperty>
                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atr'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 485
            echo "</cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID=\"";
            // line 487
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
        // line 491
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
        return array (  1299 => 491,  1279 => 487,  1275 => 485,  1267 => 482,  1263 => 480,  1257 => 478,  1255 => 477,  1249 => 475,  1247 => 474,  1241 => 472,  1239 => 471,  1236 => 470,  1234 => 469,  1228 => 467,  1226 => 466,  1222 => 465,  1218 => 464,  1215 => 463,  1211 => 462,  1209 => 461,  1203 => 458,  1200 => 457,  1198 => 456,  1192 => 453,  1189 => 452,  1187 => 451,  1181 => 448,  1178 => 447,  1176 => 446,  1172 => 445,  1168 => 443,  1156 => 434,  1149 => 432,  1143 => 431,  1140 => 430,  1138 => 429,  1131 => 425,  1127 => 424,  1123 => 423,  1120 => 422,  1118 => 421,  1114 => 420,  1110 => 419,  1103 => 417,  1097 => 416,  1094 => 415,  1082 => 406,  1078 => 405,  1071 => 403,  1065 => 402,  1062 => 401,  1060 => 400,  1054 => 399,  1051 => 398,  1039 => 394,  1033 => 393,  1029 => 392,  1025 => 391,  1021 => 389,  1017 => 388,  1015 => 387,  1003 => 383,  997 => 382,  993 => 381,  989 => 380,  985 => 378,  981 => 377,  979 => 376,  976 => 375,  967 => 371,  964 => 370,  962 => 369,  953 => 365,  950 => 364,  948 => 363,  941 => 361,  935 => 360,  931 => 359,  928 => 358,  911 => 357,  903 => 355,  895 => 353,  893 => 352,  885 => 350,  883 => 349,  875 => 347,  873 => 346,  867 => 345,  863 => 343,  848 => 333,  842 => 332,  839 => 331,  837 => 330,  824 => 320,  818 => 319,  815 => 318,  813 => 317,  800 => 307,  794 => 306,  791 => 305,  789 => 304,  776 => 294,  770 => 293,  767 => 292,  765 => 291,  752 => 281,  746 => 280,  743 => 279,  741 => 278,  726 => 268,  720 => 267,  717 => 266,  715 => 265,  700 => 255,  694 => 254,  691 => 253,  689 => 252,  683 => 251,  680 => 250,  674 => 247,  670 => 246,  666 => 245,  662 => 244,  658 => 242,  656 => 241,  654 => 240,  642 => 236,  636 => 235,  632 => 234,  628 => 233,  624 => 231,  620 => 230,  618 => 229,  606 => 225,  600 => 224,  596 => 223,  592 => 222,  588 => 220,  584 => 219,  582 => 218,  562 => 214,  558 => 213,  555 => 212,  538 => 211,  536 => 210,  530 => 207,  526 => 205,  524 => 204,  518 => 201,  514 => 200,  510 => 199,  503 => 195,  498 => 193,  495 => 192,  493 => 191,  491 => 190,  486 => 187,  482 => 185,  476 => 183,  474 => 182,  468 => 180,  466 => 179,  463 => 178,  461 => 177,  458 => 176,  451 => 172,  445 => 169,  442 => 168,  436 => 166,  434 => 165,  431 => 164,  429 => 163,  427 => 162,  423 => 161,  415 => 158,  410 => 155,  408 => 154,  406 => 153,  402 => 151,  398 => 149,  392 => 147,  390 => 146,  384 => 144,  382 => 143,  379 => 142,  377 => 141,  374 => 140,  367 => 136,  361 => 133,  358 => 132,  352 => 130,  350 => 129,  347 => 128,  345 => 127,  343 => 126,  339 => 125,  331 => 122,  326 => 119,  324 => 118,  320 => 116,  316 => 114,  310 => 112,  308 => 111,  302 => 109,  300 => 108,  297 => 107,  295 => 106,  288 => 102,  282 => 99,  277 => 97,  273 => 96,  268 => 95,  262 => 93,  260 => 92,  256 => 91,  252 => 90,  249 => 89,  247 => 88,  243 => 87,  237 => 84,  231 => 81,  216 => 69,  210 => 66,  203 => 62,  200 => 61,  180 => 55,  174 => 52,  170 => 51,  166 => 50,  163 => 49,  146 => 48,  144 => 47,  134 => 43,  130 => 42,  127 => 41,  123 => 40,  121 => 39,  111 => 35,  107 => 34,  104 => 33,  100 => 32,  98 => 31,  92 => 28,  89 => 27,  87 => 26,  82 => 25,  71 => 23,  67 => 22,  60 => 21,  54 => 19,  52 => 18,  48 => 17,  44 => 16,  38 => 15,  34 => 13,  32 => 12,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "invoice2.1.xml.twig", "C:\\xampp\\htdocs\\slim\\vendor\\greenter\\xml\\src\\Xml\\Templates\\invoice2.1.xml.twig");
    }
}
