
@extends('layout')
@section('title', 'ユーザー一覧')
@section('content')
<!-- /**
layoutブレードのテンプレートを継承し、変更箇所を付け加える
 */ -->



<div class="row">

  <div class="col-md-8 col-md-offset-2">
    <h2>ユーザー一覧</h2>
      @if (session('err_msg'))
      <p class="text-danger">
          {{session('err_msg')}}
      </p>
      @endif

    <div class="navbar-nav">
        <a class="nav-item nav-link" href="{{route('userCreate')}}">新規登録</a>
    </div>

      <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>ユーザー名</th>
            <th>メールアドレス</th>
            <th>S.N</th>
            <th>作成日時</th>
            <th>更新日時</th>
            <th>詳細</th>
            <th>編集</th>
            <th>削除</th>
          </tr>

            @foreach ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->user_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->status_num}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>

            <td><a href="{{route('userShow', ['id' => $user->id])}}" class="btn btn-primary">詳細　</a></td>

            <td><a href="{{route('userEdit', ['id' => $stock->id])}}" class="btn btn-primary">編集　</a></td>

            <td>
              <form action="{{route('userDestroy', $user->id)}}", method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
            </td>
            </form>
          </tr>
            @endforeach
      </table>
  </div>
</div>
@endsection
