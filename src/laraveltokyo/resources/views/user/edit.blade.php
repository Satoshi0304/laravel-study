@extends('layout')
@section('title', 'ユーザー情報更新')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ユーザー情報更新</h2>
         <form method="POST" action="{{route('userUpdate')}}" onSubmit="return checkSubmit()">
          @csrf

          <input type="hidden" name="id" value="{{$userEdit->id}}">

            <div class="form-group">
                <label for="user_name">
                    ユーザー名
                </label>
                <!-- idはlabelと関連付け、nameはそのまま classは装飾 valueはデフォルトの値、typeは記入欄の形-->
                <input
                    id="user_name"
                    name="user_name"
                    class="form-control"
                    value="{{ $userEdit->user_name}}"
                    type="text"
                >

                @if ($errors->has('user_name'))
                <div class="text-danger">
                  {{ $errors->first('user_name')}}
                </div>
                @endif

                <label for="email">
                    メールアドレス
                </label>
                <!-- idはlabelと関連付け、nameはそのまま classは装飾 valueはデフォルトの値、typeは記入欄の形-->
                <input
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{ $userEdit->email}}"
                    type="text"
                >

                @if ($errors->has('email'))
                <div class="text-danger">
                  {{ $errors->first('email')}}
                </div>
                @endif

                <label for="password">
                    パスワード
                </label>
                <!-- idはlabelと関連付け、nameはそのまま classは装飾 valueはデフォルトの値、typeは記入欄の形-->
                <input
                    id="password"
                    name="password"
                    class="form-control"
                    value="{{ old('password') }}"
                    type="text"
                >

                @if ($errors->has('password'))
                <div class="text-danger">
                  {{ $errors->first('password')}}
                </div>
                @endif

                <label for="statas_num">
                    権限設定
                </label>
                <!-- idはlabelと関連付け、nameはそのまま classは装飾 valueはデフォルトの値、typeは記入欄の形-->

                <p class="text-primary">
                {{ $userStatus}}
                </p>

                <select
                    id="status_num"
                    name="status_num"
                    class="form-control"
                    value="{{ old('statas_num') }}"
                >
                  <option value=0>在庫発注管理者</option>
                  <option value=5>在庫発注社員</option>
                  <option value=10>在庫受注社</option>
                </select>

                <!-- バリデーションチェックで〇〇のチェック項目があった場合は合致した順にエラー文を返す -->
                @if ($errors->has('status_num'))
                    <div class="text-danger">
                        {{ $errors->first('satus_num') }}
                    </div>
                @endif
            </div>


            <div class="mt-5">
                <a class="btn btn-secondary" href="*">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
<script>

function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection