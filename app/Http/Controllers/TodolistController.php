<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TodolistController extends Controller
{

    public function index()
    {
        $list = TodoList::all();
        return response($list);
    }

    public function show(TodoList $todo_list)
    {
        return response($todo_list);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
        ]);

        $list = TodoList::create($request->all());

        return response($list, Response::HTTP_CREATED);
    }

    public function destroy(TodoList $todo_list)
    {
        $todo_list->delete();
        return response(['Deleted Successfully'], Response::HTTP_NO_CONTENT);
    }

    public function update(Request $request, TodoList $todo_list)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $list = $todo_list->update($request->all());
        return response($list);
    }
}
