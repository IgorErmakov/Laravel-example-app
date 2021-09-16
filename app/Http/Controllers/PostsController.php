<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    function form()
    {
        return view('post/form');
    }

    function save(StorePostRequest $request)
    {
        // The incoming request is valid...


//        $validated = $request->validated();

        /*
         * $validator->after(function ($validator) {
        if ($this->somethingElseIsInvalid()) {
            $validator->errors()->add('field', 'Something is wrong with this field!');
        }
    });
         */
        $validated = $request->safe()->only(['name', 'description']);

//        dd($validated);

    }

    function altValidation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]); // ->validate(); - automatic validation & redir

        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        }

    }
}
