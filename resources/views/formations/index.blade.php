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
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Listes des Formation Ajoutes</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('formations.create') }}"> Creer un formation</a>
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
                    <th>Duree</th>
                    <th>Description</th>
                    <th>Is Started</th>
                    <th>Date Debut</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formations as $formation)
                    <tr>
                        <td>{{ $formation->id }}</td>
                        <td>{{ $formation->nom }}</td>
                        <td>{{ $formation->duree }}</td>
                        <td>{{ $formation->description }}</td>
                        <td>{{ $formation->isStarted }}</td>
                        <td>{{ $formation->dateDebut }}</td>
                        <td>
                            <form action="{{ route('formations.destroy',$formation->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('formations.edit',$formation->id) }}">Modifier</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $formations->links() !!}
    </div>
</body>
</html>