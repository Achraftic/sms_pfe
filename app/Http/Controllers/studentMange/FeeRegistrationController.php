<?php

namespace App\Http\Controllers\studentMange;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\GroupStudent;
use App\Models\YearStudent;
use App\Models\ShiftStudent;
use App\Models\DiscountStudent;
use App\Models\FeeAmount;
use App\Models\User;
use DB;
use PDF;
use Illuminate\Support\HtmlString;
class FeeRegistrationController extends Controller
{    //     $registerFe2=FeeAmount::where('fee_category_id','2')->first()->get() ;
    //    $registerFee=FeeAmount::where('fee_category_id','2')->where('class_id','1') ->first()->get();
    // $data=DiscountStudent::select('*')->where('fee_category_id','2')->get() ;
   //    $data=AssignStudent::select('*')->where('class_id',"2")->with(with(['student','discount']))->where()->get() ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $YearStudent=YearStudent::all();
        $StudentClass=StudentClass::all();
        $year_id=YearStudent::orderBy('id','desc')->first()->id;
        $class_id=StudentClass::orderBy('id','desc')->first()->id;



   $data = AssignStudent::where('year_id', $year_id)->with(["discount"])->get();

    $tableHtml = "false";

       return view('studentMangement.FeeReg.index',compact('tableHtml' ,'data','YearStudent','StudentClass','year_id','class_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function search(Request $request)
    {
  $YearStudent=YearStudent::all();
        $StudentClass=StudentClass::all();
        $year_id=$request->year;
        $class_id=$request->class;

    if($request->year){

        $data = AssignStudent::where('class_id',"like",'%'.$class_id .'%')->where('year_id',"like",'%'. $year_id.'%')->with(["discount"])->get();
        $table = ' <table class="table-auto w-full">';
         $table .= '<thead  class="text-xs font-semibold uppercase text-slate-500 bg-slate-50 border-t border-b border-slate-200">
         <tr>

                                         <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
                                             <div class="flex items-center">
                                                 <label class="inline-flex">
                                                     <span class="sr-only">Select all</span>
                                                     <input id="parent-checkbox" class="form-checkbox" type="checkbox"
                                                         @click="toggleAll" />
                                                 </label>
                                             </div>
                                         </th>
                                         <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                             <div class="font-semibold text-left">Id No</div>
                                         </th>

                                         <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                             <div class="font-semibold text-left">Name</div>
                                         </th>

                                         <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                             <div class="font-semibold text-left">Amount</div>
                                         </th>

                                         <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                             <div class="font-semibold text-left">Discount</div>
                                         </th>
                                         <th class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">
                                             <div class="font-semibold text-left">Final Amount</div>
                                         </th>

                                    
                                     </tr>
         </thead>';
         $table .= '<tbody class="text-sm divide-y divide-slate-200">';

         foreach ($data as $row) {
             $registerFee=FeeAmount::where('fee_category_id','2')->where('class_id',$row->class_id) ->first();
             $table .= '<tr>';
             $table .='<td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px">
             <div class="flex items-center">
                 <label class="inline-flex">
                     <span class="sr-only">Select</span>
                     <input class="table-item form-checkbox" type="checkbox"
                         @click="uncheckParent" />
                 </label>
             </div>
         </td>';
             $table .= ' <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap">  <div class="font-medium text-slate-700"> '   .$row->student->id_no . '</div></td>';
             $table .= ' <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap"> <div class="font-medium text-slate-700">' .$row->student->name  . '</div></td>';
             $table .= ' <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap"><div class="font-medium text-slate-700">' . $registerFee->amount. '$</div></td>';
             $table .= ' <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap"><div class="font-medium text-slate-700">' .$row->discount->discount. '% </div></td>';
             $table .= ' <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap"><div class="font-medium text-slate-700">' . $registerFee->amount. '$</div></td>';
        //      $table .= '   <td class="px-2 first:pl-5 last:pr-5 py-3 whitespace-nowrap w-px md:w-32">
        //      <div class=" flex space-x-1 ">

        //          <span class="mx-10 ">
        //              <a href=" {{ }}  "
        //                  class="text-indigo-500 hover:text-indigo-600 rounded-full">
        //                  <span class="sr-only">view</span>
        //                  <svg xmlns="http://www.w3.org/2000/svg" fill="none"
        //                      viewBox="0 0 24 24" stroke-width="2.1" stroke="currentColor"
        //                      class="w-[22px] h-[22px]">
        //                      <path stroke-linecap="round" stroke-linejoin="round"
        //                          d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
        //                      <path stroke-linecap="round" stroke-linejoin="round"
        //                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        //                  </svg>

        //              </a></span>




        //      </div>
        //  </td>';

             $table .= '</tr>';
         }

         $table .= '</tbody></table>';

         $tableHtml = new HtmlString($table);
    }
else{
    $tableHtml = new HtmlString("<div></div>");
}


            return view('studentMangement.FeeReg.index',compact('tableHtml' ,'data','YearStudent','StudentClass','year_id','class_id'));
    }


















    public function viewPdf($id,Request $request) {
        // retreive all records from db

        $YearStudent=YearStudent::all();
        $StudentClass=StudentClass::all();
        $year_id=$request->year;
        $class_id=$request->class;


        $data = AssignStudent::where('class_id',"like",'%'.$class_id .'%')->where('year_id',"like",'%'. $year_id.'%')->with(["discount"])->get();
        view()->share('user',$data);
        $pdf = PDF::loadView('studentMangement.FeeReg.pdf_view', $data);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');


      }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
