@extends('layouts.admin')

@section('content')
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ime</th>
      <th scope="col">Email</th>
      <th scope="col">Korisnička grupa</th>
      <th scope="col">Akcija</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($users as $user)
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <form method="post" action="{{route('admin.user-update', ['userId' => $user->id])}}">
        @csrf
        <td>
            <select class="form-control" id="exampleFormControlSelect1" name="userRole">
                @foreach($roles as $role)
                    <option
                    value="{{$role->id}}"
                    @if($role->id === $user->role_id)
                        selected
                    @endif
                    >{{$role->name}}</option>
                @endforeach
            </select>
        </td>
        <td>
            <button type="submit">Promjeni</button>
        </td>
        </form>
      @endforeach
    </tr>
  </tbody>
</table>
@endsection
