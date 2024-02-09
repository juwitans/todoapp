<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Todo::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'due_date' => [
                'required',
                'date',
                'after_or_equal:' . now()->toDateString()],
            'status' => 'required',
            'priority' => 'required|integer|between:1,4'
        ]);

        $todo = Todo::create($validateData);
        return response()->json($todo,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);

        if($todo) {
            return response()->json($todo,200);
        } else {
            return response()->json(['message' => 'Todo not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'due_date' => [
                'required',
                'date',
                'after_or_equal:' . now()->toDateString()],
            'status' => 'required',
            'priority' => 'required|integer|between:1,4'
        ]);

        if ($todo) {
            $todo->update($validateData);
            return response()->json($todo,200);
        } else {
            return response()->json(['message' => 'Todo not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        if($todo) {
            $todo->delete();
            return response()->json(null,204);
        } else {
            return response()->json(['message' => 'Todo not found'], 404);
        }
    }
}
