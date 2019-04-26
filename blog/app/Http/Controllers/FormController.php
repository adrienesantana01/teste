<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FieldRequest;

class FormController extends Controller
{
    public function create()
    {
    	 return view('create');

    }

    public function store(Request $request)
    {
    	    $validatedData = $request->validate([
            'nome' => 'required|string|max:23',
            'idade' => 'required|numeric|max:100|min:12',
            'birth_year' => 'required|date|before:yesterday',
            'votes' => 'required|numeric',
            'description' => 'required|string|min:10',
            'amount' => 'required|numeric|max:200|min:100',
        ]);
        \App\Form::create($validatedData);

        return response()->json('Sucesso! Dados salvos');
    }


}
