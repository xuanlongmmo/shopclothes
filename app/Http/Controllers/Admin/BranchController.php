<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\branch;

class BranchController extends Controller
{
    public function getbranch(){
        $branchs = branch::All(); 
        return view('admin.branch.index',compact('branchs'));
    }

    public function deletebranch($id){
        $delete = branch::find($id)->delete();
        return redirect()->route('admin.branch');
        
    }

    public function addbranch(){
        return view('admin.branch.add');
    }

    public function postaddbranch(Request $request){
        $branch = branch::create($request->all());
        return redirect()->route('admin.branch');
    }

    public function editbranch($id){
        $branch = branch::find($id);
        return view('admin.branch.edit',compact('branch'));
    }

    public function posteditbranch(Request $request){
        $branch = branch::find($request->id);
        if($request->id==1){
            $branch->update([
                'branch_name' => $request->branch_name, 
                'email' => $request->email, 
                'phone'=> $request->phone, 
                'address' => $request->address, 
                'facebook' => $request->facebook, 
                'twitter' => $request->twitter, 
                'instagram' => $request->instagram, 
                'youtube'=> $request->youtube, 
                'bank_name' => $request->bank_name, 
                'bank_number' => $request->bank_number, 
                'name_company'=> $request->name_company
                ]);
        }else{
            $branch->update([
                'branch_name' => $request->branch_name, 
                'email' => $request->email, 
                'phone'=> $request->phone, 
                'address' => $request->address, 
                'facebook' => $request->facebook, 
                'twitter' => $request->twitter, 
                'instagram' => $request->instagram, 
                'youtube'=> $request->youtube,
                ]);
        }
        return redirect()->route('admin.branch');
    }

}
