@extends('layouts.app')

@section('content')


    <section class="titleSection">
        <p> Post New Story </p>
    </section>
    <div class="container">
        <section class="mainSection">
            <br>
            <form method="POST" action="/stories">

                @method('POST')
                @csrf

                <div class="col-10">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" placeholder="Your title" name="title">
                    </div>

                    {{-- <div class="form-group">
                        <label for="image">File input</label>
                        <input type="file" class="form-control-file" id="image" aria-describedby="fileHelp">
                        <small id="fileHelp" class="form-text text-muted">Lorem ipsum.</small>
                    </div> --}}

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" rows="5" placeholder="Your story..."></textarea>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-12 col-sm-6">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </div>
                </div>
            </form>

        </section>
    </div>


@endsection
