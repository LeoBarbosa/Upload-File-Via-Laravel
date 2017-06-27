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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Upload</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="/audios/upload" method="POST"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-4 control-label">Audio</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="file" name="audio">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="description">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4"><button type="submit" class="btn btn-primary">
                                        Upload
                                    </button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
