@extends('dashboard.main')
@section('title','Edit Item')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Items</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Item</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="{{route('updateItem',[$items->id])}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align " for="Item-date">Item Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" id="Item-date" required="required" class="form-control  @error('itemDate') is-invalid @enderror" name="itemDate" lang="en" value="{{$items->itemDate}}">
                                    @error('itemDate')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="title" required="required" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$items->title}}">
                                    @error('title')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="license">License <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea id="content" name="license" required="required" class="form-control  @error('license') is-invalid @enderror">{{$items->license}}</textarea>
                                    @error('license')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Price <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="price" required="required" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$items->price}}">
                                    @error('price')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="flat" name="isActive" @if ($items->isActive === "on")
                                        checked
                                        @endif>
                                    </label>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="image" name="image" class="form-control  @error('image') is-invalid @enderror">
                                    @error('image')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Tag <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control @error('category') is-invalid @enderror" name="category" id="">
                                        <option value="{{$items->category}}">{{$items->category}}</option>
                                        @foreach ($categories as $category )
                                        @if ($category->title === $items->category)
                                        @continue
                                        @endif
                                        <option value="{{$category->title}}">{{$category->title}}</option>
                                        @endforeach
                                        <option value="">Select Category</option>
                                    </select>
                                    @error('category')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="{{route('items')}}" class="btn btn-primary">Cancel</a>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
@endsection