@props(['task', 'key'])
<tr>
    <th class="card-body-count text-center" class="text-center">{{ $key + 1 }}</th>
    <td
        class="card-body-value"
        @style(['text-decoration: line-through' => $task->completed_at])
    >{{$task->name}}</td>
    <td
        class="text-right buttons-container">
        <div @class(['hidden' => $task->completed_at])>
            <form class="visible-lg-inline" action="{{ route('tasks.update', ['task' => $task]) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-ok"></span>
                </button>
            </form>
            <form class="visible-lg-inline" action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </form>
        </div>
    </td>
</tr>
