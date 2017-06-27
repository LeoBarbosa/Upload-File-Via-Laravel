@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            @foreach($data as $d)
                <div class="col-md-4">
                    <label>{{$d['title']}}</label>
                    <p>{{$d['description']}}</p>
                    <audio src="/audio/{{$d['file']}}"  controls></audio>
                </div>
            @endforeach
        </div>
    </div>
@endsection
