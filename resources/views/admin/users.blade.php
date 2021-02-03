@extends ('layout')

@section ('content')
    <h1 class="text-center p-5">Utilisateurs</h1>
    <div class="container-fluid">
        @foreach($users as $user)
            <div class="row">
                <div class="col-2">{{ $user->pseudo }}</div>
                <div class="col-2">{{ $user->role->name }}</div>
                <div class="col-1">
                    @if($user->id != Auth::user()->id)
                        <form method="post" action="{{ route('admin.togglerole') }}">
                            @csrf
                            <input type="hidden" name="userid" value="{{ $user->id }}">
                            @if($user->isAdmin())
                                <button class="btn btn-sm btn-warning">Déstituer</button>
                            @else
                                @if(\App\Models\User::admins()->count() < 5)
                                    <button class="btn btn-sm btn-primary">Nommer</button>
                                @endif
                            @endif
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
