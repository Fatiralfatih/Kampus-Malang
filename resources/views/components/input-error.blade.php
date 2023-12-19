@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>
        @foreach ((array) $messages as $message)
            <p>{{ ucwords($message) }}</p>
        @endforeach
    </div>
@endif
