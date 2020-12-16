@extends ('layout')

@section ('content')
    <h3 class="p-2">Discussion autour du sujet "{{ $topic->description }}" dans le cadre du thème {{ $topic->theme->name }}:</h3>
    @forelse ($topic->opinions as $opinion)
        <div class="border border-light p-2 ml-2">
            ({{ $opinion->forumuser->first_name }})
            {{ $opinion->description }}
            @if($opinion->references->count() > 0)
                <div id="accordion" class="float-right d-block">
                    <div data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Références
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        @foreach ($opinion->references as $reference)
                            <div class="bg-light p-1"><a href="{{ $reference->url }}">{{ $reference->description }}</a></div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @empty
        <p>(Aucune opinion n'a été soumise pour l'instant sur ce sujet)</p>
    @endforelse
@endsection
