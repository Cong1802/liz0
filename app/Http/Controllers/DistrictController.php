<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vanthao03596\HCVN\Models\District;

class DistrictController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function searchByCity(Request $request)
    {
        $q = $request->q;
        $districts = District::where('parent_code', $q)->get();
        if ($districts->isEmpty()) {
            return [];
        }

        return $districts->map(function ($district) {
            return [
               'id' => $district->code,
               'text' => $district->name_with_type,
           ];
        });
    }

    /**
     * @param Request $request
     * @return array
     */
    public function searchByCode(Request $request)
    {
        $q = $request->q;
        $districts = District::where('code', $q)->get();
        if ($districts->isEmpty()) {
            return [];
        }

        return $districts->map(function ($district) {
            return [
                'id' => $district->code,
                'text' => $district->name,
            ];
        });
    }
}
