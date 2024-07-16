<?php

namespace App\Http\Controllers;

use App\Http\Resources\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packageItems = PackageResource::collection(Package::latest()->paginate());
        return inertia('Packages/Index', [
            // 'packageItems' => PackageResource::collection(Package::all()),
            'packageItems' =>  $packageItems,

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
    public function store(Request $request)
    {
        Gate::authorize('create', Package::class);
        $data = $request->validate([
            'code' => ['required', 'string', 'min:3', 'max:50'],
            'info' => ['required', 'string', 'min:5', 'max:10000'],
        ]);

        $package = Package::create($data);

        return redirect($package->showRoute());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Package $package)
    {
        if (!Str::endsWith($package->showRoute(), $request->path())) {
            return redirect($package->showRoute($request->query()), status: 301); //301 permanent redirect to correct route
        }

        return inertia('Packages/Show', [
            'packageItem' => PackageResource::make($package),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Package $package)
    {
        Gate::authorize('delete', $package);

        $package->delete();
        return redirect(route('packages.index'))
            ->banner('Package deleted.');
    }
}
