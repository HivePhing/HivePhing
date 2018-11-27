@extends('layout.master')
@section('title','Projects')
@section('content')
    <style>
        .navbar {
            overflow: hidden;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: darkgrey;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        /*Link*/
        .button {
            display: inline-block;
            border-radius: 4px;
            background-color: darkslategray;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 20px;
            padding: 10px;
            width: 100px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }
        /*heading*/
        h1{
            color: darkslategray;
        }
    </style>
    <?php
    $data = DB::connection('mysql_service')
        ->table('for_repair')
        ->orderBy('id','desc')
        ->get();
    ?>

    @if(sizeof($data)==0)
        <h4 class="alert alert-info">There is no data currently</h4>
    @else
        <h1>
            Total Number of projects : {{count($data)}}
            <a href="{{ url('/dashboard') }}" class="button" style="vertical-align:middle"><span>Back </span></a>
        </h1>
        <div class="navbar">
            <a href="{{url('show_all_projects')}}">Show All Projects</a>
            <div class="dropdown">
                <button class="dropbtn">By Months
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="{{url('projects/months/01')}}">January</a>
                    <a href="{{url('projects/months/02')}}">February</a>
                    <a href="{{url('projects/months/03')}}">March</a>
                    <a href="{{url('projects/months/04')}}">April</a>
                    <a href="{{url('projects/months/05')}}">May</a>
                    <a href="{{url('projects/months/06')}}">June</a>
                    <a href="{{url('projects/months/07')}}">July</a>
                    <a href="{{url('projects/months/08')}}">August</a>
                    <a href="{{url('projects/months/09')}}">September</a>
                    <a href="{{url('projects/months/10')}}">October</a>
                    <a href="{{url('projects/months/11')}}">November</a>
                    <a href="{{url('projects/months/12')}}">December</a>
                </div>
            </div>

        </div>
        <table>
            <tr>
                <td>No.</td>
                <td>{{ $detail->id }}</td>
            </tr>
            <tr>
                <td>User ID</td>
                <td>{{ $detail->user_id }}</td>
            </tr>
            <tr>
                <td>Name.</td>
                <td>{{ $detail->name }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $detail->phone }}</td>
            </tr>
            <tr>
                <td>fr_type</td>
                <td>{{ $detail->fr_type }}</td>
            </tr>
            <tr>
                <td>Project define point</td>
                <td>{{ $detail->project_define_point }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{ $detail->address }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $detail->description }}</td>
            </tr>
            <tr>
                <td>Old Description</td>
                <td>{{ $detail->old_description }}</td>
            </tr>
            <tr>
                <td>Old Address</td>
                <td>{{ $detail->old_address }}</td>
            </tr>
            <tr>
                <td>Confirm</td>
                <td>{{ $detail->confirm }}</td>
            </tr>
            <tr>
                <td>Quotation</td>
                <td>{{ $detail->quotation }}</td>
            </tr>
            <tr>
                <td>Quotation Type</td>
                <td>{{ $detail->quotation_type }}</td>
            </tr>
            <tr>
                <td>State</td>
                <td>{{ $detail->state }}</td>
            </tr>
            <tr>
                <td>City</td>
                <td>{{ $detail->city }}</td>
            </tr>
            <tr>
                <td>Full</td>
                <td>{{ $detail->full }}</td>
            </tr>
            <td>Close</td>
                <td>{{ $detail->close }}</td>
            </tr>
            <tr>
                <td>Quotation file</td>
                <td>{{ $detail->quotation_file }}</td>
            </tr>
            <tr>
                <td>Created at</td>
                <td>{{ $detail->created_at }}</td>
            </tr>
            <tr>
                <td>Updated at</td>
                <td>{{ $detail->updated_at }}</td>
            </tr>



        </table>


    @endif

@endsection

