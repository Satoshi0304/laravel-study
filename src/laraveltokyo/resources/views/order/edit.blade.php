@extends('layout')
@section('title', '発注情報更新')
@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>発注情報更新</h2>

        @if(session('err_msg'))
      <p class="text-danger">
        {{session('err_msg')}}
      </p>
      @endif

        <form method="POST" action="{{route('orderUpdate')}}" onSubmit="return checkSubmit()">
          @csrf

          <!-- stock_id情報もupdateへ渡す必要がある -->
          <input type="hidden" name="id" value="{{$orderEdit->id}}">

          <input type="hidden" name="stock_id" value="{{$orderEdit->stock_id}}">

          <input type="hidden" name="stock_name" value="{{$orderEdit->stock->stock_name}}">

          <input type="hidden" name="number_order" value="{{$orderEdit->number_order}}">

          <input type="hidden" name="stock_price" value="{{$orderEdit->stock->stock_price}}">
          <input type="hidden" name="status_num" value="{{$orderEdit->stock->status_num}}">

         <!-- エラー時のリダイレクトパラメータ用 -->
          <input type="hidden" name="id" value="{{$orderEdit->id}}">

          <!-- 下記により発注数が在庫数を超えないようにする -->
          <input type="hidden" name="stock_quantity" value="{{$orderEdit->stock->stock_quantity}}">



            <div class="form-group">

                <label for="order_name">
                発注商品/在庫名
                </label>
                <p class="text-primary">
                {{ $orderEdit->stock->stock_name}}
                </p>

                <label for="number_order">
                    発注数
                </label>
                <p class="text-primary">
                {{ $orderEdit->number_order}}
                </p>


                <label for="price">
                発注/在庫単価額
                </label>
                <p class="text-primary">
                {{ $orderEdit->stock->stock_price}}
                </p>

                @if ($errors->has('price'))
                <div class="text-danger">
                  {{ $errors->first('price')}}
                </div>
                @endif


                <label for="total_price">
                    発注合計金額
                </label>
                <p class="text-primary">
                {{ $orderEdit->total_price}}
                </p>


                <label for="status_number">
                    S.N
                </label>
                <p class="text-primary">
                {{ $orderEdit->status_num}}
                </p>


                <label for="statas_num">
                    ステータス
                </label>
                <!-- idはlabelと関連付け、nameはそのまま classは装飾 valueはデフォルトの値、typeは記入欄の形-->
                <p class="text-primary">
                {{ $orderEdit->status}}
                </p>


                @if($userStatusNum === 5 && $orderEdit->status_num === 5 && $orderEdit->status === "")
                <select
                    id="status"
                    name="status"
                    class="form-control"
                    value="{{$orderEdit->status}}"
                >
                  <option value="発注確認">発注確認</option>

                </select>

                <div class="mt-5">
                  <button type="submit" class="btn btn-primary">
                      更新する
                  </button>
                @endif


                @if($userStatusNum === 0 && $orderEdit->status_num === 0 && $orderEdit->status === "発注確認")
                <select
                    id="status"
                    name="status"
                    class="form-control"
                    value="{{$orderEdit->status}}"
                >
                <option value="発注状態">発注確認</option>
                <option value="発注状態">発注状態</option>
                </select>

                <div class="mt-5">
                  <button type="submit" class="btn btn-primary">
                      更新する
                  </button>
                @endif


                @if($userStatusNum === 10 && $orderEdit->status_num === 10 && $orderEdit->status === "発注状態")
                <select
                    id="status"
                    name="status"
                    class="form-control"
                    value="{{$orderEdit->status}}"
                >
                  <option value="発注済み">発注状態</option>
                  <option value="発注済み">発注済み</option>
                </select>

                <div class="mt-5">
                  <button type="submit" class="btn btn-primary">
                      更新する
                  </button>
                @endif


                @if($userStatusNum === 0 && $orderEdit->status_num === 0 && $orderEdit->status === "発注済み")
                <select
                    id="status"
                    name="status"
                    class="form-control"
                    value="{{$orderEdit->status}}"
                >
                  <option value="発注受け取り済み">発注済み</option>
                  <option value="発注受け取り済み">発注受け取り済み</option>
                </select>

                <div class="mt-5">
                  <button type="submit" class="btn btn-primary">
                      更新する
                  </button>
                  @endif


                  <a class="btn btn-secondary" href="{{route('orderIndex')}}">
                      キャンセル
                  </a>
                </div>


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