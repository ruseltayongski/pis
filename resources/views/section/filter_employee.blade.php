@extends('layouts.pis_app')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                FILTER SECTION
            </h1>
        </div><!-- /.page-header -->
        <div class="space-10"></div>
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                        <input type="text" class="form-control" value="{{ Session::get('keyword') }}" id="search" name="keyword" placeholder="Search PIS..." autofocus/>
                        <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>
                    </span>
                </label>
            </div>
            <div class="col-xs-12 col-md-6">
                <a href="#document_form" data-link="{{ asset('salaryForm') }}" class="btn btn-info no-border btn-sm" data-dismiss="modal" data-backdrop="static" data-toggle="modal" data-target="#document_form">
                    <i class="fa fa-user-plus"></i>
                    Add Salary Grade
                </a>
            </div>
        </div>
        <div class="space-10"></div>

        <div class="tab-content no-border no-padding">
            <div class="table-responsive">
                <table id="simple-table" class="table table-bordered table-hover">
                    <thead>
                    <tr class="info">
                        <th>Section</th>
                        <th>Employee Name</th>
                        <th>Designation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $section = []; ?>
                    @foreach($filter_employee as $row)
                        <tr>
                            <td width="40%">
                                <b class="green">{{ $row->section }}</b>
                            </td>
                            <td>
                                <b class="orange">{{ $row->name }}</b>
                            </td>
                            <td>
                                <b class="blue">{{ $row->designation }}</b>
                            </td>
                        </tr>
                        <?php
                            $section[$row->section] = true;
                        ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div><!-- PAGE CONTENT ENDS -->


@endsection
@section('js')
    <script>

    </script>
@endsection