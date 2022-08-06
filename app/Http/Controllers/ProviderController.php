<?php

namespace App\Http\Controllers;

use App\Exports\ProvidersExport;
use App\Models\Provider;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Providers\ProviderRequest;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::orderBy('id', 'desc')->paginate(10);

        $inactive = Provider::where('status', '0')->get();
        $active = Provider::where('status', '1')->get();
        $inactive = $inactive->count();
        $active = $active->count();

        return view('providers.index', compact('providers', 'active', 'inactive'));
    }

    public function store(ProviderRequest $request)
    {
        Provider::create($request->all());
        return back()->with('success', 'El Proveedor se creo con exito');
    }

    public function update(ProviderRequest $request, Provider $provider )
    {
        $provider->update($request->all());
        return redirect()->route('providers.index')->with('success', 'Actualizado Exitosamente');
    }


    public function destroy(Provider $provider)
    {
        $provider->delete();

        return back()->with('success', 'Eliminado Exitosamente');
    }

    public function export()
    {
        return Excel::download(new ProvidersExport, 'Proveedores.xlsx');
    }








}
