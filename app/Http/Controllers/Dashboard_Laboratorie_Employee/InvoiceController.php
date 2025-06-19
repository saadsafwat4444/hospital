<?php

namespace App\Http\Controllers\Dashboard_Laboratorie_Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laboratorie;
use App\Traits\UploadTrait;

class InvoiceController extends Controller
{
    use UploadTrait;
     
    public function index()
    {
        $invoices = Laboratorie::where('case',0)->get();
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.index',compact('invoices'));

         
        
    }

    
    

    
     
   
    public function completed_invoices()
    {
        $invoices = Laboratorie::where('case',1)->where('employee_id',auth()->user()->id)->get();
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.completed_invoices',compact('invoices'));
    }

    
    public function edit($id)
    {
        $invoice = Laboratorie::findorFail($id);
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.add_diagnosis',compact('invoice'));
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
        $invoice = Laboratorie::findorFail($id);

        $invoice->update([
            'employee_id'=> auth()->user()->id,
            'description_employee'=> $request->description_employee,
            'case'=> 1,
        ]);


        if( $request->hasFile( 'photos' ) ) {
            foreach ($request->photos as $photo) {
                //Upload img
                $this->verifyAndStoreImageForeach($photo,'laboratories','upload_image',$invoice->id,'App\Models\Laboratorie');
            }
        }
        session()->flash('edit');
        return redirect()->route('invoices_ray_employee.index');
    }
    public function view_laboratories($id)
    {
        $laboratorie = Laboratorie::findorFail($id);
        if($laboratorie->employee_id !=auth()->user()->id){
            //abort(404);
            return redirect()->route('404');
        }
        return view('Dashboard.dashboard_LaboratorieEmployee.invoices.patient_details', compact('laboratorie'));
    }
}

    

