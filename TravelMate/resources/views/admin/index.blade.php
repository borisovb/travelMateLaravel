@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h2>Waiting for approval</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col"><i class="fas fa-calendar"></i> Date</th>
                        <th scope="col"><i class="fas fa-newspaper"></i> Title</th>
                        <th scope="col"><i class="fas fa-mouse-pointer"></i> Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($storiesUnapproved as $unapprovedStory)
                    <tr>
                            <th scope="row">{{ $unapprovedStory->created_at }}</th>
                            <td>{{ $unapprovedStory->title }}</td>
                            <td>
                                <form method="POST" action="/stories/{{$unapprovedStory->id}}/approve">
                                    @method('PATCH')
                                    @csrf
                                    <button type="submit" class="btn btn-info btn-sm">Approve</button>
                                </form>
                                <a href="/stories/{{ $unapprovedStory->id }}/edit"><button type="submit" class="btn btn-success btn-sm" style="margin-top:2px">Edit</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm">
            <h2>Approved stories</h2>
            <table class="table table-hover">
                <thead>

                    <tr>
                        <th scope="col"><i class="fas fa-calendar"></i> Date</th>
                        <th scope="col"><i class="fas fa-newspaper"></i> Title</th>
                        <th scope="col"><i class="fas fa-mouse-pointer"></i> Actions</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($storiesApproved as $approvedStory)
                    <tr>
                        <th scope="row">{{ $approvedStory->created_at }}</th>
                        <td>{{ $approvedStory->title }}</td>
                        <td>
                            <a href="/stories/{{ $approvedStory->id }}/edit"><button type="submit" class="btn btn-success btn-sm">Edit</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $storiesApproved->links() }}
        </div>
    </div>
</div>

@endsection
