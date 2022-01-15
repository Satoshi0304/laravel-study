@extends('layout')
@section('title', '新規発注')
@section('content')

 <!-- デフォルトの権限nullが必須 -->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>新規発注</h2>

        @if(session('err_msg'))
      <p class="text-danger">
        {{session('err_msg')}}
      </p>
      @endif

         <form method="POST" action="{{route('orderStore')}}" onSubmit="return checkSubmit()">
          @csrf

            <div class="form-group">

                <label for="stock_name">
                    発注商品名(在庫名)
                </label>
                <!-- idはlabelと関連付け、nameはそのまま classは装飾 valueはデフォルトの値、typeは記入欄の形-->

                <select
                    id="stock_id"
                    name="stock_id"
                    class="form-control"
                    value="stock_id"
                >
                @foreach ( $stocks as $stock ) {
                echo '<option value="{{$stock->stock_id}}">{{$stock->stock_id}}:{{$stock->stock_name}}</option>';}
                @endforeach
                </select>

                @if ($errors->has('stock_name'))
                <div class="text-danger">
                  {{ $errors->first('stock_name')}}
                </div>
                @endif


                <label for="number_order">
                    発注数
                </label>
                <!-- idはlabelと関連付け、nameはそのまま classは装飾 valueはデフォルトの値、typeは記入欄の形-->
                <input
                    id="number_order"
                    name="number_order"
                    class="form-control"
                    value="{{ old('number_order') }}"
                    type="number"
                >

                @if ($errors->has('number_order'))
                <div class="text-danger">
                  {{ $errors->first('number_order')}}
                </div>
                @endif


            <div class="mt-5">
                <a class="btn btn-secondary" href="{{route('orderIndex')}}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    登録する
                </button>
            </div>
        </form>
    </div>
</div>
<script>

function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection