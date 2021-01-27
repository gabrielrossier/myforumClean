@extends ('layout')

@section ('content')
    <h1 class="text-center p-5">Utilisateurs</h1>
    <div class="container-fluid">
        @foreach($users as $user)
            <div class="row">
                <div class="col-2">{{ $user->pseudo }}</div>
                <div class="col-2">{{ $user->role->name }}</div>
            </div>
        @endforeach
    </div>
@endsection
