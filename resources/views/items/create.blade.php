@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Item</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select
                                id="category_id"
                                name="category_id"
                                class="form-select @error('category_id') is-invalid @enderror"
                                required
                                autofocus
                            >
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ (string) old('category_id') === (string) $category->id ? 'selected' : '' }}>
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                maxlength="255"
                                class="form-control @error('title') is-invalid @enderror"
                                required
                            >
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea
                                id="description"
                                name="description"
                                rows="3"
                                class="form-control @error('description') is-invalid @enderror"
                                required
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input
                                type="number"
                                step="0.01"
                                min="0"
                                id="price"
                                name="price"
                                value="{{ old('price') }}"
                                class="form-control @error('price') is-invalid @enderror"
                                required
                            >
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input
                                type="number"
                                step="1"
                                min="0"
                                id="quantity"
                                name="quantity"
                                value="{{ old('quantity') }}"
                                class="form-control @error('quantity') is-invalid @enderror"
                                required
                            >
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input
                                type="text"
                                id="sku"
                                name="sku"
                                value="{{ old('sku') }}"
                                maxlength="255"
                                class="form-control @error('sku') is-invalid @enderror"
                                required
                            >
                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="picture" class="form-label">Picture</label>
                            <input
                                type="file"
                                id="picture"
                                name="picture"
                                accept="image/*"
                                class="form-control @error('picture') is-invalid @enderror"
                                required
                            >
                            @error('picture')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Save Item</button>
                            <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection