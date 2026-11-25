@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-5 shadow-sm bg-light">
                <div class="card-body text-center">
                    <h1 class="display-4 fw-bold mb-3">Laravel Project</h1>
                    <h2>Michael Catrone</h2>
                    <h2 style="margin-bottom: 30px;">INET2005</h2>
                    <p class="lead mb-4">Let the project begin!</p>
                    <hr class="my-4">
                    <div class="d-flex justify-content-center gap-3">
                        <a class="btn btn-primary btn-lg px-4" href="{{ route('categories.index') }}">Categories Page</a>
                        <a class="btn btn-outline-secondary btn-lg px-4" href="{{ route('items.index') }}">Items Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
