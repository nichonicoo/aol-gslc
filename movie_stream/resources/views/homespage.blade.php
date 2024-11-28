@extends('layouts')

@section('contents')

    <div class="container d-flex justify-content-center">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQeRoc_BhrP-jahuwf0Hrxe48LiP6DiHWiiw&s" alt="">
    </div>

    <div class="container d-flex justify-content-center" >
        <a type="button" class="btn btn-primary" href="{{ route('movies.create') }}">Add a new Movies</a>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="row">

            @foreach ($movies as $mv)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' .$mv->photo) }}" class="card-img-top" alt="..." width="20px">
                <div class="card-body">
                  <h3 class="card-title">{{$mv->title}}</h5>
                  <h7 class="card-title">{{$mv->genres->name}}</h4>
                  <p class="card-text">{{$mv->description}}</p>
                  <p class="card-text">{{$mv->publish_date}}</p>
                  <form action="{{ route('movies.delete', ['movies'=>$mv]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete Movies" class="btn btn-danger"></input>
                  </form>
                </div>
              </div>
            @endforeach
        </div>
    </div>
    {{$movies->links()}}

@endsection
