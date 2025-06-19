<?php

namespace App\Http\Controllers;

use App\Models\LaboratorieEmployee;
use Illuminate\Http\Request;
use App\Interfaces\LabEmployee\LaboratorieEmployeeRepositoryInterface;
class LaboratorieEmployeeController extends Controller
{
     
   
    private $laboratorie_employee;

    public function __construct(LaboratorieEmployeeRepositoryInterface $laboratorie_employee)
    {
        $this->laboratorie_employee = $laboratorie_employee;
    }

    public function index()
    {
        return $this->laboratorie_employee->index();
    }

    
    
    public function store(Request $request)
    {
        return $this->laboratorie_employee->store($request);
    }

     

   

    
    public function update(Request $request, $id)
    {
        return $this->laboratorie_employee->update($request,$id);
    }


    public function destroy($id)
    {
        return $this->laboratorie_employee->destroy($id);
    }
}
