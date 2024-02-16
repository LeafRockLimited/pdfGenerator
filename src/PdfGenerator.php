<?php

namespace PdfGenerator;

use Dompdf\Dompdf;


class PdfGenerator{
    
    protected $dompdf;
    protected $generateBlade;

    public function __construct()
    {
        $this->dompdf = new Dompdf();
        $this->generateBlade =  new GenerateBlade();
    }

    public function create(){
        $html = $this->generateBlade->getContent('templates/template.blade.php', 
        [
            'day' => date('Y-m-d H:i:s')
        ], 
        'views/template.blade.php');

        $this->generate(
            $html,
            'outputs/output.pdf'
        );
    }

    public function generate($html = null, $filePath = null)
    {

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        file_put_contents($filePath, $this->dompdf->output());
        return $this->dompdf->output();
    }

}