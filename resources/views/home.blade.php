@extends('layouts.app')

@section('content')
<div class="section-header">
    <h1>Dashboard</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="hero bg-white text-dark text-center">
                <div class="hero-inner">
                    <h2 class="mb-3">Selamat Datang, {{ Auth::user()->name }}!</h2>
                    <p>
                        Logo Here
                    </p>
                    <h2 class="mt-3">P.T Saputra Tirtha Amertha</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection