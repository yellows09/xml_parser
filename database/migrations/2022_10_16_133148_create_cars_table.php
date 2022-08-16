<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dealer_id')->references('id')->on('dealers')->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->onDelete('cascade');
            $table->string('subcategory')->nullable();
            $table->string('type')->nullable();
            $table->decimal('year')->nullable();
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands')->onDelete('cascade');
            $table->foreignId('model_id')->nullable()->references('id')->on('models')->onDelete('cascade');
            $table->foreignId('generation_id')->nullable()->references('id')->on('generations')->onDelete('cascade');
            $table->foreignId('body_configuration_id')->nullable()->references('id')->on('body_configurations')->onDelete('cascade');
            $table->foreignId('modification_id')->nullable()->references('id')->on('modifications')->onDelete('cascade');
            $table->string('complectation')->nullable();
            $table->string('brand_complectation')->nullable();
            $table->string('engine_type')->nullable();
            $table->integer('engine_volume')->nullable();
            $table->integer('engine_power')->nullable();
            $table->string('body_type')->nullable();
            $table->smallInteger('body_door_count')->nullable();
            $table->string('body_color')->nullable();
            $table->string('body_color_metallic')->nullable();
            $table->string('drive_type')->nullable();
            $table->string('gearbox_type')->nullable();
            $table->integer('gearbox_gear_count')->nullable();
            $table->string('steering_wheel')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('mileage_unit')->nullable();
            $table->bigInteger('price')->nullable();
            $table->integer('special_offer')->nullable();
            $table->decimal('special_offer_previous_price')->nullable();
            $table->decimal('tradein_discount')->nullable();
            $table->decimal('credit_discount')->nullable();
            $table->decimal('insurance_discount')->nullable();
            $table->decimal('max_discount')->nullable();
            $table->string('availability')->nullable();
            $table->string('pts_type')->nullable();
            $table->string('country')->nullable();
            $table->string('operating_time')->nullable();
            $table->string('eco_class')->nullable();
            $table->integer('drive_wheel')->nullable();
            $table->integer('axis_count')->nullable();
            $table->integer('brake_type')->nullable();
            $table->integer('cabin_type')->nullable();
            $table->integer('maximum_permitted_mass')->nullable();
            $table->decimal('saddle_height')->nullable();
            $table->decimal('cabin_suspension')->nullable();
            $table->decimal('chassis_suspension')->nullable();
            $table->decimal('length')->nullable();
            $table->decimal('width')->nullable();
            $table->decimal('body_volume')->nullable();
            $table->decimal('bucket_volume')->nullable();
            $table->decimal('traction_class')->nullable();
            $table->decimal('refrigerator_class')->nullable();
            $table->decimal('crane_arrow_radius')->nullable();
            $table->decimal('crane_arrow_length')->nullable();
            $table->decimal('crane_arrow_payload')->nullable();
            $table->decimal('load_height')->nullable();
            $table->integer('photo_count')->nullable();
            $table->text('description')->nullable();
            $table->decimal('owners_count')->nullable();
            $table->string('vehicle_condition')->nullable();
            $table->string('brand_color_code')->nullable();
            $table->string('brand_interior_code')->nullable();
            $table->string('certification_program')->nullable();
            $table->string('acquisition_source')->nullable();
            $table->date('acquisition_date')->nullable();
            $table->string('manufactureDate')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
