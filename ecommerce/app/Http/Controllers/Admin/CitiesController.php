<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\CityDatatable;
use App\Http\Controllers\Controller;

use App\Model\City;
use Illuminate\Http\Request;

class CitiesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(CityDatatable $city) {
		return $city->render('admin.cities.index', ['title' => trans('admin.cities')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.cities.create', ['title' => trans('admin.create_cities')]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store() {

		$data = $this->validate(request(),
			[
				'city_name_ar' => 'required',
				'city_name_en' => 'required',
				'country_id'   => 'required|numeric',

			], [], [
				'city_name_ar' => trans('admin.city_name_ar'),
				'city_name_en' => trans('admin.city_name_en'),
				'country_id'   => trans('admin.country_id'),

			]);

		City::create($data);
		session()->flash('success', trans('admin.record_added'));
		return redirect(aurl('cities'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$country = City::find($id);
		$title   = trans('admin.edit');
		return view('admin.cities.edit', compact('country', 'title'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $r, $id) {

		$data = $this->validate(request(),
			[
				'city_name_ar' => 'required',
				'city_name_en' => 'required',
				'country_id'   => 'required|numeric',

			], [], [
				'city_name_ar' => trans('admin.city_name_ar'),
				'city_name_en' => trans('admin.city_name_en'),
				'country_id'   => trans('admin.country_id'),
			]);

		City::where('id', $id)->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('cities'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$cities = City::find($id);

		$cities->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('cities'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$cities = City::find($id);
				$cities->delete();
			}
		} else {
			$cities = City::find(request('item'));
			$cities->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('cities'));
	}
}
