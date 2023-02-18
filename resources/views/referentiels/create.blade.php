<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Creation Formation </title>
</head>
<body>
    <div class="container">
    <div class="card mt-4 col-md-8 offset-md-2">
        <div class="h4 text-center bg-primary p-2 text-white">Formulaire d'ajout de Referentiel</div>
        <div class="card-body ">
        <form action="{{ route('referentiels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 form-group">
                <label for="exampleFormControlInput1" class="form-label">Libelle<span class="text-danger"> *</span></label>
                <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}" placeholder="libelle">
                @error('libelle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>             
            <label for="exampleFormControlInput6" class="form-label">Validated<span class="text-danger"> *</span></label>
            <div class="mb-3">    
                <select class="form-control @error('validated') is-invalid @enderror" aria-label="Default select example" name="validated">
                    <option selected>Ouvrir le menu de sélection</option>
                    <option value="1">True</option>
                    <option value="0">False</option>
                    @error('validated')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </select>
                
            </div>
            <div class="mb-3 form-group">
                <label for="exampleFormControlInput1" class="form-label">Horaire<span class="text-danger"> *</span></label>
                <input type="text" class="form-control @error('horaire') is-invalid @enderror" name="horaire" value="{{ old('horaire') }}" placeholder="horaire">
                @error('horaire')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="exampleFormControlInput2" class="form-label">Type</span></label>
            <select class="form-control" aria-label="Default select example" name="type_id">
            <option selected>Ouvrir le menu de sélection</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->libelle }}</option>
                @endforeach 
            </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary offset-5" type="submit">Enregistrer</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</body>
</html>