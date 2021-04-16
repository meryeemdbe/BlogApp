@extends('layouts.app')

@section('content')



<div class="row">
    <div class="md-col-12">
        <br>
        <h3> {{ $blog->title }}</h3>
        <img src=" {{asset($blog->image)}} " alt="" class="card-img-top">
        <br><br><br>
        <p class="lead">
        {{$blog->content}}
        </p>

        <a href="{{ route('edit_blog_path' , ['id' => $blog->id])}}" class="btn btn-outline-info"> Edit </a>
        <a href="{{route('blogs_path')}} " class="btn btn-outline-secondary" > Back</a> 

        <form action=" {{ route('delete_blog_path' , [ 'id' => $blog->id ] ) }} " method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-outline-danger" value="Delete">
        </form>
    </div>
    <br>

</div>




@endsection