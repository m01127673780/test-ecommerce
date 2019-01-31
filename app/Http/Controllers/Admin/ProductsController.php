<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ProductsDatatable;
use App\Http\Controllers\Controller;

use App\Model\Product;
use Illuminate\Http\Request;
use Storage;

class ProductsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(ProductsDatatable $product) {
	return $product->render('admin.products.index', ['title' => trans('admin.products')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
	 $product= Product::create(['title' =>'',]);
		if(!empty( $product)){
			return redirect(aurl('products/'. $product->id .'/edit'));
		} 
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

		Product::create($data);
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
		$product = Product::find($id);
		$title   = trans('admin.edit');
		return view('admin.products.product', ['title' => trans('admin.create_or_edit_product',['title'=>$product->title]),'product'=>$product]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */


	public function upload_file($id) {
		if (request()->hasFile('file')) {
			$fid =  up()->upload([
					'file'        => 'file',
					'path'        => 'products/'.$id,
					'upload_type' => 'files',
					'file_type'   => 'product',
					'relation_id' =>  $id ,
				]);
			  return response(['status' => true, 'id' => $fid], 200);
		}


	}

	public function delete_file() 
	   {
			if (request()->has('id')) {
  			  up()->delete(request('id'));
		}
 	}

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
					'delete_file' => Product::find($id)->logo,
				]);
		}

		Product::where('id', $id)->update($data);
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
		$products = Product::find($id);
		Storage::delete($products->logo);
		$products->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('products'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$products = Product::find($id);
				Storage::delete($products->logo);
				$products->delete();
			}
		} else {
			$products = Product::find(request('item'));
			Storage::delete($products->logo);
			$products->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('products'));
	}
}
