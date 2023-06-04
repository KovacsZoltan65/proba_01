<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;

class MenuController extends Controller
{
    public function index()
    {
        //$pathToFile = public_path('uploads/demo.csv');
        // VAGY
        $pathToFile = public_path('uploads/demo.xlsx');

        // ============================
        // CSV vagy Excel fájl olvasása
        // ============================

        //$rows = SimpleExcelReader::create($pathToFile)->getRows();
        
        //echo '<pre>';
        //$rows->each(function(array $rowProperties){
        //    print_r($rowProperties);
        //});
        //echo '</pre>';

        // ============================
        // LazyCollection használata
        // ============================
        // getRowsegy példányát adja vissza Illuminate\Support\LazyCollection. 
        // Ez az osztály a Laravel keretrendszer része. A színfalak mögött generátorokat használnak, 
        // így a memóriahasználat még nagy fájlok esetén is alacsony lesz.
        // LazyCollection A használható módszerek listáját a Laravel dokumentációjában találja. (https://laravel.com/docs/master/collections#the-enumerable-contract)
        // Íme egy gyors, ostoba példa, ahol csak azokat a sorokat akarjuk feldolgozni, amelyekben a first_name több mint 5 karakter található.
        SimpleExcelReader::create($pathToFile)
        ->getRows()
        //->filter(function(array $rowProperties) { return strlen($rowProperties['first_name']) > 5; })
        ->each(function(array $rowProperties){
            echo '<pre>';
            print_r($rowProperties);
            echo '</pre>';
        });
    }
}
