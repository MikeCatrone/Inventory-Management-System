
@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Category</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.update', $category) }}">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="category">Category</label>
                                    <input
                                        type="text"
                                        id="category"
                                        class="form-control @error('category') is-invalid @enderror"
                                        name="category"
                                        title="category"
                                        maxlength="50"
                                        value="{{ old('category', $category->category) }}"
                                    />
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('categories.index') }}" class="btn btn-lg btn-danger w-100" style="margin-top:20px">Cancel</a>
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" value="Save Category" class="btn btn-lg btn-success w-100" style="margin-top:20px" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- .col-md-8 -->
        </div>
    </div>
@endsection