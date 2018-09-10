@extends('layouts.app')

@section('content')
    <div class="row m-4">
        @foreach($files as $file)
            <div class="col-3 p-3">
                @include('partials.components.card-button-group', ['file' => $file])
            </div>
        @endforeach
    </div>
    <div class="row">
    </div>
    <div id="file-upload-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('files.store') }}" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload a file</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-block">
                            {{ csrf_field() }}
                            <input type="file" name="file" value="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="create-folder-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('folders.store') }}" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload a file</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-block">
                            {{ csrf_field() }}
                            <input type="text" name="folder" value="Folder" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button class="fab btn btn-lg" data-toggle="modal" data-target="#create-folder-modal">
        <span class="fas fa-plus"></span>
    </button>
@endsection
