@extends ('layout')

@section ('content')
    <h1 class="text-center p-5">Utilisateurs</h1>
    <div class="container-fluid">
        @foreach($users as $user)
            <div class="row">
                <div class="col-2">{{ $user->pseudo }}</div>
                <div class="col-2">

                @foreach($user->roles as $role)
                    <p>{{$role->name}} </p>
                
                @endforeach
                </div>
                <div class="col-1">
                    
                        <form method="post" action="{{ route('admin.togglerole') }}">
                            @csrf
                            <input type="hidden" name="userid" value="{{ $user->id }}">
                            <div class="row">
                                <select id="roles" name="roles">
                                    @foreach(\App\Models\Role::all() as $role)
                                        <option name="{{$role->slug}}" id="{{$role->slug}}">{{$role->slug}}</option>
                                    @endforeach
                                </select>
                                <div class=col-1>
                                    <button class="btn btn-sm btn-primary">Attribuer / enlever</button>
                                </div>
                            </div>
                            
                        </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
