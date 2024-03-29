<div class="grid grid-cols-4 gap-4 mt-12">
    @foreach($this->products as $product)
        <div class="bt-white rounded-lg shadow p-4 relative">
            <a href="{{ route('product', $product->id) }}" class="absolute inset-0 w-full h-full"></a>
                <img src="{{ $product->image->path }}" alt="" />
                <h2 class="font-medium text-lg">{{ $product->name }}</h2>
                <span class="text-gray-700 text-sm">{{ $product->price }}</span>
        </div>
    @endforeach
</div>
