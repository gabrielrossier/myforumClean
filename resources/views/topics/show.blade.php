@extends ('layout')

@section ('content')
    <h3 class="p-2">Discussion autour du sujet "{{ $topic->description }}" dans le cadre du thème {{ $topic->theme->name }}:</h3>
    <div class="small mb-3">Proposé par {{ $topic->user->pseudo }}</div>
    @forelse ($topic->opinions as $opinion)
        <div class="p-2 ml-2">
            ({{ $opinion->user->first_name }})
            {{ $opinion->description }}
            @if($opinion->references->count() > 0)
                <div id="accordion{{ $opinion->id }}" class="small grey-text">
                    <div data-toggle="collapse" data-target="#collapse{{ $opinion->id }}" aria-expanded="true" aria-controls="collapse{{ $opinion->id }}">
                        Références
                    </div>
                    <div id="collapse{{ $opinion->id }}" class="collapse" data-parent="#accordion{{ $opinion->id }}">
                        @foreach ($opinion->references as $reference)
                            <div class="bg-light p-1"><a href="{{ $reference->url }}">{{ $reference->description }}</a></div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if($opinion->comments->count() > 0)
                <div class="small ml-3">
                    <div>
                        @foreach ($opinion->comments as $comment)
                            <div class="p-1">{{ $comment->pseudo }}: {{ $comment->pivot->comment }}, {{ $comment->pivot->points }}pts</div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @empty
        <p>(Aucune opinion n'a été soumise pour l'instant sur ce sujet)</p>
    @endforelse
@endsection
