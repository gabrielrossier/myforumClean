@extends ('layout')

@section ('content')
    <h3 class="p-2">Discussion autour du sujet "{{ $topic->description }}" dans le cadre du thème {{ $topic->theme->name }}:</h3>
    @forelse ($topic->opinions as $opinion)
        <div class="border border-light p-2 ml-2">({{ $opinion->forumuser->first_name }}) {{ $opinion->description }}</div></a>
    @empty
        <p>(Aucune opinion n'a été soumise pour l'instant sur ce sujet)</p>
    @endforelse
@endsection
