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

/* voided.xml.twig */
class __TwigTemplate_50344d9370b35e0f136640605864203bc4220ba728a5007a411ad76b430d1d22 extends \Twig\Template
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
        echo "<?xml version=\"1.0\" encoding=\"windows-1250\"?>
<VoidedDocuments xmlns=\"urn:sunat:names:specification:ubl:peru:schema:xsd:VoidedDocuments-1\"
                 xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\"
                 xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\"
                 xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\"
                 xmlns:sac=\"urn:sunat:names:specification:ubl:peru:schema:xsd:SunatAggregateComponents-1\"
                 xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    <cbc:UBLVersionID>2.0</cbc:UBLVersionID>
    <cbc:CustomizationID>1.0</cbc:CustomizationID>
    <cbc:ID>";
        // line 15
        echo $this->getAttribute(($context["doc"] ?? null), "xmlId", []);
        echo "</cbc:ID>
    <cbc:ReferenceDate>";
        // line 16
        echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? null), "fecGeneracion", []), "Y-m-d");
        echo "</cbc:ReferenceDate>
    <cbc:IssueDate>";
        // line 17
        echo twig_date_format_filter($this->env, $this->getAttribute(($context["doc"] ?? null), "fecComunicacion", []), "Y-m-d");
        echo "</cbc:IssueDate>
    ";
        // line 18
        $context["emp"] = $this->getAttribute(($context["doc"] ?? null), "company", []);
        // line 19
        echo "<cac:Signature>
        <cbc:ID>";
        // line 20
        echo $this->getAttribute(($context["emp"] ?? null), "ruc", []);
        echo "</cbc:ID>
        <cbc:Note>GREENTER Builder</cbc:Note>
        <cac:SignatoryParty>
            <cac:PartyIdentification>
                <cbc:ID>";
        // line 24
        echo $this->getAttribute(($context["emp"] ?? null), "ruc", []);
        echo "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
        // line 27
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
        <cbc:CustomerAssignedAccountID>";
        // line 37
        echo $this->getAttribute(($context["emp"] ?? null), "ruc", []);
        echo "</cbc:CustomerAssignedAccountID>
        <cbc:AdditionalAccountID>6</cbc:AdditionalAccountID>
        <cac:Party>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
        // line 41
        echo $this->getAttribute(($context["emp"] ?? null), "razonSocial", []);
        echo "]]></cbc:RegistrationName>
            </cac:PartyLegalEntity>
        </cac:Party>
    </cac:AccountingSupplierParty>
    ";
        // line 45
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
        foreach ($context['_seq'] as $context["_key"] => $context["det"]) {
            // line 46
            echo "<sac:VoidedDocumentsLine>
        <cbc:LineID>";
            // line 47
            echo $this->getAttribute($context["loop"], "index", []);
            echo "</cbc:LineID>
        <cbc:DocumentTypeCode>";
            // line 48
            echo $this->getAttribute($context["det"], "tipoDoc", []);
            echo "</cbc:DocumentTypeCode>
        <sac:DocumentSerialID>";
            // line 49
            echo $this->getAttribute($context["det"], "serie", []);
            echo "</sac:DocumentSerialID>
        <sac:DocumentNumberID>";
            // line 50
            echo $this->getAttribute($context["det"], "correlativo", []);
            echo "</sac:DocumentNumberID>
        <sac:VoidReasonDescription><![CDATA[";
            // line 51
            echo $this->getAttribute($context["det"], "desMotivoBaja", []);
            echo "]]></sac:VoidReasonDescription>
    </sac:VoidedDocumentsLine>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['det'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "</VoidedDocuments>";
    }

    public function getTemplateName()
    {
        return "voided.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 54,  139 => 51,  135 => 50,  131 => 49,  127 => 48,  123 => 47,  120 => 46,  103 => 45,  96 => 41,  89 => 37,  76 => 27,  70 => 24,  63 => 20,  60 => 19,  58 => 18,  54 => 17,  50 => 16,  46 => 15,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "voided.xml.twig", "C:\\xampp\\htdocs\\slim\\vendor\\greenter\\xml\\src\\Xml\\Templates\\voided.xml.twig");
    }
}
