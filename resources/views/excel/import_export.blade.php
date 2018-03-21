@extends('layouts.pis_app')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                UPLOAD PIS LIST
            </h1>
        </div><!-- /.page-header -->
        <div class="space-10"></div>
        <div class="panel panel-primary">
            <div class="panel-heading">PIS export into csv and excel and import into DB</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <a href="{{ route('excel-file',['type'=>'xls']) }}" class="btn btn-app btn-success">
                                <i class="ace-icon fa fa-download bigger-230"></i>
                                <small>Download <br>Excel xls</small>
                            </a>
                            <a href="{{ route('excel-file',['type'=>'xlsx']) }}" class="btn btn-app btn-info">
                                <i class="ace-icon fa fa-download bigger-230"></i>
                                <small>Download <br>Excel xlsx</small>
                            </a>
                            <a href="{{ route('excel-file',['type'=>'csv']) }}" class="btn btn-app btn-danger">
                                <i class="ace-icon fa fa-download bigger-230"></i>
                                <small>Download <br>Excel CSV</small>
                            </a>
                            <!--
                            <a href="{{ asset('sync_dts') }}" class="btn btn-app btn-primary">
                                <i class="ace-icon fa fa-cloud-upload bigger-230"></i>
                                <small>Sync DTS <br>User</small>
                            </a>
                            -->
                            <a href="{{ asset('sync_personalInformation') }}" class="btn btn-app btn-warning">
                                <i class="ace-icon fa fa-cloud-upload bigger-230"></i>
                                <small>Sync PIS <br>User</small>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="row alert-success">
                                <div class="space-10"></div>
                                {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <div class="form-group">
                                        {!! Form::label('personal_information','Personal Information:',['class'=>'col-md-3']) !!}
                                        <div class="col-md-9">
                                            {!! Form::file('personal_information', array('class' => 'form-control')) !!}
                                            @if(session()->has('success'))
                                                <div class="alert-info">
                                                    <i class="fa fa-check"></i> {{ session()->get('success') }}
                                                </div>
                                            @endif
                                            @if(session()->has('error'))
                                                <div class="alert-danger">
                                                    {{ session()->get('error') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    {!! Form::submit('Upload',['class'=>'btn btn-sm btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="space-10"></div>
                            <div class="row alert-success">
                                <div class="space-10"></div>
                                {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <div class="form-group">
                                        {!! Form::label('family_background','Family Background:',['class'=>'col-md-3']) !!}
                                        <div class="col-md-9">
                                            {!! Form::file('family_background', array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    {!! Form::submit('Upload',['class'=>'btn btn-sm btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="space-10"></div>
                            <div class="row alert-success">
                                <div class="space-10"></div>
                                {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <div class="form-group">
                                        {!! Form::label('educational_background','Educational Background:',['class'=>'col-md-3']) !!}
                                        <div class="col-md-9">
                                            {!! Form::file('educational_background', array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    {!! Form::submit('Upload',['class'=>'btn btn-sm btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="space-10"></div>
                            <div class="row alert-success">
                                <div class="space-10"></div>
                                {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <div class="form-group">
                                        {!! Form::label('civil_eligibility','Civil Service Eligibility:',['class'=>'col-md-3']) !!}
                                        <div class="col-md-9">
                                            {!! Form::file('civil_eligibility', array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    {!! Form::submit('Upload',['class'=>'btn btn-sm btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="space-10"></div>
                            <div class="row alert-success">
                                <div class="space-10"></div>
                                {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <div class="form-group">
                                        {!! Form::label('work_experience','Work Experience:',['class'=>'col-md-3']) !!}
                                        <div class="col-md-9">
                                            {!! Form::file('work_experience', array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    {!! Form::submit('Upload',['class'=>'btn btn-sm btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="space-10"></div>
                            <div class="row alert-success">
                                <div class="space-10"></div>
                                {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <div class="form-group">
                                        {!! Form::label('voluntary_work','Voluntary Work:',['class'=>'col-md-3']) !!}
                                        <div class="col-md-9">
                                            {!! Form::file('voluntary_work', array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    {!! Form::submit('Upload',['class'=>'btn btn-sm btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>

                            <div class="space-10"></div>
                            <div class="row alert-success">
                                <div class="space-10"></div>
                                {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <div class="form-group">
                                        {!! Form::label('training_program','Training Program:',['class'=>'col-md-3']) !!}
                                        <div class="col-md-9">
                                            {!! Form::file('training_program', array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    {!! Form::submit('Upload',['class'=>'btn btn-sm btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>


                            <div class="space-10"></div>
                            <div class="row alert-success">
                                <div class="space-10"></div>
                                {!! Form::open(array('route' => 'import-csv-excel','method'=>'POST','files'=>'true')) !!}
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <div class="form-group">
                                        {!! Form::label('other_information','Other Information:',['class'=>'col-md-3']) !!}
                                        <div class="col-md-9">
                                            {!! Form::file('other_information', array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                                    {!! Form::submit('Upload',['class'=>'btn btn-sm btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- PAGE CONTENT ENDS -->

@endsection
@section('js')
    <script>
        @if(session()->has('sync_dts'))
        $.gritter.add({
            title: 'SYNC',
            text: "<i class='fa fa-cloud-upload'></i> <?php echo session()->get('sync_dts'); ?>",
            class_name: 'gritter-info gritter-center',
        });
        @endif
        @if(session()->has('sync_pis'))
        $.gritter.add({
            title: 'SYNC',
            text: "<i class='fa fa-cloud-upload'></i> <?php echo session()->get('sync_pis'); ?>",
            class_name: 'gritter-info gritter-center',
        });
        @endif
    </script>
@endsection