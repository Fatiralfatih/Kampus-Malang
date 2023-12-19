@props(['nama' , 'placeholder'])

<div class="form-floating form-floating-outline">
    <textarea
      class="form-control h-px-100 @error($nama) border-rose-400 @enderror"
      id="{{$nama}}"
      name="{{$nama}}"
      placeholder="{{ucwords($placeholder)}}">{{ $slot }}</textarea>
    <label for="{{$nama}}">{{ucwords($nama)}}</label>
  </div>
