@extends('layouts')

@section('contents')

    <div>
        <form action="{{ route('movies.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Genre</label>

                <select class="form-select" aria-label="Default select example" name="genres_id">
                    @foreach ($genres as $gr)

                    <option value="{{$gr->id}}"> {{$gr->name}} </option>
                    @endforeach
                  </select>
                  @error('genres_id')
                  <div class="alert alert-danger" role="alert">
                    A simple danger alert—check it out!
                  </div>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Photo</label>
                <input class="form-control" type="file" name="photo">
                @error('photo')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                  </div>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title">
                @error('title')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                  </div>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
                @error('description')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                  </div>
                  @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Date</label>
                <input type="date" class="form-control" name="publish_date" pattern="\d{2}-\d{2}-\d{4}"
                placeholder="mm/dd/yyyy">
                @error('publish_date')
                  <div class="alert alert-danger" role="alert">
                    {{$message}}
                  </div>
                  @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>

        </form>
    </div>
@endsection
