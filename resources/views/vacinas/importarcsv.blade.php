<!DOCTYPE html>
<html>
<head>
    <title>Import Vacinas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Import Vacinas</h1>
        <form action="{{ route('vacinas.importarCSV') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">CSV File</label>
                <input type="file" class="form-control" id="file" name="file" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
