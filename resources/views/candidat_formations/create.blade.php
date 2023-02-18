<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Affectation de Candidat par formation</title>
</head>
<body>
    <div class="container">
        <div class="card mt-4 col-md-8 offset-md-2">
            <div class="h4 text-center bg-primary p-2 text-white"> Ajout de Candidat a une formation</div>
                <div class="card-body ">
                    <form action="{{ route('candidat_formations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf   
                        <label for="exampleFormControlInput2" class="form-label">Candidat</span></label>
                        <select class="form-control" aria-label="Default select example" name="candidat_id">
                        <option selected>Ouvrir le menu de sélection</option>
                            @foreach ($candidats as $candidat)
                                <option value="{{ $candidat->id }}">{{ $candidat->prenom }}</option>
                            @endforeach 
                        </select><label for="exampleFormControlInput3" class="form-label">Formation</span></label>
                        <select class="form-control" aria-label="Default select example" name="formation_id">
                        <option selected>Ouvrir le menu de sélection</option>
                            @foreach ($formations as $formation)
                                <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
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
    </div>
</body>
</html>