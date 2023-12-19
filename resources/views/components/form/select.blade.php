@props(['nama'])
<div class="form-floating form-floating-outline">
    <select id="{{$nama}}" name="{{$nama}}" class="select2 form-select form-select-lg inline-block @error($nama) border-rose-500 @enderror">
        {{$slot}}
    </select>
    <label for="{{$nama}}">{{ ucwords($nama) }}</label>
</div>
