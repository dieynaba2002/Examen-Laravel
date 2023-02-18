<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Creation Referentiel</title>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Listes des Referentiels Ajoutes</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('referentiels.create') }}"> Creer un referentiel</a>
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
                    <th>Libelle</th>
                    <th>Validated</th>
                    <th>Horaire</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($referentiels as $referentiel)
                    <tr>
                        <td>{{ $referentiel->id }}</td>
                        <td>{{ $referentiel->libelle }}</td>
                        <td>{{ $referentiel->validated }}</td>
                        <td>{{ $referentiel->horaire }}</td>
                        <td>
                            <form action="{{ route('referentiels.destroy',$referentiel->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('referentiels.edit',$referentiel->id) }}">Modifier</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $referentiels->links() !!}
    </div>
</body>
</html>