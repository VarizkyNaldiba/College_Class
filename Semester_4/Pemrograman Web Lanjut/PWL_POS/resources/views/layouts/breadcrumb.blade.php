<div class="row mb-3">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                @foreach($breadcrumb->list as $key => $value)
                    @if($key == count($breadcrumb->list) - 1)
                        <li class="breadcrumb-item active" aria-current="page">{{ $value }}</li>
                    @else
                        <li class="breadcrumb-item"><a href="#">{{ $value }}</a></li>
                    @endif
                @endforeach
            </ol>
        </nav>
        <h2 class="h4 mb-0 mt-2">{{ $breadcrumb->title }}</h2>
    </div>
</div>