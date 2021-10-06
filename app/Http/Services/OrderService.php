<?php

namespace App\Http\Services;

use App\Models\Meal;
use Illuminate\Support\Facades\DB;

class OrderService
{
	/**
	 * Create new row.
	 * @param  array $data 
	 * @return mixed
	 */
	public static function make($data)
	{
		DB::beginTransaction();

		$response['success'] = true;
		try {
			$meal = Meal::find($data['meal_id']);

			DB::table('orders')->insert([
				'table_id' => $data['table_id'],
				'customer_id' => $data['customer_id'],  ## login user Auth::id() by token 
				'reservation_id' => $data['reservation_id'], ## 
				'total' => $meal->price, ## 
				'paid' => $meal->price - $meal->discount, ## should before make order display meals with discount after that customer send what he paid in request

			]);

			DB::commit();
			return $response;
		} catch (\Exception $exception) {
			DB::rollback();
			$response['success'] = false;
			$response['message'] = $exception->getMessage();
			return $response;
		}
	}
}
