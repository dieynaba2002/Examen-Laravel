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
        <form action="{{ route('types.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 form-group">
                <label for="exampleFormControlInput1" class="form-label">Libelle<span class="text-danger"> *</span></label>
                <input type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}" placeholder="libelle">
                @error('libelle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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