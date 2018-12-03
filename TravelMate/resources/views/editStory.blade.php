@extends('layouts.app')

@section('content')


<section class="titleSection">
    <p> Edit "{{ $story->title }}" </p>
</section>
<div class="container">
    <section class="mainSection">
        <br>
        <form method="POST" action="/stories/{{$story->id}}">
            @method('PATCH')
            @csrf

            <div class="col-10">

                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" placeholder="Your title" name="title" value="{{ $story->title }}">
                </div>

                {{-- <div class="form-group">
                    <label for="image">File input</label>
                    <input type="file" class="form-control-file" id="image" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Lorem ipsum.</small>
                </div> --}}

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" rows="5" placeholder="Your story...">{{ $story->content }}</textarea>
                </div>

                <div class="form-group">
                    <div class="offset-sm-12 col-sm-6">
                        <input type="submit" class="btn btn-success" value="Update Story" />
                    </div>
                </div>
            </div>
        </form>

        <form method="POST" action="/stories/{{$story->id}}">
            @method('DELETE')
            @csrf
            <div class="col-10">
                <div class="form-group">
                    <div class="offset-sm-12 col-sm-6">
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </div>
                </div>
            </div>
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>


    </section>
</div>


@endsection
