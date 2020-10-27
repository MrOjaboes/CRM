<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Package;
class PackageController extends Controller
{
    
   public function Index()
   {
     $packages = Package::orderBy('created_at','desc')->get();
     return view('packages.packages',compact('packages'));
   }

    public function Create()
    {
      return view('packages.create');
    }

    public function Store(Request $request)
    {
      $request->validate([
            
        'name' =>'required',
        'amount' =>'required',   
        
    ]);
    auth()->user()->packages()->create([             
        'name' =>$request['name'],
        'amount' =>$request['amount'],       
        'user_id'=>auth()->user()->id,         
      ]);
      return redirect('package/index')->with('success', 'Package Added succesfully');

    }
  
    public function Show(Package $package)
    {
      return view('packages.details',compact('package'));
    }

    public function Edit(Package $package)
    {
      return view('packages.edit',compact('package'));
    }

    public function Update(Request $request, Package $package) 
     {
      $this->validate($request, [
        'name' => '',
        'amount' => '',
         
    ]);
    $data = $request->all();         
    $package->update($data);
    return redirect()->back()->with('success', 'Package updated succesfully');
      
    }
    public function Delete(Request $request, Package $package)
    {
        $package->delete();

        return redirect()->back()->with('success', 'Package Deleted succesfully');
    }
}
