<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{
    public function index()
    {
        $questions = DB::table('questions')->get();
        return view('pertanyaan', ['questions' => $questions]);
    }

    public function create()
    {
        return view('formpertanyaan');
    }

    public function store(Request $request)
    {
        // profileid  blom tau gmn
        DB::table('questions')->insert([
            'title' => $request->title,
            'content' => $request->content,
            'profile_id' => $request->profile_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('/pertanyaan');
    }

    public function show($id)
    {
        $question = DB::table('questions')->where('id', $id)->get();
        $answers = DB::table('answers')->join('users', 'answers.profile_id', '=', 'users.id')
            ->select('answers.*', 'users.full_name')
            ->where('question_id', '=', $id)->get();


        return view('detailpertanyaan', ['question' => $question, 'answers' => $answers]);
    }

    public function edit($id)
    {
        $question = DB::table('questions')->where('id', $id)->get();

        return view('editpertanyaan', ['question' => $question]);
    }

    public function update(Request $request, $id)
    {
        DB::table('questions')->where('id', $request->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $question = DB::table('questions')->where('id', $id)->get();
        $answers = DB::table('answers')->join('users', 'answers.profile_id', '=', 'users.id')
            ->select('answers.*', 'users.full_name')
            ->where('question_id', '=', $id)->get();


        return view('detailpertanyaan', ['question' => $question, 'answers' => $answers]);
    }

    public function destroy($id)
    {
        DB::table('questions')->where('id', $id)->delete();

        return redirect('/pertanyaan');
    }
}
