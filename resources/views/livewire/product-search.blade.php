<div>
    {{-- SEARCH --}}
    <div class="mb-4">
        <input
            type="text"
            wire:model.live="search"
            placeholder="Cari product berdasarkan title..."
            class="w-full px-4 py-2 border rounded"
        >
    </div>

    {{-- TABLE --}}
    <div class="overflow-x-auto">
        <table class="min-w-full table-bordered">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">IMAGE</th>
                    <th class="px-4 py-2 border">TITLE</th>
                    <th class="px-4 py-2 border">PRICE</th>
                    <th class="px-4 py-2 border">STOCK</th>
                    <th class="px-4 py-2 border" style="width: 20%">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="px-4 py-2 border text-center">
                            <img src="{{ asset('storage/products/' . $product->image) }}" width="120">
                        </td>
                        <td class="px-4 py-2 border">{{ $product->title }}</td>
                        <td class="px-4 py-2 border">
                            Rp {{ number_format($product->price, 2, ',', '.') }}
                        </td>
                        <td class="px-4 py-2 border">{{ $product->stock }}</td>
                        <td class="px-4 py-2 border text-center">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            Data tidak ditemukan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
