<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="fas fa-folder icon folder text-center"></span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <p class="mb-0">
            <a href="{{route('home.index', ['root' => $directory['path']])}}">
                {{ str_limit($directory['basename'], 15, '...') }}
            </a>
        </p>
    </div>
</div>