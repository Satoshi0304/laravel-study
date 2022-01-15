
@extends('layout')
@section('title', '発注一覧')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h2>発注一覧</h2>

      @if(session('err_msg'))
      <p class="text-danger">
        {{session('err_msg')}}
      </p>
      @endif

      @if(session('success'))
      <p class="text-primary">
        {{session('success')}}
      </p>
      @endif

    <div class="navbar-nav">
        <a class="nav-item nav-link" href="{{route('orderCreate')}}">新規発注</a>
    </div>

      <table class="table table-striped">
          <tr>
            <th>ID</th>
            <th>在庫ID　　</th>
            <th>発注商品/在庫名　　　　　　　　　</th>
            <th>発注数　　　</th>
            <th>発注/在庫単価額　　　　　　　</th>
            <th>発注合計金額　　　　　</th>
            <th>S.N</th>
            <th>ステータス　　　　</th>
            <th>作成日時　　　　　　　　　</th>
            <th>更新日時　　　　　　　　　</th>
            <th>詳細</th>
            <th>編集</th>
            <th>削除</th>
          </tr>

          @foreach($orders as $order)
          <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->stock_id}}</td>
            <td>{{$order->stock->stock_name}}</td>
            <td>{{$order->number_order}}</td>
            <td>{{$order->stock->stock_price}}</td>
            <td>{{$order->total_price}}</td>
            <td>{{$order->status_num}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->updated_at}}</td>

            <td><a href="{{route('orderShow', ['id' => $order->id])}}" class="btn btn-primary">詳細　</a></td>

            <td><a href="{{route('orderEdit', ['id' => $order->id])}}" class="btn btn-primary">編集　</a></td>

            <td>
              <form action="{{route('orderDestroy', $order->id)}}", method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
              </form>
            </td>
          </tr>
            @endforeach
            {{ $orders->links() }}
      </table>
  </div>
</div>
@endsection
