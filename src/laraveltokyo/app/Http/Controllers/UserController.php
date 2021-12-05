<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
/** 該当テーブルのuse */
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**  バリデーションチェックをこのcontrollerでuseする*/
use App\Http\Requests\UserRequest;

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
    $users = DB::table('users')->get();
    // dd($users);
    /** userディレクトリ内のindexブレードファイルにviewする */
    /** usersテーブル全データを配列としてviewに渡す */
    $time = Carbon::now();

    return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /** Requestはデフォルトでuse設定されており、Requestの中でさらにUserRequestのクラスを作成しているため UserRequest $requestで追加でバリデーションを噛ませることができる。これに合致しなかった場合該当の$errorsで返す
      */
    public function store(UserRequest $request)
    {

        $inputs = $request->all();
        // dd($inputs);
        DB::beginTransaction();
        try{
            User::create($inputs);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            abort(500);
        }
        $request->session()->flash('err_msg', 'ユーザー登録が完了しました');

        return redirect(route('userIndex'));

    }

    /**
     * Display the specified resource.
     * 指定ユーザーのプロフィール表示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $userShow = User::find($id);

        if(!isset($userShow)){
            $request->session()->flash('err_msg', 'データがありません');
            // dd($userShow);
            return redirect(route('userIndex'));
        }

        return view('user.show', compact('userShow'));
        // ['userShow' => User::findOrFail($id)]);
    }

    /**
     * ブログ編集フォームの表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $userEdit = User::find($id);
        // dd($userEdit);

        if(!isset($userEdit)){
            $request->session()->flash('err_msg', 'データがありません');
            // dd($userShow);
            return redirect(route('userIndex'));
        }

        $statusNum = $userEdit->status_num;
        // dd($statusNum);
        $userStatus = "";

        if($statusNum === 0){
            // dd($statusNum);
            $userStatus = "在庫発注管理者";
        }elseif($statusNum === 5){
            $userStatus = "在庫発注社員";
        }elseif($statusNum === 10){
            $userStatus = "在庫受注社";
        }else{
            $request->session()->flash('err_msg', '権限が無効です');
            return redirect(route('userIndex'));
        }

        return view('user.edit', compact('userEdit', 'userStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {

        $inputs = $request->all();

        DB::beginTransaction();
        try{
            /** $user = DB::table('users')->find(3);を元に更新はできるが配列表記が下記と異なりfillメソッドが使えず、saveができない。 理由は不明 */

            /** saveメソッドを使うことでcreated_atとupdated_atが正当に反映される*/

            // $userUpdateRecord =
            // DB::table('users')->find($inputs['id']);
            // $recipe->fill($request->all())->save();

            $userUpdateRecord = User::find($inputs['id']);

            $userUpdateRecord->fill([
                  'user_name' => $inputs['user_name'],
                  'email' => $inputs['email'],
                  'password' => Hash::make($inputs['password'])
            ]);
            $userUpdateRecord->save();

            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            abort(500);
        }
        $request->session()->flash('err_msg', 'ユーザー登録を更新しました');

        return redirect(route('userIndex'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $inputs = $request->all();
        DB::table('users')->where('id', $id)->delete();

        $request->session()->flash('err_msg', 'ユーザー情報の削除に成功しました');
        return redirect(route('userIndex'));
    }
}
