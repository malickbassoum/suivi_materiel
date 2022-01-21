<?php
    
namespace App\Http\Controllers;
    
use App\Models\Material;
use Illuminate\Http\Request;
    
class MaterialController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:material-list|material-create|material-edit|material-delete', ['only' => ['index','show']]);
         $this->middleware('permission:material-create', ['only' => ['create','store']]);
         $this->middleware('permission:material-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:material-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::latest()->paginate(5);
        return view('materials.index',compact('materials'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materials.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'material_type' => 'required',
            'material_name' => 'required',
            'material_brand' => 'required',
            'material_serial' => 'required',
            'material_owner' => 'required',
        ]);
    
        Material::create($request->all());
    
        return redirect()->route('materials.index')
                        ->with('success','Matériel enrégisté avec succés.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        return view('materials.show',compact('material'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        return view('materials.edit',compact('material'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
         request()->validate([
            'material_type' => 'required',
            'material_name' => 'required',
            'material_brand' => 'required',
            'material_serial' => 'required',
            'material_owner' => 'required',
        ]);
    
        $material->update($request->all());
    
        return redirect()->route('materials.index')
                        ->with('success','Material updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();
    
        return redirect()->route('materials.index')
                        ->with('success','Material deleted successfully');
    }
}