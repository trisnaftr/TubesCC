@extends('masters', ['title' => 'Home'])

@section('content')
<div class="row">
    <div class="col text-center mt-5">
        <section>
            <div class="d-grid gap-3 justify-content-center">
                <div class="text-center">
                    <img class="img-thumbnail w-75" 
                         src="{{ Vite::asset('resources/images/Laundry.png') }}" 
                         alt="Laundry" />
                </div>
                <div class="text-center">
                    <a class="btn btn-primary btn-lg" 
                       href="{{ route('purchased.index') }}" 
                       role="button">
                        ORDER
                    </a>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
