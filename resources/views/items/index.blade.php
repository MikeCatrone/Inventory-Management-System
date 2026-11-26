@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Items</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="text-end">
                        <a href="{{ route('items.create') }}" class="btn btn-info" role="button">
                            + Add New
                        </a>
                    </h1>

                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Picture</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @if ($item->picture)
                                            <img
                                                src="{{ asset($item->picture) }}"
                                                alt="{{ $item->title }}"
                                                style="width: 60px; height: 60px; object-fit: cover;"
                                                class="rounded"
                                            >
                                        @endif
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->category->category ?? 'Uncategorized' }}</td>
                                    <td>{{ $item->sku }}</td>
                                    <td>${{ number_format((float) $item->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        

                                        <div style="float:left; margin-left:5px;">
                                            <a href="{{ route('items.edit', $item) }}" class="btn btn-success btn-sm">Edit</a>
                                        </div>

                                        <div style="float:left; margin-left:5px;">
                                            <form method="post" action="{{ route('items.destroy', $item) }}" onsubmit="return confirm('Delete this item? Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger" />
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">No items found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- .col-md-10 -->
    </div>
</div>
@endsection

@section('styles')
@endsection

@section('scripts')
@endsection