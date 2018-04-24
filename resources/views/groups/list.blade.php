<table class="default-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Group Name</th>
      <th>Institution Name</th>
      <th>User Name</th>
      <th>Options</th>
    </tr>
  </thead>

  <tbody>
    @foreach($group_list as $group)
    <tr>
      <td>{{ $group->id }}</td>
      <td>{{ $group->name }}</td>
      <td>{{ $group->user->name }}</td>
      <td>{{ $group->institution->name }}</td>
      <td>
        {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}
        {!! Form::submit('Delete') !!}
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
