<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center">
            <input 
                type="text" 
                wire:model.live="search" 
                class="form-control me-2" 
                placeholder="Search categories..."
                style="width: 250px;"
            >
            <select wire:model.live="perPage" class="form-select" style="width: auto;">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="text-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                    </th>
                    <th>
                        <a href="#" wire:click="sortBy('id')" class="text-decoration-none text-dark">
                            ID
                            @if($sortField === 'id')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @else
                                <span class="text-muted">↕</span>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="#" wire:click="sortBy('name')" class="text-decoration-none text-dark">
                            Name
                            @if($sortField === 'name')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @else
                                <span class="text-muted">↕</span>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="#" wire:click="sortBy('description')" class="text-decoration-none text-dark">
                            Description
                            @if($sortField === 'description')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @else
                                <span class="text-muted">↕</span>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="#" wire:click="sortBy('slug')" class="text-decoration-none text-dark">
                            Slug
                            @if($sortField === 'slug')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @else
                                <span class="text-muted">↕</span>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="#" wire:click="sortBy('sort_order')" class="text-decoration-none text-dark">
                            Order
                            @if($sortField === 'sort_order')
                                <span>{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                            @else
                                <span class="text-muted">↕</span>
                            @endif
                        </a>
                    </th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td class="text-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="">
                            </div>
                        </td>
                        <td>{{ $category->id }}</td>
                        <td>
                            @if ($category->parent_id)
                                <i class="material-icons md-subdirectory_arrow_right text-muted"></i>
                            @endif
                            <b>{{ $category->name }}</b>
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($category->description, 50) ?? '-' }}</td>
                        <td>{{ $category->slug ?? '-' }}</td>
                        <td>{{ $category->sort_order ?? $category->id }}</td>
                        <td class="text-end">
                            <a href="{{ route('categories.index', ['edit' => $category->id]) }}" class="btn btn-sm btn-light me-1" title="Edit">
                                <i class="material-icons md-edit"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-light text-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this category?')">
                                    <i class="material-icons md-delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <p class="text-muted">No categories found</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} results
        </div>
        <div>
            {{ $categories->links() }}
        </div>
    </div>
</div>