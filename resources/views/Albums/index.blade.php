@extends('base')
@section('title','Newest albums')
@section('content')

    <div class="row table-background">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Created</th>
                <th></th>
                </thead>
                <tbody>>
                @foreach($albums as $album)
                    <tr>
                        <th>{{$album->id}}</th>
                        <td>{{$album->title}}</td>
                        <td>{{ substr($album->artist,0,50)}}{{ strlen($album->artist) > 50 ? "..." : "" }}</td>
                        <td>{{ date('M j, Y', strtotime($album->created_at)) }}</td>
                        <td><a href="{{ route('albums.show',$album->id) }}" class="btn btn-default">view</a> <a href="" class="btn btn-default">edit</a></td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            {{ $albums->links() }}
        </div>
    </div>
    <div class="col-md-1">
        <a href="{{ route('albums.create') }}" class="btn btn-default btn-lg">create</a>
    </div>
@endsection