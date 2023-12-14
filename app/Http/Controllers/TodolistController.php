<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodolistController extends Controller
{

    public function index()
    {
        $list = TodoList::all();
        return response($list);
    }

    public function show(TodoList $todolist)
    {
        return response($todolist);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
        ]);

        $list = TodoList::create($request->all());

        return response($list, Response::HTTP_CREATED);
    }
}
