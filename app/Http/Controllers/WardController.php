<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vanthao03596\HCVN\Models\Ward;

class WardController extends Controller
{
    /**
     * @param Request $request
     * @return array
     */
    public function searchByDistrict(Request $request)
    {
        $q = $request->q;
        $districts = Ward::where('parent_code', $q)->get();
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
}
