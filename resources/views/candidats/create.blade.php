<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Creation Candidat</title>
</head>
<body>
    <div class="container">
    <div class="card mt-4 col-md-8 offset-md-2">
        <div class="h4 text-center bg-primary p-2 text-white">Formulaire d'ajout de Candidat</div>
        <div class="card-body ">
        <form action="{{ route('candidats.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 form-group">
                <label for="exampleFormControlInput1" class="form-label">Nom<span class="text-danger"> *</span></label>
                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" placeholder="nom">
                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Prenom<span class="text-danger"> *</span></label>
                <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" placeholder="prenom">
                @error('prenom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">Email<span class="text-danger"> *</span></label>
                <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="nom@gmail.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput4" class="form-label">Age</label>
                <input type="int" class="form-control" name="age" placeholder="age">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput5" class="form-label">Niveau Etude</label>
                <input type="text" class="form-control" name="niveauEtude" placeholder="Niveau Etude">
            </div>
            <label for="exampleFormControlInput6" class="form-label">Sexe</label>
            <div class="mb-3">    
            <select class="form-control" aria-label="Default select example" name="sexe">
                    <option selected>Ouvrir le menu de sélection</option>
                    <option value="masculin">masculin</option>
                    <option value="feminin">feminin</option>
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