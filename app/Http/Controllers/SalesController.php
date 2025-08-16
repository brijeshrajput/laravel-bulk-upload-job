<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use App\Jobs\SalesUploadProcess;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;


class SalesController extends Controller
{
    public function index()
    {
        return view('sales.upload');
    }

    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        try {
            $data = file($request->file('csv_file'));

            $batch = Bus::batch([])->dispatch();

            // Log batch ID for debugging
            Log::info('Batch ID: ' . $batch->id);

            // Chunk size can be adjusted based on our needs
            $chunks = array_chunk($data, 1000);
            $header = [];
            foreach ($chunks as $key => $chunk) {
                $data = array_map('str_getcsv', $chunk);

                if ($key === 0) {
                    $header = $data[0];
                    unset($data[0]);
                }

                $batch->add(new SalesUploadProcess($data, $header));
            }
            // Log when a job is added to the batch
            Log::info('Jobs added to batch');

            toastr()->success('File uploaded successfully!', 'Success', ['timeOut' => 5000]);

            return redirect()->route('batch', ['id' => $batch->id]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            toastr()->error($e->getMessage(), 'Error', ['timeOut' => 5000]);
            return redirect()->back();
        }


    }


    public function batch($id)
    {
        $batch = Bus::findBatch($id);
        return view('sales.batch-progress', compact('batch'));
    }

    public function batchProgress($id)
    {
        $batch = Bus::findBatch($id);
        return response()->json(['progress' => $batch->progress()]);
    }

    public function batchInProgress()
    {
        $batches = DB::table('job_batches')->where('pending_jobs', '>', 0)->get();
        if ($batches->isNotEmpty()) {
            return Bus::findBatch($batches->first()->id);
        }

        return [];
    }


}
