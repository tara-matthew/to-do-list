@props(['tasks'])
<div class="panel panel-default">
    <table class="table">
        <thead>
            <tr>
                <th class="count-header">#</th>
                <th class="title-header" colspan=2>Task</th>
            </tr>
        </thead>
        @foreach ($tasks as $key => $task)
            <x-task-card :task="$task" :key="$key" />
        @endforeach
    </table>
</div>
