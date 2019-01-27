<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ShippingDatatable;
use App\Http\Controllers\Controller;
use App\Model\Shipping;
use Illuminate\Http\Request;
use Storage;

class ShippingController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShippingDatatable $trade) {
        return $trade->render('admin.shipping.index', ['title' => trans('admin.shipping')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.shipping.create', ['title' => trans('admin.add')]);
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
                'user_id' => 'required|numeric',
                'lat'     => 'sometimes|nullable',
                'lng'     => 'sometimes|nullable',
                'icon'    => 'sometimes|nullable|' . v_image(),
            ], [], [
                'name_ar' => trans('admin.name_ar'),
                'name_en' => trans('admin.name_en'),
                'user_id' => trans('admin.user_id'),
                'lat'     => trans('admin.lat'),
                'lng'     => trans('admin.lng'),
                'icon'    => trans('admin.icon'),
            ]);

        if (request()->hasFile('icon')) {
            $data['icon'] = up()->upload([
                'file'        => 'icon',
                'path'        => 'shipping',
                'upload_type' => 'single',
                'delete_file' => '',
            ]);
        }

        Shipping::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('shipping'));
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
        $shipping = Shipping::find($id);
        $title    = trans('admin.edit');
        return view('admin.shipping.edit', compact('shipping', 'title'));
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
                'user_id' => 'required|numeric',
                'lat'     => 'sometimes|nullable',
                'lng'     => 'sometimes|nullable',
                'icon'    => 'sometimes|nullable|' . v_image(),
            ], [], [
                'name_ar' => trans('admin.name_ar'),
                'name_en' => trans('admin.name_en'),
                'user_id' => trans('admin.user_id'),
                'lat'     => trans('admin.lat'),
                'lng'     => trans('admin.lng'),
                'icon'    => trans('admin.icon'),
            ]);

        if (request()->hasFile('icon')) {
            $data['icon'] = up()->upload([
                'file'        => 'icon',
                'path'        => 'shipping',
                'upload_type' => 'single',
                'delete_file' => Shipping::find($id)->icon,
            ]);
        }

        Shipping::where('id', $id)->update($data);
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
        $shipping = Shipping::find($id);
        Storage::delete($shipping->logo);
        $shipping->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('shipping'));
    }

    public function multi_delete() {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $shipping = Shipping::find($id);
                Storage::delete($shipping->logo);
                $shipping->delete();
            }
        } else {
            $shipping = Shipping::find(request('item'));
            Storage::delete($shipping->logo);
            $shipping->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('shipping'));
    }
}
