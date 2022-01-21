@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter un nouveau materiel</h2>
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


    <form action="{{ route('materials.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-md-6">
		        <div class="form-group">
		            <strong>Type Materiel:</strong>
		            <input type="text" name="material_type" class="form-control" placeholder="type materiel">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Nom materiel:</strong>
		            <input type="text" name="material_name" class="form-control" placeholder="Nom du matriel">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Marque:</strong>
		            <input type="text" name="material_brand" class="form-control" placeholder="Marque">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Num serie:</strong>
		            <input type="text" name="material_serial" class="form-control" placeholder="numero serie">
		        </div>
		    </div>
            <div class="col-md-6">
		        <div class="form-group">
		            <strong>Proprietaire:</strong>
		            <input type="text" name="material_owner" class="form-control" placeholder="proprietaire">
		        </div>
		    </div>
            
		    <div class="col-md-6 text-center">
		            <button type="submit" class="btn btn-primary">Enregistrer</button>
		    </div>
		</div>


    </form>



@endsection