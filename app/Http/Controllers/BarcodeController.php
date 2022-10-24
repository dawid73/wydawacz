<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\DB;


class BarcodeController extends Controller
{
    public function generateAndDownload(){
        $code = $this->getLastRandomCodeFromDB();
        //$code = "655473";
        return $this->createAndDownload($code);
    }

    public function cloneAndDownload(Request $request){
        return $this->createAndDownload($request->code);
    }

    public function createAndDownload($code){
        $customPaper = array(0,0,160,70);
        $pdf = PDF::loadView('barcode.pdf', compact('code'));
        $pdf->setOption(['dpi' => 90, 'defaultFont' => 'sans-serif']);
        $pdf->set_paper(($customPaper), 'portrait');
        return $pdf->download('naklejka_'.$code.'.pdf');
    }

    public function createForm(){
        return view('barcode.generate');
    }

    public function testCode(){
        return view('barcode.test');
    }


    public function generateNewCode()
    {
        $number = $this->getLastRandomCodeFromDB();
        $number++;

        DB::table('randomcode')->insert(['code' => $number]);

        $code = '200' . str_pad($number, 9, '0');
        $weightflag = true;
        $sum = 0;
        for ($i = strlen($code) - 1; $i >= 0; $i--)
        {
            $sum += (int)$code[$i] * ($weightflag?3:1);
            $weightflag = !$weightflag;
        }
        $code .= (10 - ($sum % 10)) % 10;
        return $code;
    }

    public function getLastRandomCodeFromDB(){
        $lastcode = DB::table('randomcode')->orderBy('id', 'desc')->first();
        $nextnumber = $lastcode->code;
        $nextnumber++;
        DB::table('randomcode')->insert(['code' => $nextnumber]);
        return $nextnumber;
    }


}
