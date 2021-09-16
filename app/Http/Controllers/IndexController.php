<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function createForm()
    {
        return view('create-form');
    }

    function saveForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required | min: 20 | max:100',
            'description' => 'required',
            'publish_at' => 'nullable|date',
        ]);

    }
}
