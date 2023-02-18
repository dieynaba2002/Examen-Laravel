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
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Listes des Candidats Ajoutes</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('candidats.create') }}"> Creer un candidat</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Niveau d'Etude</th>
                    <th>Sexe</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candidats as $candidat)
                    <tr>
                        <td>{{ $candidat->id }}</td>
                        <td>{{ $candidat->nom }}</td>
                        <td>{{ $candidat->prenom }}</td>
                        <td>{{ $candidat->email }}</td>
                        <td>{{ $candidat->age }}</td>
                        <td>{{ $candidat->niveauEtude }}</td>
                        <td>{{ $candidat->sexe }}</td>
                        <td>
                            <form action="{{ route('candidats.destroy',$candidat->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('candidats.edit',$candidat->id) }}">Modifier</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $candidats->links() !!}
    </div>
</body>
</html>