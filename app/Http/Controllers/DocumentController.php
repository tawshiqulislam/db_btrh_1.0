<?php

namespace App\Http\Controllers;

use App\Helpers\FileDocuments;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function store(Request $request)
    {


        // foreach ($request->file('documents') as $document) {
        //     if ($document) {
        //         $uuid = Str::uuid();
        //         $uploadedDocument = $this->uploadImage($uuid, $document);
        //         Document::create([
        //             'user_id' => $id,
        //             'document' => $uploadedDocument,
        //         ]);
        //     }
        // }
        $uploadedDocument = $this->uploadImage($request->keyword, $request->document);
        Document::create([
            'user_id' => auth()->user()->id,
            'keyword' => $request->keyword,
            'document' => $uploadedDocument,
        ]);
        toastr()->success('Documents uploaded successfully!', 'Congrats');
        return redirect()->back();
    }

    public function delete($id)
    {

        $document = Document::find($id);
        FileDocuments::unlinkDocument($document->document);
        $document->delete();
        toastr()->success('Documents deleted successfully!', 'Congrats');
        return redirect()->back();
    }
    public function uploadImage($title, $image)
    {

        $file_name = time() . '-' . $title . '.' . $image->getClientOriginalExtension();

        $image->move('storage/document', $file_name);

        return $file_name;
    }
}
