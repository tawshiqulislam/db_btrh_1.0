<?php

namespace App\Http\Controllers;

use App\Helpers\FileDocuments;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function store(Request $request, $id)
    {

        //working validation
        // $request->validate([
        //     'title' => [Rule::unique('documents,keyword')->where(function ($query) {
        //         return $query->where('user_id', '!=', auth()->id());
        //     })],
        // ]);


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
        $uploadedDocument = FileDocuments::uploadDocument($request->keyword, $request->document);
        Document::create([
            'user_id' => $id,
            'keyword' => $request->keyword,
            'document' => $uploadedDocument,
        ]);
        toastr()->success('Documents uploaded successfully!', 'Congrats');
        return redirect()->back();
    }

    public function delete($id)
    {

        $document = Document::find($id);
        $document->delete();
        toastr()->success('Documents deleted successfully!', 'Congrats');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'keyword' => [
        //         Rule::unique('documents')->ignore($id),
        //     ],
        // ], [
        //     'keyword.unique' => "Upload Failed! The keyword is already in use. Please use a unique keyword",
        // ]);

        $document = Document::find($id);
        $data = $request->except('_token');
        if ($request->hasFile('document')) {
            // Handle profile picture upload and update
            FileDocuments::unlinkDocument($document->document);
            $data['document'] = FileDocuments::uploadDocument($request->keyword, $request->document);
        }
        $document->update($data);
        toastr()->success('Documents updated successfully!', 'Congrats');
        return redirect()->back();
    }
}
