@extends('admin.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <header class="page-header">
            <h1>{{ $banner->title }}</h1>
        </header>
        <div class="row">
        	<div class="col-xs-9">
        		<img src="{{ $banner->slide_img_path }}" alt="{{ $banner->title }}" title="{{ $banner->title }}" />
        	</div>
        </div>

		<div class="row form-group">
        	<div class="col-xs-9">
        		<div><strong>Caption</strong></div>
        		{{ $banner->caption }}
        	</div>
        </div>

        <div class="row form-group">
        	<div class="col-xs-9">
        		<div><strong>Content</strong></div>
        		{!! $banner->content !!}
        	</div>
        </div>
    </div>
</div>

@endsection