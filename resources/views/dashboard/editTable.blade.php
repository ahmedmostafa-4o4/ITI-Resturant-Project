@extends('dashboard.main')
@section('title','Edit Table')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Tables</h3>
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
                        <h2>Edit Table</h2>
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
                        <form action="{{route('updateTable',[$table->id])}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                            @csrf
                            @method('put')

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$table->name}}">
                                    @error('name')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="email" class="form-control  @error('email') is-invalid @enderror" type="email" name="email" value="{{$table->email}}">
                                    @error('email')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Phone Number <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="email" class="form-control  @error('phoneNumber') is-invalid @enderror" type="text" name="phoneNumber" value="{{$table->phone_number}}">
                                    @error('phoneNumber')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Persons <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control @error('persones') is-invalid @enderror" name="persons" id="">
                                        <option value="{{$table->persons}}">
                                            {{$table->persons}}
                                        </option>
                                        @for ($i = 1 ; $i < 6 ; $i++) @if ($i==$table->persons)
                                            @continue
                                            @endif
                                            <option value="{{$i}}">
                                                {{$i}}
                                            </option>
                                            @endfor
                                            <option value="" disabled>
                                                How many persons?
                                            </option>
                                    </select>
                                    @error('persons')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align " for="Item-date">Table Date <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" id="Item-date" required="required" class="form-control  @error('tableDate') is-invalid @enderror" name="tableDate" lang="en" value="{{$table->date}}">
                                    @error('tableDate')
                                    <div style="color: red;  margin-top: 3px;">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Add</button>
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