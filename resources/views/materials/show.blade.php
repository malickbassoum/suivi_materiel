@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Détails</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('materials.index') }}"> Retour</a>
            </div>
        </div>
    </div>
    &nbsp;


    <table class="table table-striped">
        <thead>
            <tr>
                
                <th scope="col">Type</th>
                <th scope="col">Nom</th>
                <th scope="col"> Marque</th>
                <th scope="col">Num Série/Model</th>
                <th scope="col">Proprietaire</th>
                
            </tr>
        <tbody>
            <tr>
                <td>{{ $material->material_type }}</td>
                <td>{{ $material->material_name }}</td>
                <td>{{ $material->material_brand }}</td>
                <td>{{ $material->material_serial }}</td>
                <td>{{ $material->material_owner }}</td>
            </tr>
        </thead>
     
    </table>
@endsection