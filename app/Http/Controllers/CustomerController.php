<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;


class CustomerController extends Controller
{
    protected $cData=[];

    public function index(){
    	
    	$cData=Customer::orderBy('id','desc')->paginate();
    	return view('home',compact('cData'));
    }

    public function submitCustomer(Request $request)
    {
    	if($request->isMethod('get')){
    		return redirect()->back();
    	}
    	if($request->isMethod('post')){
    		$cData['customerName']=$request->customerName;
            $cData['address']=$request->address;
            $cData['organization']=$request->organization;
            $cData['email']=$request->email;
            $cData['mobileNumber']=$request->mobileNumber;
            if($request->hasFile('image'))
            {
                $image=$request->file('image');
                $ext=$image->getClientOriginalExtension();//extracts the extension of a file
                $imageName=str_random().'.'.$ext;     //randomly generates string value
                $uploadPath=public_path('lib/images');
                if(!$image->move($uploadPath, $imageName))
                {
                    return redirect()->back;
                }

                $cData['image']=$imageName;//data pathauda image ko name jada
                
            }
            if(Customer::create($cData)){
                return redirect()->route('home')->with('success','Record is inserted');
            }
        }
    }

    public function editCustomer(Request $request)
    {
        $id = $request->customer_id;
        $cData=Customer::findorfail($id);
        return view('edit_customer',compact('cData'));
    }

    public function editAction(Request $request)
    {
        $id = $request->customer_id;
        $cData['customerName']=$request->customerName;
        $cData['address']=$request->address;
        $cData['organization']=$request->organization;
        $cData['email']=$request->email;
        $cData['mobileNumber']=$request->mobileNumber;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();//extracts the extension of a file
            $imageName = str_random() . '.' . $ext;     //randomly generates string value
            $uploadPath = public_path('lib/images');
            if ($this->deleteImage($id) && $image->move($uploadPath, $imageName)) {
                $cData['image'] = $imageName;
            }


        }
        if (Customer::where('id', $id)->update($cData)) {
            return redirect()->route('home')->with('success', 'Record is edited');
        }
    }

    public function deleteImage($id)
    {
        $cData=Customer::findOrFail($id);
        $imageName=$cData->image;
        $imageDeletePath=public_path('lib/images/'.$imageName);

        if(file_exists($imageDeletePath))
        {
            return unlink($imageDeletePath);
        }
        return true;
    }

    public function deleteCustomer(Request $request)
    {
        $id = $request->customer_id;
        if ($this->deleteImage($id) && Customer::WHERE('id',$id)->delete($id))
        {
            return redirect()->route('home')->with('success','Record is deleted.');
        }
    }

}
