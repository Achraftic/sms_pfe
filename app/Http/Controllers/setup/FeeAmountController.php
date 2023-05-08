<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeAmount;
use App\Models\StudentClass;
use App\Models\FeeCategory;

class FeeAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view("setupMangement.feeAmount.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = FeeAmount::all();
        $stdent_class = StudentClass::all();
        $fee_category = FeeCategory::all();
        return view('setupMangement.feeAmount.create', compact('data', 'fee_category', 'stdent_class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countclass = count($request->class_id);
        if ($countclass != null) {
            for ($i = 0; $i < $countclass; $i++) {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }

        return redirect()->route('fee.amount.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data['data']  =FeeAmount::where('fee_category_id',$id)->orderBy('class_id','asc')->get();

      $data['stdent_class'] = StudentClass::all();
      $data['fee_category'] = FeeCategory::all();

      return view ('setupMangement.feeAmount.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            if($request->class_id== NULL){
                return abort('404');
            }
            else{



        $countclass = count($request->class_id);
        FeeAmount::where('fee_category_id',$id)->delete();
        if ($countclass != null) {
            for ($i = 0; $i < $countclass; $i++) {
                $fee_amount = new FeeAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }
    }
        return redirect()->route('fee.amount.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data['data']  =FeeAmount::where('fee_category_id',$id)->orderBy('class_id','asc')->get();
        return view('setupMangement.feeAmount.detail',$data);
    }
}
