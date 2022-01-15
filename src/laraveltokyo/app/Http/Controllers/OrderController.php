<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::find(2);
        // $sample = $orders->stocks();
        $orders = Order::paginate(15);
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stocks = Stock::all();
        // $orders = Order::all();
        // $orderCreate = Order::find($id);
        // dd($orders);
        return view('order.create', compact('stocks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $inputs = $request->all();
        // dd($inputs);

        /** 選択IDの在庫価格確認し、発注時の発注数と掛ける */
        $stockPriceRecord = Stock::where('stock_id', $inputs['stock_id'])->value('stock_price');
        $totalPrice = $inputs["number_order"] * $stockPriceRecord;
        // dd($totalPrice);

        /** 該当在庫の在庫数の取り出し*/
        $stockQuantityRecord = Stock::where('stock_id', $inputs['stock_id'])->value('stock_quantity');

        DB::beginTransaction();
        try{

         if($stockQuantityRecord < $inputs['number_order']){
                $request->session()->flash('err_msg', '発注数が在庫数を超過しています');
                return redirect(route('orderCreate'));
         }else{
            $order = Order::create([
                'stock_id' => $inputs['stock_id'],
                'number_order' => $inputs['number_order'],
                'total_price' => $totalPrice,
                'status_num' => 5,
                'status' => "",
            ]);
            $order->save();

            /** 新規追加発注分のIDとレコードのstock_idを取得 */
            $newOrderRecord = Order::latest()->first();
            $stockUpdateRecord = Stock::find($newOrderRecord['stock_id']);

            /** 該当stockのstock_idから新たに発注した分の発注数をマイナスする→在庫数の減少対応 */
            $stockQuantityFinaly = $stockQuantityRecord - $newOrderRecord['number_order'];


            $stockUpdateRecord->fill([
                'stock_quantity' => $stockQuantityFinaly
            ]);
              $stockUpdateRecord->save();
         }
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            abort(500);
        }

        $request->session()->flash('success', '発注が完了しました');

        return redirect(route('orderIndex'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $orderShow = Order::find($id);

        if(!isset($orderShow)){

         $request->session()->flash('err_msg', 'データがありません');
         return redirect(route('orderIndex'));
        }
        return view('order.show', compact('orderShow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = Auth::user();
        $userStatusNum = $user['status_num'];

        $orderEdit = Order::find($id);

        if(!isset($orderEdit)){
            $request->session()->flash('err_msg', 'データがありません');
            return redirect(route('orderIndex'));
        }
        // dd($orderEdit);
        return view('order.edit', compact('orderEdit','userStatusNum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request)
    {

        /**こちらで弄らない項目についてはバリデーションを行う必要がなく、エラー表記の代わりとして画面読み込み後に同じ画面となるため注意 */

        $inputs = $request->all();
        // dd($request);
        DB::beginTransaction();
        try{
            $orderUpdateRecord = Order::find($inputs['id']);
            // dd($orderUpdateRecord);

            if($inputs['stock_quantity'] < $inputs['number_order']){
                $request->session()->flash('err_msg', '発注数が在庫数を超過しています');
                return redirect(route('orderEdit', $inputs['id']));

            }else{
                $orderUpdateRecord->fill([
                  'stock_id' => $inputs['stock_id'],
                  'stock_name' => $inputs['stock_name'],
                  'number_order' => $inputs['number_order'],
                  'stock_price' => $inputs['stock_price'],
                  'total_price' => $inputs['number_order'] * $inputs['stock_price'],
                  'status_num' => $inputs['status_num'],
                  'status' => $inputs['status']
                ]);
            }

            $orderUpdateRecord->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            abort(500);
        }
        $request->session()->flash('success', '発注情報を更新しました');

        return redirect(route('orderIndex'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DB::table('orders')->where('id',$id)->delete();

        $request->session()->flash('err_msg', '発注商品の削除に成功しました');
        return redirect(route('orderIndex'));
    }
}
