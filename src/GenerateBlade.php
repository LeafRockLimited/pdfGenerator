<?php

namespace PdfGenerator;

use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;

class GenerateBlade{

    protected $blade;

    public function __construct()
    {
        $this->blade = new BladeCompiler(new Filesystem, '../views');
    }

    public function createFile($view, $data, $outputPath){
        $engine = new CompilerEngine($this->blade);
        $content = $engine->get($view, $data);
        return file_put_contents($outputPath, $content);
    }

    public function getContent($view, $data){
        $engine = new CompilerEngine($this->blade);
        $content = $engine->get($view, $data);
        return $content;
    }


}