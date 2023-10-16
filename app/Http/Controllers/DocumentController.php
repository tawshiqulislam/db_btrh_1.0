<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function store(Request $request, $id)
    {
        $user = User::find($id);

        foreach ($request->file('documents') as $document) {
            if ($document) {
                $uploadedDocument = $this->uploadImage($user->name, $document);
                Document::create([
                    'user_id' => $id,
                    'document' => $uploadedDocument,
                ]);
            }
        }
        toastr()->success('Documents uploaded successfully!', 'Congrats');
        return redirect()->back();
    }

    public function uploadImage($title, $image)
    {

        $file_name = time() . '-' . $title . '.' . $image->getClientOriginalExtension();

        $image->move('storage/document', $file_name);

        return $file_name;
    }
}
