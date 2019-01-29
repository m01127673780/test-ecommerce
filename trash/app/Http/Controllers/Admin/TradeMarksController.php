<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\TradeMarkDatatable;
use App\Http\Controllers\Controller;
use App\Model\TradeMark;
use Illuminate\Http\Request;
use Storage;

class TradeMarksController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(TradeMarkDatatable $trade) {
		return $trade->render('admin.trademarks.index', ['title' => trans('admin.trademarks')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('admin.trademarks.create', ['title' => trans('admin.create_trademarks')]);
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
				'name_ar' => 'required',
				'name_en' => 'required',
				'logo'    => 'sometimes|nullable|'.v_image(),
			], [], [
				'name_ar' => trans('admin.name_ar'),
				'name_en' => trans('admin.name_en'),
				'logo'    => trans('admin.trade_icon'),
			]);

		if (request()->hasFile('logo')) {
			$data['logo'] = up()->upload([
					'file'        => 'logo',
					'path'        => 'trademarks',
					'upload_type' => 'single',
					'delete_file' => '',
				]);
		}

		TradeMark::create($data);
		session()->flash('success', trans('admin.record_added'));
		return redirect(aurl('trademarks'));
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
		$trademark = TradeMark::find($id);
		$title     = trans('admin.edit');
		return view('admin.trademarks.edit', compact('trademark', 'title'));
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
				'name_ar' => 'required',
				'name_en' => 'required',
				'logo'    => 'sometimes|nullable|'.v_image(),
			], [], [
				'name_ar' => trans('admin.name_ar'),
				'name_en' => trans('admin.name_en'),
				'logo'    => trans('admin.trade_icon'),
			]);

		if (request()->hasFile('logo')) {
			$data['logo'] = up()->upload([
					'file'        => 'logo',
					'path'        => 'trademarks',
					'upload_type' => 'single',
					'delete_file' => TradeMark::find($id)->logo,
				]);
		}

		TradeMark::where('id', $id)->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('trademarks'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$trademarks = TradeMark::find($id);
		Storage::delete($trademarks->logo);
		$trademarks->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('trademarks'));
	}

	public function multi_delete() {
		if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$trademarks = TradeMark::find($id);
				Storage::delete($trademarks->logo);
				$trademarks->delete();
			}
		} else {
			$trademarks = TradeMark::find(request('item'));
			Storage::delete($trademarks->logo);
			$trademarks->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('trademarks'));
	}
}
