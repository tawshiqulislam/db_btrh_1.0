<?php

namespace App\Http\Controllers;

use App\Helpers\FileDocuments;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\Document;
use App\Models\SecurityQuestion;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class VendorController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorize('admin');
    // }

    public function index()
    {
        $vendors = User::where('user_type', 'vendor')->paginate(10);

        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.vendor.vendor_index', compact('vendors', 'sl'));
    }

    public function create()
    {
        $security_questions = SecurityQuestion::all();
        return view('backend.pages.vendor.vendor_create', compact('security_questions'));
    }

    public function store(StoreVendorRequest $request)
    {

        if ($request->document) {
            $data = $request->except('document');
        } else {
            $data = $request->all();
        }


        if ($request->pro_pic) {
            $image = $this->uploadImage($request->name, $request->pro_pic);
            $data['pro_pic'] = $image;
        }

        $data['user_type'] = 'vendor';
        $vendor = User::create($data);
        if ($request->document) {

            $document = FileDocuments::uploadDocument($request->name, $request->document);
            Document::create([
                'document' => $document,
                'user_id' => $vendor->id
            ]);
        }
        // if ($vendor->user_type == 'vendor') {
        //     $vendor->assignRole('vendor');
        // }
        // if ($vendor->user_type == 'vendor') {
        //     $vendor->assignRole('vendor');
        // }
        toastr()->success('Vendor created successfully!', 'Congrats');
        return redirect()->route('vendor.index');
    }

    public function delete($id)
    {
        $vendor =  User::where('id', $id)->first();
        // $user_documents = Document::where('id', $id)->get();


        // if ($vendor->pro_pic) {
        //     $this->unlink($vendor->pro_pic);
        // }

        $documents = Document::where('user_id', $id)->get();
        if ($documents) {
            foreach ($documents as $document) {
                // FileDocuments::unlinkDocument($document->document);
                $document->delete();
            }
        }

        $vendor->delete();
        toastr()->error('Vendor deleted!', 'Delete');
        return redirect()->back();
    }

    public function edit($id)
    {
        $vendor = User::find($id);
        $security_questions = SecurityQuestion::all();
        return view('backend.pages.vendor.vendor_edit', compact('vendor', 'security_questions'));
    }
    public function update(UpdateVendorRequest $request, $id)
    {
        $vendor = User::find($id);
        $data = $request->except('_token');
        $newData = [];

        if ($request->document) {
            $data = $request->except('document');
            // Handle document upload and update
            $newData['document'] = FileDocuments::uploadDocument($request->name, $request->document);

            // Remove the previous document (if any)
            if (!empty($vendor->document)) {
                FileDocuments::unlinkDocument($vendor->document);
            }
        }

        if ($request->password === null) {
            $data['password'] = $vendor->password;
        }

        if ($request->hasFile('pro_pic')) {
            // Handle profile picture upload and update
            $this->unlink($vendor->pro_pic);
            $data['pro_pic'] = $this->uploadImage($request->name, $request->pro_pic);
        }

        $vendor->update($data);

        // Update the vendor's document (if necessary)
        if (!empty($newData)) {
            $document = Document::where('user_id', $id)->first();
            if ($document) {
                FileDocuments::unlinkDocument($document->document);
                $document->update($newData);
            } else {
                // If the document record doesn't exist, create a new one
                Document::create([
                    'user_id' => $id,
                    'document' => $newData['document'],
                ]);
            }
        }

        toastr()->success('Vendor updated successfully!', 'Congrats');
        return redirect()->route('vendor.index');
    }

    public function info($id)
    {
        $vendor = User::find($id);
        $roles = Role::all();
        return view('backend.pages.vendor.vendor_info', compact('vendor', 'roles'));
    }

    //remove profile picture
    public function remove_profile_picture($id)
    {
        $vendor =  User::where('id', $id)->first();


        if ($vendor->pro_pic) {
            $this->unlink($vendor->pro_pic);
        }
        $vendor->update([
            'pro_pic' => null
        ]);
        toastr()->error('Profile picture deleted!', 'Delete');
        return redirect()->back();
    }
    //upload profile picture
    public function update_profile_picture(Request $request, $id)
    {
        $request->validate([

            'pro_pic' => ['nullable', 'image', 'max:2048'],

        ]);

        $vendor =  User::find($id);

        $data = $request->except('_token');



        if ($request->hasFile('pro_pic')) {
            $vendor = User::where('id', $id)->first();

            $this->unlink($vendor->pro_pic);

            $data['pro_pic'] = $this->uploadImage($vendor->name, $request->pro_pic);
        }
        $vendor->update($data);

        toastr()->success('Profile picture save successfully!', 'Congrats');
        return redirect()->back();
    }
    //role assign
    public function role_assign(Request $request, $id)
    {


        $vendor = User::find($id);
        if ($vendor->hasRole($request->name)) {
            toastr()->error('Role already exist!', 'Alert');
        }
        if (!$vendor->hasRole($request->name)) {
            $vendor->assignRole($request->name);
            // $vendor->update([
            //     'isVerified' => true,
            //     'verified_by' => auth()->vendor()->id,
            // ]);
            toastr()->success('Role assigned successfully!', 'Congrats');
        }

        return redirect()->back();
    }
    public function role_delete(Request $request, $id)
    {

        $vendor = User::find($id);

        foreach ($request->roles as $role) {

            $vendor->removeRole($role);
        };
        toastr()->error('Role removed!', 'Alert');
        return redirect()->back();
    }
    public function vendor_verified($id)
    {
        User::find($id)->update([
            'isVerified' => true,
            'verified_by' => auth()->user()->id
        ]);
        toastr()->success('Vendor is verified now!', 'Congrats!');
        return redirect()->back();
    }
    public function vendor_unverified($id)
    {
        User::find($id)->update([
            'isVerified' => false,
            'unverified_by' => auth()->user()->id
        ]);
        toastr()->error('Vendor is unverified now!', 'Alert!');
        return redirect()->back();
    }
    //image function

    public function uploadImage($title, $image)
    {

        $file_name = time() . '-' . $title . '.' . $image->getClientOriginalExtension();

        $image->move('storage/vendor', $file_name);

        return $file_name;
    }



    private function unlink($image)
    {
        $pathToUpload = storage_path() . '/app/public/vendor/';
        if ($image != '' && file_exists($pathToUpload . $image)) {
            @unlink($pathToUpload . $image);
        }
    }
}
