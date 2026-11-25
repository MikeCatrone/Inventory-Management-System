
@if(session()->has('success')) {{-- $_SESSION['success']   --}}

    <div class="alert alert-success" role="alert">
            <strong>Success: </strong> {{session('success')}}
    </div>

@endif


@if(session()->has('error')) {{-- $_SESSION['error']   --}}

    <div class="alert alert-danger" role="alert">
            <strong>Success: </strong> {{session('error')}}
    </div>

@endif


@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <strong>Errors: </strong>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif