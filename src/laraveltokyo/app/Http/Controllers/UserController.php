<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
/** 該当テーブルのuse */
use App\Models\User;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * ユーザー一覧の表示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    /** usersテーブル全データの取得 */
    $users = User::all();
    // dd($users);
    /** userディレクトリ内のindexブレードファイルにviewする */
    /** usersテーブル全データを配列としてviewに渡す */
    $time = Carbon::now();

    return view('user.index')->with('users', $users);
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
        //
    }

    /**
     * Display the specified resource.
     * 指定ユーザーのプロフィール表示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userShow = User::find($id);

        if(is_null($userShow)){
            return redirect(route('userIndex'));
        }
        return view('user.show', ['user' => User::findOrFail($id)]);
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
        //
    }
}
