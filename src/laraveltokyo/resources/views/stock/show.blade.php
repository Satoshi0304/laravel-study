
@extends('layout')
@section('title', '在庫詳細')
@section('content')
<!-- /**
layoutブレードのテンプレートを継承し、変更箇所を付け加える
 */ -->
<div class="row">
  <div class="col-md-8 col-md-offset-2">

      <h2>{{$stockShow->stock_id}}.{{$stockShow->stock_name}}</h2>
      <p>在庫数:{{$stockShow->stock_quantity}}</p>
      <p>金額:{{$stockShow->stock_price}}</p>
      <p>S.N:{{$stockShow->status_num}}</p>
      <p>状態:{{$stockShow->status}}</p>
      <span>作成日:{{$stockShow->created_at}}</span>
      <span>更新日:{{$stockShow->updated_at}}</span>

      <a class="nav-item nav-link" href="{{route('stockIndex')}}">戻る</a>

  </div>
</div>
@endsection
