@extends('layouts.app')

@section('content')
    <span class="title">Create News</span>
    <form action="{{ url('news/add') }}" method="POST" enctype="multipart/form-data" class="container bg-white shadow py-3 mt-3 rounded">
        @csrf
        <div class="row">
            <div class="col-4 d-flex flex-column">
                <img src="{{ url('asset/images/camera-fill.svg') }}" class="camera">
                <label for="news-photo" class="btn btn-purple align-self-center">Choose a photo</label>
                <input type="file" name="photo" id="news-photo" class="d-none">
                @error('photo')
                    <p class="text-danger text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-8">
                <div class="my-2">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="News title">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-3">
                    <label for="category">News Category</label>
                    <select name="category" id="category" class="form-select">
                        <option value="" class="d-none">Choose news type</option>
                        <option value="important">Important News</option>
                        <option value="normal">Normal News</option>
                    </select>
                    @error('category')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mt-3" id="states">
            <div class="col-8 offset-2">
                <ul style="list-style: none;">
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Kachin">Kachin</label>
                            <input name="regions[]" value="1" class="form-check-input fs-3" type="checkbox" role="switch" id="Kachin">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Kayah">Kayah</label>
                            <input name="regions[]" value="2" class="form-check-input fs-3" type="checkbox" role="switch" id="Kayah">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Kayin">Kayin</label>
                            <input name="regions[]" value="3" class="form-check-input fs-3" type="checkbox" role="switch" id="Kayin">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Chin">Chin</label>
                            <input name="regions[]" value="4" class="form-check-input fs-3" type="checkbox" role="switch" id="Chin">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Sagaing">Sagaing</label>
                            <input name="regions[]" value="5" class="form-check-input fs-3" type="checkbox" role="switch" id="Sagaing">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Tanintharyi">Tanintharyi</label>
                            <input name="regions[]" value="6" class="form-check-input fs-3" type="checkbox" role="switch" id="Tanintharyi">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Bago">Bago</label>
                            <input name="regions[]" value="7" class="form-check-input fs-3" type="checkbox" role="switch" id="Bago">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Magway">Magway</label>
                            <input name="regions[]" value="8" class="form-check-input fs-3" type="checkbox" role="switch" id="Magway">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Mandalay">Mandalay</label>
                            <input name="regions[]" value="9" class="form-check-input fs-3" type="checkbox" role="switch" id="Mandalay">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Mon">Mon</label>
                            <input name="regions[]" value="10" class="form-check-input fs-3" type="checkbox" role="switch" id="Mon">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Rakhine">Rakhine</label>
                            <input name="regions[]" value="11" class="form-check-input fs-3" type="checkbox" role="switch" id="Rakhine">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Yangon">Yangon</label>
                            <input name="regions[]" value="12" class="form-check-input fs-3" type="checkbox" role="switch" id="Yangon">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Shan">Shan</label>
                            <input name="regions[]" value="13" class="form-check-input fs-3" type="checkbox" role="switch" id="Shan">
                        </span>
                    </li>
                    <li>
                        <span class="form-check form-switch form-check-reverse d-flex justify-content-between align-items-center">
                            <label class="form-check-label" for="Ayeyarwady">Ayeyarwady</label>
                            <input name="regions[]" value="14" class="form-check-input fs-3" type="checkbox" role="switch" id="Ayeyarwady">
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <label for="">Description</label>
                <textarea class="summernote" name="description"></textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <button class="btn btn-purple float-end">Create</button>
            </div>
        </div>
    </form>
@endsection

@section('script')
<script>
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 300,
      });
      $('#states').hide();
      $('#category').change(() => {
        if($('#category').val() == "important"){
            $('#states').show()
        }else{
            $('#states').hide()
        }
      })
    });
</script>
@endsection
