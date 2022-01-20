<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class TodoListController extends Controller
{

    public function index() {
        return view('welcome', ['listItems' => Item::all()]);
    }

    public function saveItem(Request $request) {
        $newTodoItem = new Item;
        $newTodoItem->name = $request->todoItem;
        $newTodoItem->isFinished = 0;
        $newTodoItem->save();
        return redirect('/');
    }
    
    public function markComplete($id) {
        \Log::info($id);

        $listItem = Item::find($id);
        $listItem->isFinished = 1;
        $listItem->save();

        return redirect('/');
    }
}
