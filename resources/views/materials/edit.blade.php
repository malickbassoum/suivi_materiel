@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifier Materiels</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('materials.index') }}"> Retour</a>
            </div>
        </div>
    </div>
	&nbsp;


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('materials.update',$material->id) }}" method="POST">
    	@csrf
        @method('PUT')


        <div class="row">
		    <div class="col-md-6">
		        <div class="form-group">
		            <strong>Type :</strong>
		            <input type="text" name="material_type" value="{{ $material->material_type }}" class="form-control" placeholder="type materiel">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Nom :</strong>
		            <input type="text" name="material_name" value="{{ $material->material_name }}" class="form-control" placeholder="nom materiel">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Marque :</strong>
		            <input type="text" name="material_brand" value="{{ $material->material_brand }}" class="form-control" placeholder="marque materiel">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Num serie/Model :</strong>
		            <input type="text" name="material_serial" value="{{ $material->material_serial }}" class="form-control" placeholder="num materiel">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Proprietaire :</strong>
		            <input type="text" name="material_owner" value="{{ $material->material_owner }}" class="form-control" placeholder="propritaire materiel">
		        </div>
		    </div>
		    
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Modifier</button>
		    </div>
		</div>


    </form>



@endsection