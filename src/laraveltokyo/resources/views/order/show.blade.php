
@extends('layout')
@section('title', '発注詳細')
@section('content')
<!-- /**
layoutブレードのテンプレートを継承し、変更箇所を付け加える
 */ -->
<div class="row">
  <div class="col-md-8 col-md-offset-2">

      <h2>{{$orderShow->id}}.{{$orderShow->stock->stock_name}}</h2>
      <p>在庫ID:{{$orderShow->stock_id}}</p>
      <p>発注商品/在庫名:{{$orderShow->number_order}}</p>
      <p>発注/在庫単価額:{{$orderShow->stock->stock_price}}</p>
      <p>発注合計金額:{{$orderShow->total_price}}</p>
      <p>S.N:{{$orderShow->status_num}}</p>
      <p>ステータス:{{$orderShow->status}}</p>
      <p>作成日:{{$orderShow->created_at}}</p>
      <p>更新日:{{$orderShow->updated_at}}</p>

      <a class="nav-item nav-link" href="{{route('orderIndex')}}">戻る</a>

  </div>
</div>
@endsection
