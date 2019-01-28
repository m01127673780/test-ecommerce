<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ProductsDatatable;
use App\Http\Controllers\Controller;

use App\Model\Products;
use Illuminate\Http\Request;
use Storage;

class ProductsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ProductsDatatable $country) {
		return $country->render('admin.products.index', ['title' => trans('admin.products')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.products.create', ['title' => trans('admin.create_products')]);
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
				'country_name_ar' => 'required',
				'country_name_en' => 'required',
				'mob'             => 'required',
				'code'            => 'required',
				'logo'            => 'sometimes|nullable|'.v_image(),
			], [], [
				'country_name_ar' => trans('admin.country_name_ar'),
				'country_name_en' => trans('admin.country_name_en'),
				'mob'             => trans('admin.mob'),
				'code'            => trans('admin.code'),
				'logo'            => trans('admin.country_flag'),
			]);

		if (request()->hasFile('logo')) {
			$data['logo'] = up()->upload([
					'file'        => 'logo',
					'path'        => 'products',
					'upload_type' => 'single',
					'delete_file' => '',
				]);
		}

		Products::create($data);
		session()->flash('success', trans('admin.record_added'));
		return redirect(aurl('products'));
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
		$country = Products::find($id);
		$title   = trans('admin.edit');
		return view('admin.products.edit', compact('country', 'title'));
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
				'country_name_ar' => 'required',
				'country_name_en' => 'required',
				'mob'             => 'required',
				'code'            => 'required',
				'logo'            => 'sometimes|nullable|'.v_image(),
			], [], [
				'country_name_ar' => trans('admin.country_name_ar'),
				'country_name_en' => trans('admin.country_name_en'),
				'mob'             => trans('admin.mob'),
				'code'            => trans('admin.code'),
				'logo'            => trans('admin.logo'),
			]);

		if (request()->hasFile('logo')) {
			$data['logo'] = up()->upload([
					'file'        => 'logo',
					'path'        => 'products',
					'upload_type' => 'single',
					'delete_file' => Products::find($id)->logo,
				]);
		}

		Products::where('id', $id)->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('products'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$products = Products::find($id);
		Storage::delete($products->logo);
		$products->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('products'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$products = Products::find($id);
				Storage::delete($products->logo);
				$products->delete();
			}
		} else {
			$products = Products::find(request('item'));
			Storage::delete($products->logo);
			$products->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('products'));
	}
}
