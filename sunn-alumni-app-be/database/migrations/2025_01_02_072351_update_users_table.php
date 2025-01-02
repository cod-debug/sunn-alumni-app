<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('users', function(Blueprint $table){
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments');

            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');

            $table->unsignedBigInteger('nature_of_work_id');
            $table->foreign('nature_of_work_id')->references('id')->on('natures_of_work');

            $table->unsignedBigInteger('permanent_address_region_id')->nullable();
            $table->foreign('permanent_address_region_id')->references('id')->on('philippine_regions');

            $table->unsignedBigInteger('permanent_address_province_id')->nullable();
            $table->foreign('permanent_address_province_id')->references('id')->on('philippine_provinces');

            $table->unsignedBigInteger('permanent_address_city_id')->nullable();
            $table->foreign('permanent_address_city_id')->references('id')->on('philippine_cities');

            $table->unsignedBigInteger('permanent_address_barangay_id')->nullable();
            $table->foreign('permanent_address_barangay_id')->references('id')->on('philippine_barangays');

            $table->longText('permanent_address_1')->nullable();
            $table->longText('permanent_address_2')->nullable();
            
            $table->unsignedBigInteger('present_address_region_id')->nullable();
            $table->foreign('present_address_region_id')->references('id')->on('philippine_regions');

            $table->unsignedBigInteger('present_address_province_id')->nullable();
            $table->foreign('present_address_province_id')->references('id')->on('philippine_provinces');

            $table->unsignedBigInteger('present_address_city_id')->nullable();
            $table->foreign('present_address_city_id')->references('id')->on('philippine_cities');

            $table->unsignedBigInteger('present_address_barangay_id')->nullable();
            $table->foreign('present_address_barangay_id')->references('id')->on('philippine_barangays');

            $table->longText('present_address_1')->nullable();
            $table->longText('present_address_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('department_id');
            $table->dropColumn('course_id');
            $table->dropColumn('nature_of_work_id');
            $table->dropColumn('permanent_address_region_id');
            $table->dropColumn('permanent_address_province_id');
            $table->dropColumn('permanent_address_city_id');
            $table->dropColumn('permanent_address_barangay_id');
            $table->dropColumn('permanent_address_1');
            $table->dropColumn('permanent_address_2');
            $table->dropColumn('present_address_region_id');
            $table->dropColumn('present_address_province_id');
            $table->dropColumn('present_address_city_id');
            $table->dropColumn('present_address_barangay_id');
            $table->dropColumn('present_address_1');
            $table->dropColumn('present_address_2');
        });
    }
};
