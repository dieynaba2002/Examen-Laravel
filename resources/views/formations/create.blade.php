<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Creation Formation</title>
</head>
<body>
    <div class="container">
    <div class="card mt-4 col-md-8 offset-md-2">
        <div class="h4 text-center bg-primary p-2 text-white">Formulaire d'ajout de Formation</div>
        <div class="card-body ">
        <form action="{{ route('formations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 form-group">
                <label for="exampleFormControlInput1" class="form-label">Nom<span class="text-danger"> *</span></label>
                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" placeholder="nom">
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Duree<span class="text-danger"> *</span></label>
                <input type="text" class="form-control @error('duree') is-invalid @enderror" name="duree" value="{{ old('duree') }}" placeholder="duree">
                @error('duree')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Description<span class="text-danger"> *</span></label>
                <input type="text" class="form-control  @error('description') is-invalid @enderror" name="description" value="{{ old('duree') }}" placeholder="description">
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label for="exampleFormControlInput6" class="form-label">Is Started<span class="text-danger"> *</span></label>
            <div class="mb-3">    
                <select class="form-control @error('isStarted') is-invalid @enderror" aria-label="Default select example" name="isStarted">
                    <option selected>Ouvrir le menu de sélection</option>
                    <option value="1">True</option>
                    <option value="0">False</option>
                    @error('isStarted')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </select>               
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Date Debut<span class="text-danger"> *</span></label>
                <input type="date" class="form-control  @error('dateDebut') is-invalid @enderror" name="dateDebut" value="{{ old('dateDebut') }}" placeholder="date debut">
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> 
            <label for="exampleFormControlInput2" class="form-label">Referentiel</span></label>
            <select class="form-control" aria-label="Default select example" name="referentiel_id">
            <option selected>Ouvrir le menu de sélection</option>
                @foreach ($referentiels as $referentiel)
                    <option value="{{ $referentiel->id }}">{{ $referentiel->libelle }}</option>
                @endforeach 
            </select>
            <br>
            <div class="col-12">
                <button class="btn btn-primary offset-5" type="submit">Enregistrer</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</body>
</html>