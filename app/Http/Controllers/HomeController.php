<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Codigo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    function index() {
        return view('welcome');
    }

    function generateCode() {
        $codigo = sprintf("%04d", mt_rand(1, 9999));

        // Almacena el código en la base de datos
        DB::table('codigos')->insert(['codigo' => $codigo]);

        return $codigo;
    }

    public function verificarCodigo(Request $request)
    {
        $codigoIngresado = $request->input('codigo');

        // Recupera el código de la base de datos
        $codigoGuardado = Codigo::firstWhere('codigo', $codigoIngresado);

        if ($codigoGuardado) {
            // Código correcto
            Session::put('codigo_ingresado', $codigoIngresado);
            return "Código correcto";
        } else {
            // Código incorrecto
            return "Código incorrecto";
        }
    }
}
