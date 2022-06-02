<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class SlotJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $xmlFile = file_get_contents(storage_path() . '/app/public/files/slots.xml');

        $xmlObject = simplexml_load_string($xmlFile);

        $jsonFormatData = json_encode($xmlObject);
        $result = json_decode($jsonFormatData, true);

        if( $result['slot'] )
        {

            $data = Collect($result['slot']);
            DB::table('slots')->truncate();
            foreach ($data->chunk(1000) as $items)
            {
                DB::table('slots')->insert($items->toArray());
            }

        }

    }
}
