@extends ('layout')

@section ('content')
    <div class="p-2">Les sujets du thème {{ $theme->name }}:</div>
    @foreach ($theme->topics as $topic)
        <a href="{{ route('topics.show',$topic->id) }}"><div class="border border-light p-2 ml-2 text-decoration-none">{{ $topic->description }} <span class="badge badge-light float-right">{{ $topic->opinions->count() }}</span></div></a>
    @endforeach
@endsection
