
@extends('layout')
@section('title', '在庫一覧')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>在庫一覧</h2>

      @if(session('err_msg'))
      <p class="text-danger">
        {{session('err_msg')}}
      </p>
      @endif

    <div class="navbar-nav">
        <a class="nav-item nav-link" href="{{route('stockCreate')}}">新規登録</a>
    </div>

      <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>在庫名　　</th>
            <th>在庫数</th>
            <th>金額</th>
            <th>S.N</th>
            <th>状態　</th>
            <th>作成日時</th>
            <th>更新日時</th>
            <th>詳細</th>
            <th>編集</th>
            <th>削除</th>
          </tr>

          @foreach($stocks as $stock)
          <tr>
            <td>{{$stock->stock_id}}</td>
            <td>{{$stock->stock_name}}</td>
            <td>{{$stock->stock_quantity}}</td>
            <td>{{$stock->stock_price}}</td>
            <td>{{$stock->status_num}}</td>
            <td>{{$stock->status}}</td>
            <td>{{$stock->created_at}}</td>
            <td>{{$stock->updated_at}}</td>

            <td><a href="{{route('stockShow', ['stock_id' => $stock->stock_id])}}" class="btn btn-primary">詳細　</a></td>

            <td><a href="{{route('stockEdit', ['stock_id' => $stock->stock_id])}}" class="btn btn-primary">編集　</a></td>

            <td>
              <form action="", method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
              </form>
            </td>
          </tr>
            @endforeach
      </table>
  </div>
</div>
@endsection
