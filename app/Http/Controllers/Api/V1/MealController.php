<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Meal\MealCollection;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $meals = Meal::available()->orderby('type','ASC')->get();

        return new MealCollection($meals);
    }

}
