<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RolRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use PDF; // Asegúrate de tener la librería instalada y configurada

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $rols = Rol::paginate();

        return view('rol.index', compact('rols'))
            ->with('i', ($request->input('page', 1) - 1) * $rols->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $rol = new Rol();

        return view('rol.create', compact('rol'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolRequest $request): RedirectResponse
    {
        Rol::create($request->validated());

        return Redirect::route('rols.index')
            ->with('success', 'Rol created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $rol = Rol::find($id);

        return view('rol.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $rol = Rol::find($id);

        return view('rol.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolRequest $request, Rol $rol): RedirectResponse
    {
        $rol->update($request->validated());

        return Redirect::route('rols.index')
            ->with('success', 'Rol updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Rol::find($id)->delete();

        return Redirect::route('rols.index')
            ->with('success', 'Rol deleted successfully');
    }

    /**
     * Muestra la previsualización del PDF de un rol.
     *
     * @param Rol $rol El modelo Rol inyectado por el enrutamiento.
     * @return \Illuminate\Http\Response
     */
    public function previewPdf(Rol $rol)
    {
        // Se carga la vista con los datos del rol.
        //PDF::loadView se usa para cargar la vista que se convertirá en PDF.
        //compact('rol') pasa el modelo rol a la vista.
        $pdf = PDF::loadView('pdf.pdf_rol', compact('rol'));

        // Retorna el PDF para su previsualización en el navegador.
        //$pdf->stream() envía el PDF al navegador para que se muestre en línea.
        return $pdf->stream('rol_' . $rol->id . '.pdf');
    }

    /**
     * Descarga el PDF de un rol.
     *
     * @param Rol $rol El modelo Rol inyectado por el enrutamiento.
     * @return \Illuminate\Http\Response
     */
    public function downloadPdf(Rol $rol)
    {
        // Se carga la vista con los datos del rol.
        $pdf = PDF::loadView('pdf.pdf_rol', compact('rol'));

        // Retorna el PDF para forzar su descarga.
        // $pdf->download() envía el PDF al navegador con una cabecera que fuerza la descarga.
        return $pdf->download('rol_' . $rol->id . '.pdf');
    }
}
