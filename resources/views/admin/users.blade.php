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
                        @if($user->role->slug == 'ADMI')
                            <form method="post" action="{{ route('admin.demote') }}">
                                @csrf
                                <input type="hidden" name="userid" value="{{ $user->id }}">
                                <button class="btn btn-sm btn-warning">Déstituer</button>
                            </form>
                        @else
                            <form method="post" action="{{ route('admin.promote') }}">
                                @csrf
                                <input type="hidden" name="userid" value="{{ $user->id }}">
                                <button class="btn btn-sm btn-primary">Nommer</button>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
