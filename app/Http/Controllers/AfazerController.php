<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\afazer;
use PhpOption\None;

class AfazerController extends Controller
{
    public function index()
    {
        $request = request()->all();
        if ($request) {
            $query = Afazer::where('id_user', auth()->user()->id);
            //dd($request);
            if ($request['tipo']) {
                $query->where('tipo', $request['tipo']);
            }

            if ($request['concluido'] != null) {
                $query->where('concluido', $request['concluido']? true : false);
            }

            $todos = $query->paginate(5);
        }else{
            $todos = Afazer::where('id_user', auth()->user()->id)->paginate(5);
        }
        return view('afazer.index', compact('todos'));
    }

    public function create()
    {
        return view('afazer.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        afazer::create([
            'id_user' => auth()->user()->id,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_final' => $request->data_final,
            'concluido' => false,
            "tipo" => $request->tipo
        ]);
        return redirect()->route('afazer.index');
    }

    public function edit(string $id)
    {
        $todo = Afazer::find($id);
        return view('afazer.edit', compact('todo'));
    }
    public function update(Request $request, string $id)
    {
        $todo = Afazer::find($id);
        $todo->update($request->all());
        return redirect()->route('afazer.index');
    }

    public function show(string $id)
    {
        $todo = Afazer::find($id);
        return view('afazer.show', compact('todo'));
    }

    public function delete(string $id)
    {
        $todo = Afazer::find($id);
        $todo->delete();
        return redirect()->route('afazer.index');
    }
}
