@props(['task', 'key'])
<tr>
    <th class="text-center">{{$key + 1}}</th>
    <td
        @style(['text-decoration: line-through' => $task->completed_at])
    >{{$task->name}}</td>
    <td
        class="text-right buttons-container">
        <div @class(['hidden' => $task->completed_at])>
            <form class="visible-lg-inline" action="/tasks/{{$task->id}}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-ok"></span>
                </button>
            </form>
            <form class="visible-lg-inline" action="/tasks/{{$task->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span>
                </button>
            </form>
        </div>
    </td>
</tr>
