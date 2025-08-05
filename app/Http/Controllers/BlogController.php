<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index(Request $request)

    {
        $title = $request->title;
        $blog = DB::table('blogs')->where('title', 'LIKE', "%" . $title . "%")->orderBy('id', 'desc')->paginate(10);
        return view('blog', ['data' => $blog, 'title' => $title]);
    }

    function add()
    {

        return view('blog-add', []);
    }

    function create(Request $request)
    {

        $validate = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        DB::table('blogs')->insert($validate);

        // $request->session()->flash('status', 'New blog successfuly added');

        Session::flash('message', 'new blog successfully created');

        return redirect()->route('blog');
    }

    function show($id)
    {
        $blog = DB::table('blogs')->where('id', '=', $id)->first();
        if (!$blog) {
            abort(404);
        }
        return view('blog-detail', ['blog' => $blog]);
    }

    function edit($id)
    {
        $blog = DB::table('blogs')->where('id', '=', $id)->first();
        if (!$blog) {
            abort(404);
        }
        return view('blog-edit', ['blog' => $blog]);
    }


    function update(Request $request, $id)
    {

        $validate = $request->validate([
            'title' => 'required|unique:blogs,title,' . $id . '|max:255',
            'body' => 'required'
        ], [
            'title.unique' => 'Judul sudah digunakan, silahkan pakai judul lain'
        ]);


        DB::table('blogs')->where('id', '=', $id)->update($validate);

        return redirect()->route('blog')->with('message', 'Blog berhasil di update');
    }

    function destroy($id)
    {

        DB::table('blogs')->where('id', $id)->delete();

        return redirect()->route('blog')->with('message', 'blog berhasil di hapus');
    }
}
