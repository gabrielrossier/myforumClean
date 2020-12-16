@extends ('layout')

@section ('content')
    @foreach ($themes as $theme)
        <div class="border border-dark p-2">{{ $theme->name }} <span class="badge badge-light float-right">{{ $theme->topics->count() }}</span></div>
    @endforeach
@endsection
