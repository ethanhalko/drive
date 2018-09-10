<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <span class="{{$file->icon}} icon text-lg"></span>
            </div>
            <div class="col-md-10">
                <form method="POST" action="{{ route('files.destroy', [$file->name]) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="file" value="{{ $file->path }}">
                </form>
                <a href="{{route('files.show', [$file->name] )}}">
                    <h4>{{ str_limit($file->name, 15, '...') }}</h4>
                </a>
            </div>
        </div>
    </div>
</div>