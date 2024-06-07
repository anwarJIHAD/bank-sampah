<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_pdf
{
    public $pdf;

    public function __construct($params = array())
    {
        $this->pdf = new \Mpdf\Mpdf($params);
    }
}
