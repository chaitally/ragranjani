@extends('admin.master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container">
        <header class="page-header">
            <h1>Add a new slide</h1>
        </header>
        <div class="row">
            <div class="col-xs-12">

                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label class="col-md-9 control-label">Title</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('slide') ? ' has-error' : '' }}">
                        <label class="col-md-9 control-label">Slide Image</label>
                        <div class="col-md-9">
                            <div><input type="file" class="" name="slide" onchange="readURL(this)" /></div>
                            @if ($errors->has('slide'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('slide') }}</strong>
                                </span>
                            @endif
                            <div><img id="slide-img" src="" title="" alt="" /></div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                        <label class="col-md-9 control-label">Caption</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="caption" value="{{ old('caption') }}">
                            @if ($errors->has('caption'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('caption') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        <label class="col-md-9 control-label">Slide Content</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="content">{{ old('content') }}</textarea>
                            @if ($errors->has('content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Submit" />
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#slide-img')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection