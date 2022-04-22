<?php

namespace App\Jobs;

use Throwable;
use App\Models\Sales;
use App\Models\Product;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProductCsvProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $header;
    public $string;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $header, $string)
    {
        $this->data   = $data;
        $this->header = $header;
        $this->string = $string;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->data as $sale) {
            $product = array_combine($this->header, $sale);

            Product::upsert(['UNIQUE_KEY' => $sale[0],
            'PRODUCT_TITLE' => $sale[1],
            'PRODUCT_DESCRIPTION' => $sale[2],
            'STYLE#' => $sale[3],
            'AVAILABLE_SIZES' => $sale[4],
            'BRAND_LOGO_IMAGE'=> $sale[5],
            'THUMBNAIL_IMAGE'=> $sale[6],
            'COLOR_SWATCH_IMAGE'=> $sale[7],
            'PRODUCT_IMAGE'=> $sale[8],
            'SPEC_SHEET' => $sale[9],
            'PRICE_TEXT'=> $sale[10],
            'SUGGESTED_PRICE'=> $sale[11],
            'CATEGORY_NAME'=> $sale[12],
            'SUBCATEGORY_NAME'=> $sale[13],
            'COLOR_NAME'=> $sale[14],
            'COLOR_SQUARE_IMAGE'=> $sale[15],
            'COLOR_PRODUCT_IMAGE'=> $sale[16],
            'COLOR_PRODUCT_IMAGE_THUMBNAIL'=> $sale[17],
            'SIZE'=> $sale[18],
            'QTY'=> $sale[19],
            'PIECE_WEIGHT'=> $sale[20],
            'PIECE_PRICE'=> $sale[21],
            'DOZENS_PRICE'=> $sale[22],
            'CASE_PRICE'=> $sale[23],
            'PRICE_GROUP'=> $sale[24],
            'CASE_SIZE'=> $sale[25],
            'INVENTORY_KEY'=> $sale[26],
            'SIZE_INDEX'=> $sale[27],
            'SANMAR_MAINFRAME_COLOR'=> $sale[28],
            'MILL'=> $sale[29],
            'PRODUCT_STATUS'=> $sale[30],
            'COMPANION_STYLES'=> $sale[31],
            'MSRP'=> $sale[32],
            'MAP_PRICING'=> $sale[33],
            'FRONT_MODEL_IMAGE_URL'=> $sale[34],
            'BACK_MODEL_IMAGE'=> $sale[35],
            'FRONT_FLAT_IMAGE'=> $sale[36],
            'BACK_FLAT_IMAGE'=> $sale[37],
            'PRODUCT_MEASUREMENTS'=> $sale[38],
            'PMS_COLOR'=> $sale[39],
            'GTIN'=> $sale[40]],['UNIQUE_KEY']);
    
           
        
    }
}

    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }
}
