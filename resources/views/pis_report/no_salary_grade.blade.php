<html>
<title>
    Number of days tardiness in the month of july
</title>
<head>
    <title>Section Logs</title>
    <link rel="stylesheet" href="{{ asset('public/assets_ace/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/assets_ace/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
    <style>
        table tr th {
            font-size: 1.1em;
        }
    </style>
</head>
<body>
<table class="table table-bordered table-hover">
    <tr class="info">
        <th></th>
        <th>ID Number</th>
        <th>Name</th>
        <th>Position</th>
        <th>Division</th>
        <th>Section</th>
        <th>Status</th>
    </tr>
    @foreach( $employee as $row )
    <?php
        $flag = true;
        $work_experience = \PIS\Work_Experience::where("userid","=",$row->userid)->get();
        if($work_experience){
            foreach ( $work_experience as $work ){
                if( $work->date_to == "Present" ){
                    $flag = false;
                }
            }
        }
    ?>
    @if($flag && $row->userid != 'admin')
    <tr>
        <td></td>
        <td>{{ $row->userid }}</td>
        <td>{{ $row->fname.' '.$row->mname.' '.$row->lname }}</td>
        <td>
            <?php
                if( $position = \PIS\Designation::find($row->designation_id) ) {
                    echo $position->description;
                } else {
                    echo "No Position";
                }
            ?>
        </td>
        <td>
            <?php
                if( $division = \PIS\Division::find($row->division_id) ) {
                    echo $division->description;
                } else {
                    echo "No Division";
                }
            ?>
        </td>
        <td>
            <?php
                if( $section = \PIS\Section::find($row->division_id) ) {
                    echo $section->description;
                } else {
                    echo "No Section";
                }
            ?>
        </td>
        <td>No Monthly Salary</td>
    </tr>
    @endif
    @endforeach
</table>
</body>
</html>