@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($files as $file)
            <div class="col-4 p-l-3 p-3">
                <div class="card">
                    <form method="POST" action="{{ route('files.destroy', [$file->name]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="file" value="{{ $file->path }}">
                        <h4 class="card-header">
                            <a href="{{route('files.show', [$file->name] )}}">
                                {{ $file->name }}
                            </a>
                            <button class="btn btn-link btn-lg text-red" href="{{route('files.show', [$file->name] )}}">
                                <span class="far fa-trash-alt"></span>
                            </button>
                        </h4>
                    </form>
                    <div class="card-body">
                        <span class="{{$file->icon}} icon text-lg"></span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="d-block">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="file" value="file" required>
                        <button class="btn btn-primary pull-right" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
