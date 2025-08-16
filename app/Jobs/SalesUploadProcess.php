<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Sales;
use Illuminate\Support\Facades\Log;
use Throwable;

class SalesUploadProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $header;

    /**
     * Create a new job instance.
     */
    public function __construct($data, $header)
    {
        $this->data   = $data;
        $this->header = $header;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $insertData = [];
            foreach ($this->data as $sale) {
                $saleData = array_combine($this->header, $sale);
                $insertData[] = $saleData;
            }

            // Insert the Jobs into the database
            if (!empty($insertData)) {
                Sales::insert($insertData);
            }
        } catch (\Exception $e) {
            Log::error('Error processing CSV data: ' . $e->getMessage());
            // We can handle the error here, e.g., retry the job or mark it as failed
            // $this->release(10); // Retry after 10 seconds
            // $this->fail($e); // Mark the job as failed
        }
    }

    /**
     * The job failed to process.
     */
    public function failed(Throwable $exception)
    {
        Log::error('CSV processing job failed: ' . $exception->getMessage());
        // We can send notifications, etc.
    }
}
