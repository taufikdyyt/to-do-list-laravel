<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">
        <h1 class="my-4">To-Do List</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Masukkan tugas baru">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Tugas</button>
        </form>

        <ul class="list-group my-4">
            @foreach($tasks as $task)
                <li class="list-group-item">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="d-flex justify-content-between align-items-center">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-0">
                            <input type="text" name="name" class="form-control" value="{{ $task->name }}">
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="completed" class="form-check-input" {{ $task->completed ? 'checked' : '' }}>
                            <label class="form-check-label">Selesai</label>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

</body>
</html> 