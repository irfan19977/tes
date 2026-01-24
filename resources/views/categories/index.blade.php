@extends('layouts.app')

@section('content')
    <section class="content-main">
        <div class="content-header">
          <div>
            <h2 class="content-title card-title">Categories</h2>
            <p>Add, edit or delete a category</p>
          </div>
          <div>
            <input class="form-control bg-white" type="text" placeholder="Search Categories">
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                @if(request()->has('edit'))
                  <form method="POST" action="{{ route('categories.update', request('edit')) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="category_id" value="{{ request('edit') }}">
                  @else
                  <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                  @endif
                  <div class="mb-4">
                    <label class="form-label" for="category_name">Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" 
                           id="category_name" type="text" 
                           placeholder="Type here" 
                           name="name" 
                           value="{{ old('name', $category->name ?? '') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="category_slug">Slug</label>
                    <input class="form-control @error('slug') is-invalid @enderror" 
                           id="category_slug" type="text" 
                           placeholder="Type here" 
                           name="slug" 
                           value="{{ old('slug', $category->slug ?? '') }}">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Parent</label>
                    <select class="form-select @error('parent_id') is-invalid @enderror" name="parent_id">
                      <option value="">No Parent</option>
                      @foreach ($categories as $parent)
                        @if (!request()->has('edit') || $parent->id != request('edit'))
                          <option value="{{ $parent->id }}" 
                                  {{ old('parent_id', $category->parent_id ?? '') == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                          </option>
                        @endif
                      @endforeach
                    </select>
                    @error('parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              placeholder="Type here" 
                              name="description">{{ old('description', $category->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="d-grid">
                    <button class="btn btn-primary" type="submit">
                      {{ request()->has('edit') ? 'Update category' : 'Create category' }}
                    </button>
                    @if(request()->has('edit'))
                      <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-2">Cancel</a>
                    @endif
                  </div>
                </form>
              </div>
              <div class="col-md-9">
                <div class="table-responsive">
                  <livewire:category-table />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
