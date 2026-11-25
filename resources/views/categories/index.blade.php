

@extends('layouts.public')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <h1 class="text-end">
                        <a href="{{ route('categories.create') }}" class="btn btn-info" role="button">
                            + Add New
                        </a>
                    </h1>
                    
                    <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                    <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category }}</td>

                    <td>
                        {{-- @foreach($company->series as $series)
                            {{ $series->title }}, 
                        @endforeach --}}
                    </td>


                    {{--
                    <td>
                        @foreach($company->series as $series)
                            {{ $series->name }}, 
                        @endforeach
                    </td>
                    --}}


                    <td><div style="float:left;">
                        <a href="{{ route('categories.show', $category) }}"class="btn btn-primary btn-sm">View</a>
                    </div>

                    <div style="float:left; margin-left:5px;">
                        <a href="{{ route('categories.edit', $category) }}"class="btn btn-success btn-sm">Edit</a>
                    </div>

                    <div style="float:left; margin-left:5px;">
                        <form method="post" action="{{ route('categories.destroy', $category) }}"onsubmit="return confirm('Delete Company? Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" name="submit" value="Delete"class="btn btn-sm btn-danger"/>
                        </form>
                    </div>
                    </td>
                    </tr>
                    @empty
                    <tr>
                    <td colspan="3" class="text-center text-muted">No categories found.</td>
                    </tr>
                    @endforelse
                    </tbody>
                    </table>
                
                </div>
            </div>
        </div><!-- .col-md-8 -->
    </div>    
</div>
@endsection


@section('styles')
@endsection

@section('scripts')
@endsection