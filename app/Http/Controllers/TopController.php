<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;
use App\Models\Interest;
use Auth;
use App\Models\User;

class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::query()
        ->whereNot('id', Auth::id())
        ->inRandomOrder()
        ->first();

        $interests = DB::table('interests')
        ->where('user_id',$user->id)
        ->pluck('interest_title');

        return view('toppage.index', compact('user','interests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    // バリデーション
    $rules1 = [
        'interest_title' => 'required | max:20',
    ];

    $rules2 = [
        'interest_title' =>
            Rule::unique('interests')->where(function ($query) {
                return $query->where('user_id', Auth::id());
            }),
    ];

    $validator = Validator::make($request->all(), $rules1);
    // バリデーション:エラー
    if ($validator->fails()) {
        return redirect()
        ->route('mypage.index')
        ->withInput()
        ->withErrors($validator);
    }

    $validator = Validator::make($request->all(), $rules2);
    // バリデーション:エラー
    if ($validator->fails()) {
        return redirect()
        ->route('mypage.index')
        ->withInput()
        ->withErrors($validator);
    }

    // create()は最初から用意されている関数
    // 戻り値は挿入されたレコードの情報
    $data = $request->merge(['user_id' => Auth::user()->id])->all();
    $result = Interest::create($data);
    return redirect()->route('mypage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Interest::find($id)->delete();
        return redirect()->route('mypage.index');
    }
}
