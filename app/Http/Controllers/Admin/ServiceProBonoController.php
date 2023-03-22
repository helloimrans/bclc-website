<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssociatedService;
use App\Models\ConsultationRequest;
use App\Models\Keyword;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceProBonoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['services'] = Service::with('category')->latest()->get();
        return view('admin.service_and_probono.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['associated_services'] = AssociatedService::all();
        $data['keywords'] = Keyword::all();
        return view('admin.service_and_probono.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:services,title',
            'thumbnail_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg,gif|max:2048',
            'slider_images.*' => 'image|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
            'is_service' => 'required',
            'service_category_id' => 'required',
            'description' => 'required',
            'associated_service' => 'required',
            'keywords' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Service();

        $data->is_service            = $request->is_service;
        $data->service_category_id   = $request->service_category_id;
        $data->title                 = $request->title;
        $data->slug                  = Str::slug($request->title);
        $data->description           = $request->description;
        $data->status                = $request->status;
        $data->created_by            = Auth::guard('admin')->user()->id;



        $thumbnail_image = $request->file('thumbnail_image');
        if ($thumbnail_image) {
            $imageName = time() . '_' . uniqid() . '.' . $thumbnail_image->getClientOriginalExtension();
            $thumbnail_image->move(public_path('uploaded/service'), $imageName);
            $data->thumbnail_image = '/uploaded/service/' . $imageName;
        }
        $data->save();

        //Associated Service
        $data->associated_service()->attach($request->associated_service);
        $data->keywords()->attach($request->keywords);

        $slider_images =  $request->file('slider_images');
        if (!empty($slider_images)) {
            foreach ($slider_images as $slider_image) {
                $si_image = new ServiceImage();
                $si_image->service_id = $data->id;

                $imageName = time() . '_' . uniqid() . '.' . $slider_image->getClientOriginalExtension();
                $slider_image->move(public_path('uploaded/service'), $imageName);
                $si_image->image = '/uploaded/service/' . $imageName;
                $si_image->save();
            }
        }



        $notification = array(
            'message' => 'Successfully service created.',
            'alert-type' => 'success'
        );
        return redirect()->route('service.index')->with($notification);
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
        $data['service'] = Service::find($id);
        $data['associated_services'] = AssociatedService::where('status', 1)->get();
        $data['keywords'] = Keyword::where('status', 1)->get();
        if ($data['service']->is_service == 1) {
            $data['categories'] = ServiceCategory::where('is_service', 1)->get();
        } else {
            $data['categories'] = ServiceCategory::where('is_pro_bono', 1)->get();
        }

        return view('admin.service_and_probono.edit', $data);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:services,title,' . $id,
            'thumbnail_image' => 'image|mimes:jpg,jpeg,png,webp,svg,gif|max:2048',
            'slider_images.*' => 'image|mimes:jpg,jpeg,png,gif,webp,svg|max:2048',
            'is_service' => 'required',
            'service_category_id' => 'required',
            'description' => 'required',
            'associated_service' => 'required',
            'keywords' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = Service::find($id);

        $data->is_service            = $request->is_service;
        $data->service_category_id   = $request->service_category_id;
        $data->title                 = $request->title;
        $data->slug                  = Str::slug($request->title);
        $data->description           = $request->description;
        $data->status                = $request->status;
        $data->updated_by            = Auth::guard('admin')->user()->id;



        $thumbnail_image = $request->file('thumbnail_image');
        if ($thumbnail_image) {
            $image_path = public_path($data->thumbnail_image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $thumbnail_image->getClientOriginalExtension();
            $thumbnail_image->move(public_path('uploaded/service'), $imageName);
            $data->thumbnail_image = '/uploaded/service/' . $imageName;
        }
        $data->save();

        //Associated Service
        $data->associated_service()->detach();
        $data->associated_service()->attach($request->associated_service);
        $data->keywords()->detach();
        $data->keywords()->attach($request->keywords);

        $slider_images =  $request->file('slider_images');
        if (!empty($slider_images)) {
            foreach ($slider_images as $slider_image) {
                $si_image = new ServiceImage();
                $si_image->service_id = $data->id;

                $imageName = time() . '_' . uniqid() . '.' . $slider_image->getClientOriginalExtension();
                $slider_image->move(public_path('uploaded/service'), $imageName);
                $si_image->image = '/uploaded/service/' . $imageName;
                $si_image->save();
            }
        }



        $notification = array(
            'message' => 'Successfully service updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('service.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Service::find($id);
        $data->deleted_by = Auth::guard('admin')->user()->id;
        $data->save();
        $data->delete();
        $notification = array(
            'message' => 'Successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function imageRemove($id)
    {
        $data = ServiceImage::find($id);
        $image_path = public_path($data->image);
        @unlink($image_path);
        $data->delete();
        $notification = array(
            'message' => 'Successfully image deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function consultationRequest()
    {
        $data['data'] = ConsultationRequest::latest()->get();
        return view('admin.service_and_probono.consultaion_request', $data);
    }
    public function consultationDelete($id)
    {
        ConsultationRequest::find($id)->delete();
        $notification = array(
            'message' => 'Successfully data deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function consultationStatus($id)
    {
        $data = ConsultationRequest::find($id);
        if ($data->status == 0) {
            $data->status = 1;
        } else {
            $data->status = 0;
        }
        $data->save();

        $notification = array(
            'message' => 'Successfully status changed.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
