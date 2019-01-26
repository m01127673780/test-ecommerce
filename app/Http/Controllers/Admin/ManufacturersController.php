<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ManuFactskDatatable;
use App\Http\Controllers\Controller;
use App\Model\Manufacturers;
use Illuminate\Http\Request;
use Storage;

class ManufacturersController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ManuFactskDatatable $trade) {
		return $trade->render('admin.manufacturers.index', ['title' => trans('admin.manufacturers')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.manufacturers.create', ['title' => trans('admin.add')]);
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
				'name_ar'      => 'required',
				'name_en'      => 'required',
				'mobile'       => 'required|numeric',
				'email'        => 'required|email',
				'address'      => 'sometimes|nullable',
				'facebook'     => 'sometimes|nullable|url',
				'twitter'      => 'sometimes|nullable|url',
				'website'      => 'sometimes|nullable|url',
				'contact_name' => 'sometimes|nullable|string',
				'lat'          => 'sometimes|nullable',
				'lng'          => 'sometimes|nullable',
				'icon'         => 'sometimes|nullable|'.v_image(),
			], [], [
				'name_ar'      => trans('admin.name_ar'),
				'name_en'      => trans('admin.name_en'),
				'mobile'       => trans('admin.mobile'),
				'email'        => trans('admin.email'),
				'address'      => trans('admin.address'),
				'facebook'     => trans('admin.facebook'),
				'twitter'      => trans('admin.twitter'),
				'website'      => trans('admin.website'),
				'contact_name' => trans('admin.contact_name'),
				'lat'          => trans('admin.lat'),
				'lng'          => trans('admin.lng'),
				'icon'         => trans('admin.icon'),
			]);

		if (request()->hasFile('icon')) {
			$data['icon'] = up()->upload([
					'file'        => 'icon',
					'path'        => 'manufacturers',
					'upload_type' => 'single',
					'delete_file' => '',
				]);
		}

		Manufacturers::create($data);
		session()->flash('success', trans('admin.record_added'));
		return redirect(aurl('manufacturers'));
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
		$manufact = Manufacturers::find($id);
		$title    = trans('admin.edit');
		return view('admin.manufacturers.edit', compact('manufact', 'title'));
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
				'name_ar'      => 'required',
				'name_en'      => 'required',
				'mobile'       => 'required|numeric',
				'email'        => 'required|email',
				'address'      => 'sometimes|nullable',
				'facebook'     => 'sometimes|nullable|url',
				'twitter'      => 'sometimes|nullable|url',
				'website'      => 'sometimes|nullable|url',
				'contact_name' => 'sometimes|nullable|string',
				'lat'          => 'sometimes|nullable',
				'lng'          => 'sometimes|nullable',
				'icon'         => 'sometimes|nullable|'.v_image(),
			], [], [
				'name_ar'      => trans('admin.name_ar'),
				'name_en'      => trans('admin.name_en'),
				'address'      => trans('admin.address'),
				'mobile'       => trans('admin.mobile'),
				'email'        => trans('admin.email'),
				'facebook'     => trans('admin.facebook'),
				'twitter'      => trans('admin.twitter'),
				'website'      => trans('admin.website'),
				'contact_name' => trans('admin.contact_name'),
				'lat'          => trans('admin.lat'),
				'lng'          => trans('admin.lng'),
				'icon'         => trans('admin.icon'),
			]);

		if (request()->hasFile('icon')) {
			$data['icon'] = up()->upload([
					'file'        => 'icon',
					'path'        => 'manufacturers',
					'upload_type' => 'single',
					'delete_file' => Manufacturers::find($id)->icon,
				]);
		}

		Manufacturers::where('id', $id)->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('manufacturers'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$manufacturers = Manufacturers::find($id);
		Storage::delete($manufacturers->logo);
		$manufacturers->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('manufacturers'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$manufacturers = Manufacturers::find($id);
				Storage::delete($manufacturers->logo);
				$manufacturers->delete();
			}
		} else {
			$manufacturers = Manufacturers::find(request('item'));
			Storage::delete($manufacturers->logo);
			$manufacturers->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('manufacturers'));
	}
}
