<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use App\Imports\QuestionsImport;
use App\Models\Category;
use App\Models\Challenge;
use App\Models\Level;
use App\Models\Question;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class QuestionsController extends Controller
{
    function index() {
        $categorias = Category::all();
        return view('questions.main.category-select',['categorias' => $categorias]);
    }

    function setCategory(Request $request) {
        try {
            Session::put('categoria_seleccionada', $request->category);
            return "categoria Seleccionada";

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function levels() {
        $levels = Level::all();
        return view('questions.main.level-select',['levels' => $levels]);
    }

    function setLevel(Request $request) {
        try {
            if ($request->level != 1 && Cart::count() < 1) {
                return "nivel bloqueado";
            }
            Session::put('nivel_selecionado', $request->level);
            return "nivel seleccionado";

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function questions() {
        $categoria = Session::get('categoria_seleccionada');
        $nivel = Session::get('nivel_selecionado');

        $preguntas = Question::where('id_level', $nivel)->where('id_category', $categoria)->inRandomOrder()->take(10)->get();


        return view('questions.main.questions',['preguntas' => $preguntas]);
    }


    function getRandomChallenge() {
        $challenge = Challenge::inRandomOrder()->take(1)->get();
        return response()->json($challenge);
    }

    function formImport() {
        return view('admin.import-questions');
    }

    function importQuestions(Request $request) {
        $file = $request->file('file');
        Excel::import(new QuestionsImport, $file,'public' ,\Maatwebsite\Excel\Excel::XLSX);

        return "exito";
    }
}
