<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // With Query Builder
        // $questions = DB::table('questions')->get();

        $questions = Question::all();
        return view('pertanyaan', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formpertanyaan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:45',
            'content' => 'required|max:255'
        ]);

        // With Query Builder
        // DB::table('questions')->insert([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'profile_id' => $request->profile_id,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);
        Question::create($request->all());

        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // With Query Builder
        // $question = DB::table('questions')->where('id', $id)->get();
        // $answers = DB::table('answers')->join('users', 'answers.profile_id', '=', 'users.id')
        //     ->select('answers.*', 'users.full_name')
        //     ->where('question_id', '=', $id)->get();

        $question = Question::find($id);
        $answers = $question->answers;
        $correctAnswer = $question->correctAnswer;
        return view('detailpertanyaan', compact('question', 'answers', 'correctAnswer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // With Query Builder
        // $question = DB::table('questions')->where('id', $id)->get();

        $question = Question::find($id);
        return view('editpertanyaan', ['question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:45',
            'content' => 'required|max:255'
        ]);

        // With Query Builder
        // DB::table('questions')->where('id', $request->id)->update([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        $q = Question::find($id);
        $q->title = $request->title;
        $q->content = $request->content;
        $q->save();

        $question = Question::find($id);
        $answers = $question->answers;
        $correctAnswer = $question->correctAnswer;
        return view('detailpertanyaan', compact('question', 'answers', 'correctAnswer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // With Query Builder
        //DB::table('questions')->where('id', $id)->delete();

        $q = Question::find($id);
        $q->delete();

        return redirect('/pertanyaan');
    }
}
