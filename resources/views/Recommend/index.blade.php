@extends('layout.r-layout')
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * {
        box-sizing: border-box;
    }
    h1{
        color: #137582;
    }
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* Float four columns side by side */
    .column {
        float: left;
        width: 25%;
        padding: 0 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .row {margin: 0 -5px;}

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
        }
    }

    /* Style the counter cards */
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
        padding: 16px;
        text-align: center;
        background-color: #f1f1f1;
        margin-bottom: 10%;
    }
    /*Link*/
    .button {
        display: inline-block;
        border-radius: 4px;
        background-color: #00bcd4;
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
</style>
        <div class="col-sm-2"></div>

        <div class="col-sm-8" style="text-align:center;">
            <div class="display: inline-block; margin-top:10%;">
                <h1>What do you want?</h1></div>
                <div class="card">
                        <a href="#" class="button" style="vertical-align:middle"><span>City</span></a>
                        <a href="#" class="button" style="vertical-align:middle"><span>Service</span></a>
                    </div>
        </div>
        <div class="col-sm-2"></div>        

@endsection
