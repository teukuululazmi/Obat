{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.master')
@section('page_header')
    <!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Dashboard</span>
						</div>
					</div>
				</div>
			</div>
	<!-- /page header -->
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-teal-400">
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="font-weight-semibold mb-0">3,450</h3>                        
                    </div>

                    <div>
                        Obat
                    </div>
                </div>
	        </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-blue-400">
				<div class="card-body">
					<div class="d-flex">
    					<h3 class="font-weight-semibold mb-0">$18,390</h3>
					</div>

					<div>
						Users
					</div>
				</div>
			</div>
        </div>
    </div>
    
</div>
@endsection
