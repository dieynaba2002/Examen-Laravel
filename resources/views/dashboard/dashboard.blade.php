<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
    <title>Dashboard</title>
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestion Candidat</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse  " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('candidats.store')}}">Candidat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('formations.store') }}">Formation</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('referentiels.store') }}" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Referentiel
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('types.store') }}" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Type
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <form action="{{ route('logout') }}" method="POST">
                    @csrf
                        <button type="submit" class="btn btn-danger offset-10 mr-5">Déconnexion</button>
                    </form>

                    

            </div>
        </div>
    </nav>
    <div class="container mt-4" style="width: 100%;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="width: 100%;">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="card text-white bg-primary mb-3"
                                        style="max-width: 18rem;height: 270px;">
                                        <div class="card-header">Nombre de candidat/Formation</div>
                                        <div class="card-body">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Formation</th>
                                                        <th>candidats</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($countByFormation as $count)
                                                    <tr>
                                                        <td>{{ $count->nom}}</td>
                                                        <th>{{ $count->candidat_count }}</th>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success mb-3"
                                        style="max-width: 18rem;height: 270px;">
                                        <div class="card-header">Nombre de Formation/Referenttiel</div>
                                        <div class="card-body">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Referentiel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </th>
                                                        <th>Formation</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($countByReferentiel as $count)
                                                    <tr>
                                                        <td>{{ $count->libelle}}</td>
                                                        <th>{{ $count->formations_count }}</th>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;height: 270px;">
                                        <div class="card-header">Liste des Formations/Type</div>
                                        <div class="card-body">

                                            @foreach ($repartition_formations as $type)
                                            <h6>Type {{ $type->libelle }}</h3>
                                                <ul>
                                                    @foreach ($type->referentiels as $referentiel)
                                                    @foreach ($referentiel->formations as $formation)
                                                    <li>{{ $formation->nom }}</li>
                                                    @endforeach
                                                    @endforeach
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="card text-white bg-warning mb-3"
                                        style="max-width: 18rem;height: 270px;">
                                        <div class="card-header">Candidats Masculin</div>
                                        <div class="card-body">
                                            <ul>
                                                @foreach($candidats_masculins as $candidat)

                                                <li>{{ $candidat->prenom }}</li>

                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;height: 270px;">
                                        <div class="card-header">Candidats Feminin</div>
                                        <ul>
                                            @foreach($candidats_feminins as $candidat)

                                            <li>{{ $candidat->prenom }}</li>

                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col">

                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 style="text-align: center;">Graphe representant la tranche d'age</h3>
                    <canvas id="chart"></canvas>                   
                    <script>
                    var ages = <?php echo $ages; ?>;
                    var labels = [], data = [];
                    for (var i = 0; i < ages.length; i++) {
                        labels.push(ages[i].age);
                        data.push(ages[i].total);
                    }

                    var ctx = document.getElementById('chart').getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                        labels: labels,
                        datasets: [{
                            label: 'Tranche d\'âge',
                            data: data,
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                        },
                        options: {
                        scales: {
                            yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                            }]
                        }
                        }
                    });
                    </script>
                    <h3 class="text-center">Statistique des formations en cours et en attente</h3>
                    <div>
                        <canvas id="formationsChart"></canvas>
                    </div>
                    <script>
                        var formationsChart = new Chart(document.getElementById('formationsChart'), {
                            type: 'bar',
                            data: {
                                labels: ['En cours', 'En attente'],
                                datasets: [{
                                    label: 'Statistiques des formations',
                                    data: [{{$formationsEnCours}}, {{$formationsEnAttente}}],
                                    backgroundColor: ['#36a2eb', '#ff6384']
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                    
                </div>
            </div>
        </div>
    </div>


</body>

</html>