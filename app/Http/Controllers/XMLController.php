<?php

namespace App\Http\Controllers;

use App\BodyConfiguration;
use App\Brand;
use App\Car;
use App\Category;
use App\Dealer;
use App\Generation;
use App\ModelCar;
use App\Modification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class XMLController extends Controller
{
    public function parse(Request $request)
    {
        Log::info($request['xml_file']);
        $temp = file_get_contents($request['xml_file']);
        $content = simplexml_load_string($temp);
        foreach ($content as $c){
            Car::updateOrCreate([
                'id' => $c->id,
                'dealer_id' => Dealer::updateOrCreate([
                    'id' => $c->dealer['id'],
                    'name' => $c->dealer
                ])->id,
                'category_id' => Category::updateOrCreate([
                    'id' => $c->category['id'],
                    'name' => $c->category
                ])->id,
                'subcategory' => $c->subcategory,
                'type' => $c->type,
                'year' => $c->year,
                'brand_id' => Brand::updateOrCreate([
                    'id' => $c->brand['id'],
                    'name' => $c->brand
                ])->id,
                'model_id' => ModelCar::updateOrCreate([
                    'id' => $c->model['id'],
                    'name' => $c->model
                ])->id,
                'generation_id' => Generation::updateOrCreate([
                    'id' => $c->generation['id'],
                    'name' => $c->generation
                ])->id,
                'body_configuration_id' => BodyConfiguration::updateOrCreate([
                    'id' => $c->bodyConfiguration['id'],
                    'name' => $c->bodyConfiguration
                ])->id,
                'modification_id' => Modification::updateOrCreate([
                    'id' => $c->modification['id'],
                    'name' => $c->modification
                ])->id,
                'complectation' => $c->complectation,
                'brand_complectation' => $c->brandComplectationCode,
                'engine_type' => $c->engineType,
                'engine_volume' => (int)$c->engineVolume ?? null,
                'engine_power' => (int)$c->enginePower ?? null,
                'body_type' => $c->bodyType ?? null,
                'body_door_count' => (int)$c->bodyDoorCount?? null,
                'body_color' => $c->bodyColor?? null,
                'body_color_metallic' => $c->bodyColorMetallic?? null,
                'drive_type' => $c->driveType?? null,
                'gearbox_type' => $c->gearboxType?? null,
                'gearbox_gear_count' => (int)$c->gearboxGearCount ?? null,
                'steering_wheel' => $c->steeringWheel,
                'mileage' => $c->mileage,
                'mileage_unit' => $c->mileageUnit,
                'price' => $c->price,
                'special_offer' => $c->specialOffer,
                'special_offer_previous_price' => (int)$c->specialOfferPreviousPrice?? null,
                'tradein_discount' => (int)$c->tradeinDiscount??null,
                'credit_discount' => (int)$c->creditDiscount??null,
                'max_discount' => (int)$c->maxDiscount??null,
                'availability' => $c->availability,
                'pts_type' => $c->ptsType,
                'country' => $c->country,
                'operating_time' => $c->operatingTime,
                'eco_class' => $c->ecoClass,
                'drive_wheel' => (int)$c->driveWheel??null,
                'axis_count' => (int)$c->axisCount??null,
                'brake_type' => (int)$c->brakeType??null,
                'cabin_type' => (int)$c->cabinType??null,
                'maximum_permitted_mass' => (int)$c->maximumPermittedMass??null,
                'saddle_height' => (int)$c->saddleHeight??null,
                'cabin_suspension' => (int)$c->cabinSuspension??null,
                'chassis_suspension' => (int)$c->chassisSuspension??null,
                'length' => (int)$c->length??null,
                'width' => (int)$c->width??null,
                'body_volume' => (int)$c->bodyVolume??null,
                'bucket_volume' => (int)$c->bucketVolume??null,
                'traction_class' => (int)$c->tractionClass??null,
                'refrigerator_class' => (int)$c->refrigeratorClass??null,
                'crane_arrow_radius' => (int)$c->craneArrowRadius??null,
                'crane_arrow_length' => (int)$c->craneArrowLength??null,
                'crane_arrow_payload' => (int)$c->craneArrowPayload??null,
                'load_height' => (int)$c->loadHeight??null,
                'photo_count' => (int)$c->photoCount??null,
                'description' => (int)$c->description??null,
                'owners_count' => (int)$c->ownersCount??null,
                'vehicle_condition' => (int)$c->vehicleCondition??null,
                'brand_color_code' =>(int) $c->brandColorCode??null,
                'brand_interior_code' => (int)$c->brandInteriorCode??null,
                'certification_program' =>(int) $c->certificationProgram??null,
                'acquisition_source' =>(int) $c->acquisitionSource??null,
                'acquisition_date' =>$c->acquisitionDate??null,
            ]);
        }
    }
}
