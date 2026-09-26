<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PurchaseFileController extends Controller
{
    public function index()
    {
        $files = PurchaseFile::with('purchase')
            ->latest()
            ->paginate(10);

        $purchases = Purchase::latest()->get();

        return view(
            'purchase_files.index',
            compact('files', 'purchases')
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([

            'purchase_id' =>
                'nullable|exists:purchases,id',

            'file' =>
                'required|file|max:10240|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx,csv',

        ]);


        $file = $request->file('file');


        // Store file

        $path = $file->store(
            'purchase-files',
            'public'
        );


        // Save information in database

       PurchaseFile::create([
    'purchase_id' => $request->purchase_id,
    'original_name' => $file->getClientOriginalName(),
    'file_name' => $file->hashName(),
    'file_path' => $path,
    'file_type' => $file->getClientMimeType(),
    'file_size' => $file->getSize(),
]);


        return redirect()
            ->route('purchase-files.index')
            ->with(
                'success',
                'File uploaded successfully.'
            );
    }


    public function download(PurchaseFile $purchaseFile)
    {
        if (!Storage::disk('public')->exists(
            $purchaseFile->file_path
        )) {

            return redirect()
                ->route('purchase-files.index')
                ->with(
                    'error',
                    'File not found.'
                );
        }


        return Storage::disk('public')->download(
            $purchaseFile->file_path,
            $purchaseFile->file_name
        );
    }


    public function destroy(PurchaseFile $purchaseFile)
    {
        if (Storage::disk('public')->exists(
            $purchaseFile->file_path
        )) {

            Storage::disk('public')->delete(
                $purchaseFile->file_path
            );
        }


        $purchaseFile->delete();


        return redirect()
            ->route('purchase-files.index')
            ->with(
                'success',
                'File deleted successfully.'
            );
    }
}