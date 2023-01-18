<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Employee;
use App\Models\Person;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DealController extends Controller
{
    public function index(){
        $deals = DB::table('deals')
        ->where('delete', 0)
        ->paginate(10);
        return view('deals.index', compact('deals'));
    }

    public function indexDelete(){
        $deals = DB::table('deals')
        ->where('delete', 1)
        ->paginate(10);
        return view('deals.index', compact('deals'))->with('message_red', 'Zestawienie usuniętych wydań');
    }

    public function create(){
        return view('deals.create');
    }

    public function store(Request $request){

        $deal = new Deal();

        $deal->product_code = $request->code;
        $deal->product_name = $request->name;
        $deal->employee = $request->employee;
        $deal->pcs = $request->pcs;
        $deal->destiny = $request->destiny;
        $deal->description = $request->description;

        $deal->save();

        return redirect()->route('deals.index')->with('message', 'Dodano wpis poprawnie');
    }

    public function edit($id){

        $deal = Deal::find($id);

        return view('deals.edit', compact('deal'));
    }

    public function update($id, Request $request){

        $deal = Deal::find($id);

        $deal->product_code = $request->code;
        $deal->product_name = $request->name;
        $deal->employee = $request->employee;
        $deal->pcs = $request->pcs;
        $deal->destiny = $request->destiny;
        $deal->description = $request->description;

        $deal->save();

        return redirect()->route('deals.index')->with('message', 'Zmodyfikowano wpis poprawnie');
    }

    public function destroy($id){
        Deal::destroy($id);
    }

    // W kroku pierwszym szukamy artukułu po kodzie lub nazwie
    public function step1(Request $request){

        $code = $request->codeorname;

        // $product = DB::table('products')->where('code', $request->codeorname)->first();
        $product = DB::connection('asystent')->table('dk_magazyn')->where('kodykreskowe', 'like', '%'.$request->codeorname.'%')->first();

        // szukanie po nazwie - narazie wylaczone
        // if($product == null){
        //     $product = DB::connection('asystent')->table('dk_magazyn')->where('nazwa', 'like', '%'.$request->codeorname.'%')->first();
        // }

        return view('deals.create2', compact('product', 'code'));
    }

    public function step2(Request $request){

        $productname = $request->name;
        $productcode = $request->code;

        $searchname = $request->searchname;
        $destiny = $request->destiny;

        $employee = DB::table('employees')->where('code', $searchname)->first();

        if($employee == null){
            $employee = $searchname;
        }else{
            $employee = $employee->name;
        }

        return view('deals.create3', compact('employee', 'productname', 'productcode', 'destiny'));
    }

    public function delete($id){

        $deal = Deal::find($id);

        $deal->delete = true;

        $deal->save();

        return redirect()->route('deals.index')->with('message_red', 'Usunięto wydanie');
    }
}
