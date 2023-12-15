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

    public function destroy(TodoList $todolist)
    {
        $todolist->delete();
        return response(['Deleted Successfully'], Response::HTTP_NO_CONTENT);
    }

    public function update(Request $request, TodoList $todolist)
    {
        $list = $todolist->update($request->all());
        return response($list);
    }
}
