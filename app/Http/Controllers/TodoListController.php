<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
// Use Alert;

class TodoListController extends Controller
{

    public function index(){
        $todo_lists = DB::table('todo_lists')->orderby('id', 'desc')->get(); // jika ingin menggunakan fungsi latest() maka harus ada created_at
        return view('pages.blog.todo-list', ['todo_lists' => $todo_lists, 'title' => 'todo list']);
    }


    public function store(Request $request) {
        // $validateData = $request->validate([
        //     'todo'=>'required|max:255'
        // ]);


        DB::table('todo_lists')->insert([
            'list' => $request->lists,
            // 'list' => $_POST['lists']  // memakai method post native php
        ]);


        return back()->with('success', 'Data berhasil di tambahkan!'); // redirect('blog')
    }

    // public function edit($id)
    // {
    //     $edit = DB::table('todo_lists')->where('id', $id)->first();


    //     return view('pages.blog.todo-list', ['edit' => $edit, 'title' => 'update data']);
    //     // return view('pages.blog.todo-list', ['edit' => $edit]);
    //     // dd($edit);
    // }

    public function update(Request $request, $id)
    {
        DB::table('todo_lists')->where('id', $id)->update(['list' => $request->lists]);
        return redirect('/todo-list')->with('success', 'Update data berhasil!');
    }

    public function destroy($id)
    {
        Alert::error('Todo list berhasil dihapus!');

        DB::table('todo_lists')->where('id', $id)->delete();
        

        return redirect('/todo-list');
    }

    
}
