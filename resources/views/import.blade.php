<html>
<head>
    <title>Laravel 9 Import Export Excel to Database Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            import Client
        </div>
        <div class="card-body">
            <form action="{{ route('importClient') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Clients Data</button>
            </form>

        </div>
    </div>
</div>


<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            import Vehicules
        </div>
        <div class="card-body">
            <form action="{{ route('import-Vehicules') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import vehicules Data</button>
            </form>

        </div>
    </div>
</div>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            import appareils
        </div>
        <div class="card-body">
            <form action="{{ route('import-appareils') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import appareils Data</button>
            </form>

        </div>
    </div>
</div>


<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            import appareils combination
        </div>
        <div class="card-body">
            <form action="{{ route('import-appareils-combination') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import appareils with combination Data</button>
            </form>

        </div>
    </div>
</div>


<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            import Tasks
        </div>
        <div class="card-body">
            <form action="{{ route('import-tasks') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Tasks Data</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>
