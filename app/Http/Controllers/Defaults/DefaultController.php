<?php

namespace App\Http\Controllers\Defaults;

use App\Http\Controllers\Controller;
use App\Models\AbrwnCategory;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\District;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getServiceCat($id){

        if($id == 1){
            $data = ServiceCategory::where('is_service',1)->where('status',1)->get();
        }else{
            $data = ServiceCategory::where('is_pro_bono',1)->where('status',1)->get();
        }

        return response()->json($data);
    }
    public function getCatService($id)
    {
        if ($id) {
            $data = Service::where('service_category_id', $id)->where('status', 1)->get();
        }
        return response()->json($data);
    }
    public function getDivisionDistrict($id)
    {
        if ($id) {
            $data = District::where('division_id', $id)->where('status', 1)->get();
        }
        return response()->json($data);
    }
}
