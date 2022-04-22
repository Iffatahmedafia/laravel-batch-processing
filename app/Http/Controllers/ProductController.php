<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Jobs\ProductCsvProcess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bus;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index()
    {
        
        return view('upload-file');
        
        
    }

    public function upload(Request $request)
    {
        if (request()->has('mycsv')) {
            $data   =   file(request()->mycsv);
            $name = $request->file('mycsv')->getClientOriginalName();
            // Chunking file
            $chunks = array_chunk($data, 750);
            $string='Pending';
            $header = [];
            $batch  = Bus::batch([])->dispatch();

            foreach ($chunks as $key => $chunk) {
                $data = array_map('str_getcsv', $chunk);

                if ($key === 0) {
                    $header = $data[0];
                    unset($data[0]);
                }

                $batch->add(new ProductCsvProcess($data, $header, $string));
                
                
                    
                
            }
           
           // $batches = DB::table('job_batches')->where('pending_jobs', '>', 0)->first();
           //dd($name);
          
            return redirect()->route('dashboard', ['id'=>$batch->id,'name'=>$name]);
           // return $string;

              
           }
        

        return 'please upload file';
    }

    // public function batches($id)
    // {
    //     $batch = null;
    //     $batchId = $id;
    //     $batch = Bus::findBatch($batchId);
    //     return redirect()->route('dashboard', compact('batch'));
    // }


    public function dashboard($id,$name)
    {
        $batches = DB::table('job_batches')->where('finished_at', '!=', null)->orderBy('created_at', 'desc')->get();
        $batch = null;
        $batchId = $id;
        $name = $name;
        $batch = Bus::findBatch($batchId);
        $batchtime = DB::table('job_batches')->where('id', $id)->first();
        $date = Carbon::parse($batchtime->created_at); // now date is a carbon instance
        $elapsed = $date->diffForHumans();
       // dd($elapsed);
        
        return view('dashboard', compact(['batch','name','elapsed','batches']));
    }

   
}
