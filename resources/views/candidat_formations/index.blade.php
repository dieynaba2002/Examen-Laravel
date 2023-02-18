<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <title>Creation Type</title>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Listes des types Ajoutes</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('candidat_formations.create') }}"> formation/candidat</a>
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
                    <th>Candidat</th>
                    <th>Formation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candidat_formations as $candidat_formation)
                    <tr>
                        <td>{{ $candidat_formation->candidat_id }}</td>
                        <td>{{ $candidat_formation  ->formation_id }}</td>
                        
                    </tr>
                    @endforeach
            </tbody>
        </table>
       
    </div>
</body>
</html>