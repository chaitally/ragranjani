@extends('admin.master')
@section('content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Slides
	        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary">Add New</a> 
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Banners</li>
	      </ol>
	    </section>

	    <!-- Main content -->
	    <section class="content">
	    	@foreach ($banners as $row)
	    	<div class="row">
	    		<div class="col-xs-12">
	    			<div class="item">
		    			<div class="item-title">{{ $row->title }}</div>
		    			<div class="item-links"><a href="{{ url('admin/banner/'.$row->slug."/edit") }}">Edit</a> | <a href="{{ url('admin/banner/'.$row->slug) }}">View</a> | Delete</div>
	    			</div>
	    		</div>
	    	</div>
	    	@endforeach
	    </section>
	</div>
@endsection