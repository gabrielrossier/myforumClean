@extends ('layout')

@section ('content')
    <div class="p-2">Les sujets du thème {{ $theme->name }}:</div>
    @foreach ($theme->topics as $topic)
        <a href="{{ route('topics.show',$topic->id) }}"><div class="border border-light p-2 ml-2 text-decoration-none">{{ $topic->description }} <span class="badge badge-light float-right">{{ $topic->opinions->count() }}</span></div></a>
    @endforeach
    <div id="accordionnew">
        <button class="btn btn-primary" data-toggle="collapse" data-target="#collapsenew" aria-expanded="true" aria-controls="collapsenew">
            Ajouter un sujet
        </button>
        <div id="collapsenew" class="collapse" data-parent="#accordionnew">
            <form action="{{ route('topics.store') }}" method="post">
                @csrf
                <textarea class="form-control" name="newtop"></textarea>
                <button class="btn btn-success" type="submit">Envoyer</button>
                <input type="hidden" name="theme" value="{{ $theme->id }}">
            </form>
        </div>
    </div>
@endsection
