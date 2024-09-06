<div class="container">
    <h1>{{ $title }}</h1>
    <p>{{ $description }}</p>
    
    <div class="item-grid">
        @foreach ($items as $item)
            <div class="item">
                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                <div class="item-content">
                    <h3>{{ $item['title'] }}</h3>
                    <p>{{ $item['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
