<?php

use Greenter\Data\StoreTrait;
use Greenter\Model\DocumentInterface;
use Greenter\Model\Response\CdrResponse;
use Greenter\Report\HtmlReport;
use Greenter\Report\PdfReport;
use Greenter\See;
use Greenter\XMLSecLibs\Certificate\X509Certificate;
use Greenter\XMLSecLibs\Certificate\X509ContentType;


final class Util
{
    use StoreTrait;

    private static $current;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$current instanceof self) {
            self::$current = new self();
        }

        return self::$current;
    }

    /**
     * @param string $endpoint
     * @return See
     */
    public function getSee($endpoint)
    { 
        $see = new See();
        $see->setService($endpoint);
//        $see->setCodeProvider(new XmlErrorCodeProvider());

        $pfx = file_get_contents(__DIR__ . '/../resources/cert.pfx');
        $password = 'MVMQpZc2HysYHAjb';

        $certificate = new X509Certificate($pfx, $password);
        $pem = $certificate->export(X509ContentType::PEM);
        file_put_contents('certificate.pem', $pem);

            
        $see->setCertificate(file_get_contents('certificate.pem'));
        
        $see->setCredentials('20565964705ALVI1403', '02181419Alvi');
        $see->setCachePath(__DIR__ . '/../cache');

        return $see;
    }

    public function showResponse(DocumentInterface $document, CdrResponse $cdr)
    {
        $filename = $document->getName();
        

        require __DIR__.'/../views/response.php';
    }

    public function getErrorResponse(\Greenter\Model\Response\Error $error)
    {
        $result = array("status"=>"false","message"=> "Código de error:".$error->getCode()."-"."   Descripción de error: ".$error->getMessage());
        
    
        return $result;
    }

    public function writeXml(DocumentInterface $document, $xml)
    {
        $this->writeFile($document->getName().'.xml', $xml);
    }

    public function writeCdr(DocumentInterface $document, $zip)
    {
        $this->writeFile('R-'.$document->getName().'.zip', $zip);
    }

    public function writeFile($filename, $content)
    {
        if (getenv('GREENTER_NO_FILES')) {
            return;
        }

        file_put_contents(__DIR__.'/../files/'.$filename, $content);
    }

    public function getPdf(DocumentInterface $document,$tipodocumento)
    {
        $html = new HtmlReport('', [
            'cache' => __DIR__ . '/../cache',
            'strict_variables' => true,
        ]);
        $template = $this->getTemplate($document);
        if ($template) {
            $html->setTemplate($template);
        }

        $render = new PdfReport($html);
        $render->setOptions( [
            'no-outline',
            'viewport-size' => '1280x1024',
            'page-width' => '21cm',
            'page-height' => '29.7cm',
            'footer-html' => __DIR__.'/../resources/footer.html',
        ]);
        $binPath = self::getPathBin();
        if (file_exists($binPath)) {
            $render->setBinPath($binPath);
        }
        
        $hash = $this->getHash($document);
        $params = self::getParametersPdf($tipodocumento);
        $params['system']['hash'] = $hash;
        $params['user']['footer'] = '<div>consulte en <a href="http://www.planrentable.com.pe">www.planrentable.com.pe</a></div>';

        $pdf = $render->render($document, $params);

        if ($pdf === false) {
            $error = $render->getExporter()->getError();
            echo 'Error: '.$error;
            exit();
        }

        // Write html
        $this->writeFile($document->getName().'.html', $render->getHtml());

        return $pdf;
    }

    public static function generator($item, $count)
    {
        $items = [];

        for ($i = 0; $i < $count; $i++) {
            $items[] = $item;
        }

        return $items;
    }

    public function showPdf($content, $filename)
    {
        $this->writeFile($filename, $content);
     /*   header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="' . $filename . '"');
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . strlen($content));

        echo $content;*/
    }

    public static function getPathBin()
    {
        $path = __DIR__.'/../vendor/bin/wkhtmltopdf';
        if (self::isWindows()) {
            $path .= '.exe';
        }

        return $path;
    }

    public static function isWindows()
    {
        return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    }

    public static function inPath($command) {
        $whereIsCommand = self::isWindows() ? 'where' : 'which';

        $process = proc_open(
            "$whereIsCommand $command",
            array(
                0 => array("pipe", "r"), //STDIN
                1 => array("pipe", "w"), //STDOUT
                2 => array("pipe", "w"), //STDERR
            ),
            $pipes
        );
        if ($process !== false) {
            $stdout = stream_get_contents($pipes[1]);
            stream_get_contents($pipes[2]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            proc_close($process);

            return $stdout != '';
        }

        return false;
    }

    private function getTemplate($document)
    {
        $className = get_class($document);

        switch ($className) {
            case \Greenter\Model\Retention\Retention::class:
                $name = 'retention';
                break;
            case \Greenter\Model\Perception\Perception::class:
                $name = 'perception';
                break;
            case \Greenter\Model\Despatch\Despatch::class:
                $name = 'despatch';
                break;
            case \Greenter\Model\Summary\Summary::class:
                $name = 'summary';
                break;
            case \Greenter\Model\Voided\Voided::class:
            case \Greenter\Model\Voided\Reversion::class:
                $name = 'voided';
                break;
            default:
                return '';
        }

        return $name.'.html.twig';
    }

    private function getHash(DocumentInterface $document)
    {
        $see = $this->getSee('');
        $xml = $see->getXmlSigned($document);

        $hash = (new \Greenter\Report\XmlUtils())->getHashSign($xml);

        return $hash;
    }

    private static function getParametersPdf($tipodocumento)
    {
        $logo = file_get_contents(__DIR__.'/../resources/logo.png');

        return [
            'system' => [
                'logo' => $logo,
                'hash' => ''
            ],
            'user' => [
                'resolucion' => '155-2017',
                'header' => '<b>Telf:</b> (01)  715 - 6777',
                'extras' => [
                    ['name' => '<b>CONDICIÓN DE PAGO</b>', 'value' => $tipodocumento]
                ],
            ]
        ];
    }
}