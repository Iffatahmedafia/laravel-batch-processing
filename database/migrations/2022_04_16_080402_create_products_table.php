<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('UNIQUE_KEY')->unique();
            $table->text('PRODUCT_TITLE')->nullable();
            $table->text('PRODUCT_DESCRIPTION')->nullable();
            $table->text('STYLE#')->nullable();
            $table->text('AVAILABLE_SIZES')->nullable();
            $table->text('BRAND_LOGO_IMAGE')->nullable();
            $table->text('THUMBNAIL_IMAGE')->nullable();
            $table->text('COLOR_SWATCH_IMAGE')->nullable();
            $table->text('PRODUCT_IMAGE')->nullable();
            $table->text('SPEC_SHEET')->nullable();
            $table->text('PRICE_TEXT')->nullable();
            $table->double('SUGGESTED_PRICE')->default(0);
            $table->text('CATEGORY_NAME')->nullable();
            $table->text('SUBCATEGORY_NAME')->nullable();
            $table->text('COLOR_NAME')->nullable();
            $table->text('COLOR_SQUARE_IMAGE')->nullable();
            $table->text('COLOR_PRODUCT_IMAGE')->nullable();
            $table->text('COLOR_PRODUCT_IMAGE_THUMBNAIL')->nullable();
            $table->text('SIZE')->nullable();
            $table->integer('QTY')->default(0);
            $table->double('PIECE_WEIGHT')->default(0);
            $table->double('PIECE_PRICE')->default(0);
            $table->double('DOZENS_PRICE')->default(0);
            $table->double('CASE_PRICE')->default(0);
            $table->text('PRICE_GROUP')->nullable();
            $table->integer('CASE_SIZE')->default(0);
            $table->integer('INVENTORY_KEY')->default(0);
            $table->text('SIZE_INDEX')->nullable();
            $table->text('SANMAR_MAINFRAME_COLOR')->nullable();
            $table->text('MILL')->nullable();
            $table->text('PRODUCT_STATUS')->nullable();
            $table->text('COMPANION_STYLES')->nullable();
            $table->text('MSRP')->nullable();
            $table->text('MAP_PRICING')->nullable();
            $table->text('FRONT_MODEL_IMAGE_URL')->nullable();
            $table->text('BACK_MODEL_IMAGE')->nullable();
            $table->text('FRONT_FLAT_IMAGE')->nullable();
            $table->text('BACK_FLAT_IMAGE')->nullable();
            $table->text('PRODUCT_MEASUREMENTS')->nullable();
            $table->text('PMS_COLOR')->nullable();
            $table->text('GTIN')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
