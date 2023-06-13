<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SlidersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\StoreSliderRequest;
use App\Http\Requests\Admin\Slider\UpdateSliderRequest;
use App\Http\Traits\ImageTrait;
use App\Http\Traits\ImageUploadTrait;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    use ImageUploadTrait , ImageTrait;
    /**
     * Display a listing of the resource.
     */

    private $sliderModel;

    public function __construct(Slider $slider){
        $this->sliderModel = $slider;
    }
    public function index(SlidersDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {

        //* Handle upload image *//
//        $image_path = $this->uploadImage($request ,'banner','uploads');
        $image_path = $this->uploadImage2($request->banner, $this->sliderModel::PATH);

        $this->sliderModel::create([
            'banner' =>$image_path,
            'type' =>$request->type,
            'title' => $request->title,
            'starting_price' => $request->starting_price,
            'btn_url' => $request->btn_url,
            'serial' => $request->serial,
            'status' => $request->status
        ]);

        toastr()->success('Slider has been created successfully!');
        return redirect(route('admin.slider.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        if ($request->banner) {
            $image_path = $this->uploadImage2($request->banner, $this->sliderModel::PATH, $slider->getRawOriginal('banner'));
        }

        $slider->update([
            'banner' =>$image_path ?? $slider->getRawOriginal('banner'),
            'type' =>$request->type,
            'title' => $request->title,
            'starting_price' => $request->starting_price,
            'btn_url' => $request->btn_url,
            'serial' => $request->serial,
            'status' => $request->status
        ]);
        toastr()->success("Slider Updated Successfully!");
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        $slider = Slider::findOrFail($id);
//        $slider->delete();
        toastr('Slider Deleted Successfully', 'success');
        return back();
    }
}
