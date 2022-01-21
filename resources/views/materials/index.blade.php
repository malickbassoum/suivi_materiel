@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Materiels</h2>
            </div>
            <div class="pull-right">
                @can('material-create')
                <a class="btn btn-success" href="{{ route('materials.create') }}"> Enregistrer un materiel</a>
                @endcan
            </div>
        </div>
    </div>
    &nbsp;


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Type</th>
            <th scope="col">Nom</th>
            <th scope="col"> Marque</th>
            <th scope="col">Num Série/Model</th>
            <th scope="col">Proprietaire</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
	    @foreach ($materials as $material)
        <tbody>
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $material->material_type }}</td>
                <td>{{ $material->material_name }}</td>
                <td>{{ $material->material_brand }}</td>
                <td>{{ $material->material_serial }}</td>
                <td>{{ $material->material_owner }}</td>
                
                <td>
                    <form action="{{ route('materials.destroy',$material->id) }}" method="POST">
                        <a href="{{ route('materials.show',$material->id) }}"> <i class="fas fa-eye" style="color: seagreen"></i></a>
                        @can('material-edit')
                        <a href="{{ route('materials.edit',$material->id) }}"><i class="fas fa-edit"></i></a>
                        @endcan
                        
                        @csrf
                        @method('DELETE')
                        @can('material-delete')
                        <button type="submit" ><i class="fas fa-trash" style="color: red"></i></button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {!! $materials->links() !!}



@endsection