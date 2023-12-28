@props(['nama', 'placeholder', 'type' => 'text'])

<div class="form-floating form-floating-outline">
    <input type="{{$type}}" id="{{ ucwords($nama) }}" name="{{ $nama }}" required
        class="form-control @error($nama)) border-rose-500 @enderror" placeholder="{{ ucwords($placeholder) }}" 
        {{ $attributes->merge(['value' => old($nama)]) }} />
    <label for="{{ ucwords($nama) }}"> {{ $slot }} </label>
</div>
