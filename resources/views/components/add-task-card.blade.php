<form action="/tasks" method="POST">
    @csrf
    <div class="form-group">
        <label for="insert_task" class="hidden"></label>
        <input name="name" type="text" class="form-control mb-1 @error('name') is-invalid @enderror" id="insert_task" placeholder="Insert task name" />
    </div>

    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Add</button>
    </div>
</form>
