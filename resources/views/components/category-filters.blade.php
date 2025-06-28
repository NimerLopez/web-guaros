@props([
    'categories' => [],
    'activeFilter' => 'all',
    'btnClass' => 'btn-outline-primary',
    'showIcons' => true,
    'rounded' => 'rounded-pill',
    'gap' => 'gap-2'
])

<div class="row justify-content-center mb-5">
    <div class="col-12">
        <div class="d-flex flex-wrap justify-content-center {{ $gap }}">
            <button class="btn {{ $btnClass }} {{ $rounded }} px-3 filter-btn {{ $activeFilter === 'all' ? 'active' : '' }}" 
                    data-filter="all">
                @if($showIcons)
                    <i class="bi bi-grid-fill me-2"></i>
                @endif
                Todos
            </button>
            
            @foreach($categories as $category)
                <button class="btn {{ $btnClass }} {{ $rounded }} px-3 filter-btn {{ $activeFilter === $category->slug ? 'active' : '' }}" 
                        data-filter="{{ $category->slug }}">
                    @if($showIcons && ($category->icon ?? false))
                        <i class="bi bi-{{ $category->icon }} me-2"></i>
                    @endif
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    </div>
</div>