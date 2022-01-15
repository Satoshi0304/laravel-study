@extends('layout')
@section('title', '在庫登録')
@section('content')

 <!-- デフォルトの権限nullが必須 -->
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>在庫登録</h2>
         <form method="POST" action="{{route('stockStore')}}" onSubmit="return checkSubmit()">
          @csrf

            <div class="form-group">
                <label for="stock_name">
                    在庫名
                </label>
                <!-- idはlabelと関連付け、nameはそのまま classは装飾 valueはデフォルトの値、typeは記入欄の形-->
                <input
                    id="stock_name"
                    name="stock_name"
                    class="form-control"
                    value="{{ old('stock_name') }}"
                    type="text"
                >

                @if ($errors->has('stock_name'))
                <div class="text-danger">
                  {{ $errors->first('stock_name')}}
                </div>
                @endif

                <label for="stock_quantity">
                    在庫数
                </label>
                <!-- idはlabelと関連付け、nameはそのまま classは装飾 valueはデフォルトの値、typeは記入欄の形-->
                <input
                    id="stock_quantity"
                    name="stock_quantity"
                    class="form-control"
                    value="{{ old('stock_quantity') }}"
                    type="number"
                >

                @if ($errors->has('stock_quantity'))
                <div class="text-danger">
                  {{ $errors->first('stock_quantity')}}
                </div>
                @endif

                <label for="stock_price">
                    在庫価格
                </label>
                <!-- idはlabelと関連付け、nameはそのまま classは装飾 valueはデフォルトの値、typeは記入欄の形-->
                <input
                    id="stock_price"
                    name="stock_price"
                    class="form-control"
                    value="{{ old('stock_price') }}"
                    type="number"
                >

                @if ($errors->has('stock_price'))
                <div class="text-danger">
                  {{ $errors->first('stock_price')}}
                </div>
                @endif


            <div class="mt-5">
                <a class="btn btn-secondary" href="/">
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