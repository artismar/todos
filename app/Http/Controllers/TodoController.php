<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    // index, store, update, destroy, edit.
    public function index(){
        $todos = Todo::All();
        $categories = Category::All();
        return view('todos.index', ['todos' => $todos, 'categories' => $categories]);
    }

    public function store(Request $request){
        $request->validate([
            "title" => "required|min:3|max:255"
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarea creada correctamente');
    }

    public function show($id){
        $todo = Todo::find($id);
        return view('todos.show', ['todo' => $todo]);
    }

    public function update(request $request, $id){
        $todo = Todo::find($id);
        $request->validate([
            "title" => "required|min:3"
        ]);
        $todo->title = $request->title;
        $todo->save();
        return redirect()->route('todos')->with('success', 'Tarea actualizada correctamente');
    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Tarea eliminada correctamente');
    }
}
