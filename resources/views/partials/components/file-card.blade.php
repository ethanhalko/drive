<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="{{$file->icon}} icon"></span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <form method="POST" action="{{ route('files.destroy', [$file->name]) }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="hidden" name="file" value="{{ $file->path }}">
        </form>
        <a href="{{route('files.show', ['file' => $file->name, 'path' => $file->path] )}}">
            <p class="mb-0">{{ str_limit($file->name, 12, '...') }}</p>
        </a>
    </div>
</div>