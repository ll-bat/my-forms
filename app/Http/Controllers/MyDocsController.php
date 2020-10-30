<?php

namespace App\Http\Controllers;

use App\Export;
use FontLib\EOT\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class MyDocsController extends Controller
{
      public function index(){
          $docs = Export::where('user_id', current_user()->id)->latest()->get();
          return view('user.mydocs', compact('docs'));
      }

      public function show(Export $export){
          $this->authorize('show-doc', $export);

          $file =  Storage::get($export->path());

          $response = Response::make($file, 200);
          $response->header('Content-Type', 'application/pdf');
          return $response;
      }

      public function download(Export $export){
          $this->authorize('show-doc', $export);

          $filename = $export->filename;

          $headers = array(
              'Content-Type: application/pdf',
          );

          return Response::download(storage_path("app/public/exports/$filename"), 'result.pdf', $headers);
      }

      public function delete(Export $export){
          $this->authorize('show-doc', $export);

          if (file_exists('storage/exports/'.$export->filename)){
              unlink('storage/exports/'.$export->filename);
          }

          $export->delete();

          return back();
      }
}
