@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-envelope"></i> Messages
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Messages</li>
        </ul>
    </div>
    <!-- Page content
        ==========================================-->
    <div class="page-content">
        @if ($message->answer()->exists())
            <div class="row">
                @if ($message->answer->resort_name != null)
                    <div class="col-md-6">
                        <div class="quest-item">
                            <div class="form-group">
                                <label>What is your resort name </label>
                                <input type="text" class="form-control" value="{{ $message->answer->resort_name }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($message->answer->resort_location != null)
                    <div class="col-md-6">
                        <div class="quest-item">
                            <div class="form-group">
                                <label>Where is your beach location</label>
                                <select class="form-control" disabled="disabled">
                                    <option>{{ $message->answer->resort_location }} </option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($message->answer->resort_name == null)
                    <div class="col-md-6">
                        <div class="quest-item">
                            <div class="form-group">
                                <label>How big is your beach land</label>
                                <select class="form-control" disabled="disabled">
                                    <option value="1" @if ($message->answer->beach_land == 1) {{ 'selected' }} @endif>1000 M2
                                    </option>
                                    <option value="2" @if ($message->answer->beach_land == 2) {{ 'selected' }} @endif>2000 M2
                                    </option>
                                    <option value="2.5" @if ($message->answer->beach_land == 2.5) {{ 'selected' }} @endif>3000 M2
                                    </option>
                                    <option value="4" @if ($message->answer->beach_land == 4) {{ 'selected' }} @endif>3000+ M2
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="quest-item">
                            <div class="form-group">
                                <label>How long you need to operate your beach</label>
                                <select class="form-control" disabled="disabled">
                                    <option value="1" @if ($message->answer->beach_long == 1) {{ 'selected' }} @endif>2 months
                                    </option>
                                    <option value="1.5" @if ($message->answer->beach_long == 1.5) {{ 'selected' }} @endif>3
                                        months </option>
                                    <option value="2" @if ($message->answer->beach_long == 2) {{ 'selected' }} @endif>4 months
                                    </option>
                                    <option value="3" @if ($message->answer->beach_long == 3) {{ 'selected' }} @endif>
                                        Long-term project </option>
                                </select>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="quest-item">
                            <div class="form-group">
                                <label>How big is the land dedicated for the theme park</label>
                                <select class="form-control" disabled="disabled">
                                    <option value="1" @if ($message->answer->beach_land == 1) {{ 'selected' }} @endif>2000
                                        MSQ</option>
                                    <option value="3" @if ($message->answer->beach_land == 3) {{ 'selected' }} @endif>5000
                                        MSQ</option>
                                    <option value="4.5" @if ($message->answer->beach_land == 4.5) {{ 'selected' }} @endif>
                                        10000 MSQ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="quest-item">
                            <div class="form-group">
                                <label>When you need this project to be done up and run ?</label>
                                <select class="form-control" disabled="disabled">
                                    <option value="1" @if ($message->answer->beach_long == 1) {{ 'selected' }} @endif>6
                                        month</option>
                                    <option value="0.9" @if ($message->answer->beach_long == 0.9) {{ 'selected' }} @endif>10
                                        months </option>
                                    <option value="0.8" @if ($message->answer->beach_long == 0.8) {{ 'selected' }} @endif>15
                                        months </option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($message->answer->from_date != null)
                    <div class="col-md-6">
                        <div class="quest-item">
                            <div class="form-group">
                                <label>What is the expected date to start the project</label>
                                <input type="text" class="form-control" value="{{ $message->answer->from_date }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($message->answer->visitors != null)
                    <div class="col-md-6">
                        <div class="quest-item">
                            <div class="form-group">
                                <label>How many visitors you expect to come</label>
                                <select class="form-control" disabled="disabled">
                                    <option>{{ $message->answer->visitors }} </option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($message->answer->resort_type != null)
                    <div class="col-md-6">
                        <div class="quest-item">
                            <div class="form-group">
                                <label>What is your project type</label>
                                <input type="text" class="form-control" value="{{ $message->answer->resort_type }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-12 col-lg-12 col-sm-12">
                <hr>
            </div>
        @endif
        <div class="table-responsive-lg-lg" style="position: relative;">
            <div class="load-spinner" style="display: none;">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            <h4 class="alert-text">Total : {{ number_format($projects->sum('price')) }}</h4>
            <div class="spacer-15"></div>
            <table class="table table-bordered" id="datatable" style="width:100%">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->english()->name }}</td>
                            <td>{{ $project->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--End Page content-->
@endsection
