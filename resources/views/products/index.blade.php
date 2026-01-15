<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium">DAFTAR PRODUCT</h3>
                        <a href="{{ route('products.create') }}" class="btn btn-success">ADD PRODUCT</a>
                    </div>
                    
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
                                            <img src="{{ asset('storage/products/' . $product->image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td class="px-4 py-2 border">{{ $product->title }}</td>
                                        <td class="px-4 py-2 border">{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
                                        <td class="px-4 py-2 border">{{ $product->stock }}</td>
                                        <td class="px-4 py-2 border text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-2 border text-center">
                                            <div class="alert alert-danger">
                                                Data Products belum ada.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if (session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif (session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>
