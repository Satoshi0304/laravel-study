
@extends('layout')
@section('title', 'ユーザー詳細')
@section('content')
<!-- /**
layoutブレードのテンプレートを継承し、変更箇所を付け加える
 */ -->
<div class="row">
  <div class="col-md-8 col-md-offset-2">

      <h2>{{$userShow->id}}.{{$userShow->user_name}}</h2>
      <p>メールアドレス:{{$userShow->email}}</p>
      <p>ステータスナンバー:{{$userShow->status_num}}</p>
      <span>作成日:{{$userShow->created_at}}</span>
      <span>更新日:{{$userShow->updated_at}}</span>

      <a class="nav-item nav-link" href="{{route('userIndex')}}">戻る</a>

  </div>
</div>
@endsection
