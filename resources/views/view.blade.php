@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="d-block mx-auto">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <?php echo $file->view; ?>
                        <a href="{{ route('files.download', ['file' => $file->name ]) }}">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection