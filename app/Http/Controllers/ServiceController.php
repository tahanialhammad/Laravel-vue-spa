<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\PackageResource;
use App\Http\Resources\ServiceResource;
use App\Models\Package;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   //     $services = ServiceResource::collection(Service::latest()->latest('id')->paginate());
   $services = ServiceResource::collection(Service::with('packages')->latest()->paginate());

        return inertia('Services/Index', [           
            'services' => $services,
            'packageItems' => PackageResource::collection(Package::all()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
       $service->load('packages');

        return inertia('Services/Show',[
            'service' => ServiceResource::make($service),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
