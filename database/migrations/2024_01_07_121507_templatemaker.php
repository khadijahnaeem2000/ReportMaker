<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Templatemaker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TemplateMaker', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('TemplateFolder_id'); // Foreign key column
            $table->foreign('TemplateFolder_id')->references('id')->on('TemplateFolder')->onDelete('cascade');
            $table->longText('Html_Code')->nullable();
            $table->string("TableName")->nullable();
            $table->string("PageName")->nullable();
            $table->longText("tablewithcolumn")->nullable();
            $table->longText("cover")->nullable();
            $table->Date("StartDate")->nullable();
            $table->Date("EndDate")->nullable();
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
        //
    }
}
