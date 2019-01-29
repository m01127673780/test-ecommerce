<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\ColorsDatatable;
use App\Http\Controllers\Controller;
use App\Model\Color;
use Illuminate\Http\Request;
use Storage;

class ColorsController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(ColorsDatatable $trade)
   {
      return $trade->render('admin.colors.index', ['title' => trans('admin.colors')]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.colors.create', ['title' => trans('admin.add')]);
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store()
   {

      $data = $this->validate(request(),
         [
            'name_ar' => 'required',
            'name_en' => 'required',
            'color'   => 'required|string',

         ], [], [
            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'color'   => trans('admin.color'),
         ]);

      Color::create($data);
      session()->flash('success', trans('admin.record_added'));
      return redirect(aurl('colors'));
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
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $color = Color::find($id);
      $title = trans('admin.edit');
      return view('admin.colors.edit', compact('color', 'title'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $r, $id)
   {

      $data = $this->validate(request(),
         [
            'name_ar' => 'required',
            'name_en' => 'required',
            'color'   => 'required|string',
         ], [], [
            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'color'   => trans('admin.color'),
         ]);

      Color::where('id', $id)->update($data);
      session()->flash('success', trans('admin.updated_record'));
      return redirect(aurl('colors'));
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $colors = Color::find($id);
      $colors->delete();
      session()->flash('success', trans('admin.deleted_record'));
      return redirect(aurl('colors'));
   }

   public function multi_delete()
   {
      if (is_array(request('item'))) {
         foreach (request('item') as $id) {
            $malls = Color::find($id);
            $malls->delete();
         }
      } else {
         $malls = Color::find(request('item'));
         $malls->delete();
      }
      session()->flash('success', trans('admin.deleted_record'));
      return redirect(aurl('colors'));
   }
}
