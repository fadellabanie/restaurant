<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Tables\TableResource;
use App\Http\Requests\Api\Tables\ReservationRequest;
use App\Http\Requests\Api\Tables\CheckAvailableRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkAvailable(CheckAvailableRequest $request)
    {
        /*
        $reservation = Reservation::with(['table' => function ($q) use ($request) {
            $q->where('capacity', $request->marks);
            $q->orWhere('capacity', $request->marks + 1); // to get customer
        }])->where(function ($query) use ($request) {
            $query->where('to_time', $request->time);
            $query->Where('date', $request->date);
        });

        if($reservation) return $this->errorStatus('unfortunately we dont have table for reservation');
*/

            $usedTables = DB::table('reservations')
            ->where(function($q) use ($request){
                $q->where('to_time','=<',$request->from);
                $q->where('from_time','=>',$request->to);
            })
            ->select('table_id')->pluck('table_id');
            
            $availableTable = DB::table('tables')->whereNotIn('id',$usedTables)
            ->get();
     

            return $this->respondWithItem(TableResource::collection($availableTable));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reservation(ReservationRequest $request)
    {
        Reservation::create($request->all());

        return $this->successStatus('reservation successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
