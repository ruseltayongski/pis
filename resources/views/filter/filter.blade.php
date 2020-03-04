@extends('layouts.pis_app')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">

            <div class="page-content">

                <div class="page-header">
                    <h1>
                        Filter
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>
                            <span class="label label-primary arrowed-in arrowed-in-right">{{ $title1 }} {{ $title2 }}</span>
                        </small>
                    </h1>
                </div><!-- /.page-header -->
                <div class="row">
                    <div class="col-xs-12">

                        <table class="table table-bordered table-striped">
                            <thead class="thin-border-bottom">
                            <tr>
                                <th>
                                    Employee ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Designation
                                </th>
                                <th>
                                    Section/Division
                                </th>
                                <th>
                                    Sex
                                </th>
                                <th>
                                    Job Status
                                </th>
                                <th>
                                    Employee Status
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($user as $row)
                            <tr>
                                <td>{{ $row->userid }}</td>
                                <td><b onclick="window.open('{{ asset('pisProfile').'/'.$row->userid }}','new_window');" class="blue" style="cursor: pointer;">{{ $row->name }}</b></td>
                                <td>{{ $row->designation }}</td>
                                <td>
                                    <b class="green">{{ $row->division }}</b><br>
                                    <small class="orange">({{ $row->section }})</small>
                                </td>
                                <td>{{ $row->sex }}</td>
                                <td>{{ $row->job_status }}</td>
                                <td>
                                    <?php
                                        $color = [
                                            '',
                                            'primary',
                                            'warning',
                                            'success',
                                            'danger',
                                            ''
                                        ];
                                    ?>
                                    <span class="label label-{{ $color[$row->employee_status_id] }} arrowed-in arrowed-in-right">{{ $row->employee_status_value }}</span>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        {{ $user->links() }}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

@endsection
@section('js')
    <script></script>
@endsection