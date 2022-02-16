<?php
    class pdfController extends Controller {

        private $_pdf;

        public function __construct() {
            parent::__construct();
            $this->getLibrary('PHP', 'fpdf', '1.83', 'fpdf', 'php');
            $this->_pdf = new FPDF;
        }

        public function index() { }

        /**
         * http://localhost/mvc-phpv7/pdf/testPDF/<$name>/<$lastname>
         * Example: 
         * http://localhost/mvc-phpv7/pdf/testPDF/Brayan/Esteves
         */
        public function testPDF($name, $lastname) {
            $this->_pdf->AddPage();
            $this->_pdf->SetFont('Arial','B',16);
            $this->_pdf->Cell(40,10, utf8_decode($name. '. ' . $lastname));
            $this->_pdf->Output();
        }

        /**
         * http://localhost/mvc-phpv7/pdf/testViewPDF/<$name>/<$lastname>
         * Example: 
         * http://localhost/mvc-phpv7/pdf/testViewPDF/Brayan/Esteves
         */
        public function testViewPDF($name, $lastname) {
            require_once ROOT . 'public' . DS . 'files' . DS . 'pdf.phtml';
        }
    }
?>