<!doctype html>
<html>

<head>
    <title>Your request</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .quot-wrap {
            max-width: 767px;
            width: 100%;
            margin: 25px auto;
            padding: 15px 25px;
            border: 4px dashed #E0E0E0;
        }

        .quot-wrap .quot-head {
            overflow: hidden;
            margin-bottom: 15px;
        }

        .quot-wrap .quot-head .title {
            display: block;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 19px;
            text-align: center;
            margin: 15px auto;
        }

        .quot-wrap .quot-head .item-info {
            line-height: 30px;
            font-size: 14px;
            color: #000;
            letter-spacing: 1px;
            background-color: #f9f9f9;
            padding: 0 15px;
            margin: 5px auto;
        }

        .quot-wrap .quot-head .item-info span {
            display: inline-block;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 13px;
            text-align: center;
            margin: 5px auto;
            vertical-align: middle;
            color: #e31519;
            margin-right: 10px;
        }

        .quot-wrap .quot-footer {
            padding: 0 15px;
        }

        .quot-wrap .quot-footer .head-title {
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 5px auto;
        }

        .quot-wrap .quot-footer .dot-lists li {
            font-size: 13px;
        }

        .quot-wrap .quot-cont {
            padding: 0 15px;
        }

        .table {
            border-color: #f8f8f8;
        }

        .table thead {
            background-color: #2e425c;
            text-transform: uppercase;
            color: #ffffff;
            border: 0;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        .quot-wrap .quot-footer .dot-lists li {
            font-size: 15px;
        }

        .quot-wrap .quot-cont {
            width: 100%;
            margin: auto;
            padding: 0;
        }

        .table {
            border-color: #f8f8f8;
        }

        .add_ads_form thead {
            background-color: #2e425c;
            text-transform: uppercase;
            color: #ffffff;
        }

        .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>tfoot>tr>td,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            text-align: left;
            padding: 0;
            line-height: 22px;
            padding: 10px 15px;
            font-size: 14px;
            border-color: #f8f8f8;
            font-weight: bold;
            border: 1px solid #ddd;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .table>thead>tr>th {
            letter-spacing: 1px;
            text-transform: uppercase;
            border: 1px solid #f8f8f8;
            font-weight: 600;
            font-size: 12px;
            color: #3498db;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        .dot-lists li {
            position: relative;
            padding-left: 20px;
            font-weight: 400;
            font-size: 14px;
            line-height: 25px;
            color: #3f3f3f;
            margin: 10px auto;
        }

        .dot-lists li:before {
            content: " ";
            position: absolute;
            width: 10px;
            height: 10px;
            border: 2px solid #e31519;
            left: 0;
            top: 0;
            bottom: 0;
            margin: auto;
        }

    </style>
</head>

<body>
    <div class="quot-wrap">
        <div class="quot-head">
            <div class="title">Quotation</div>
            <div class="col-md-6">
                <div class="item-info">
                    <span> Quotation Number :</span>{{ $request->id }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="item-info">
                    <span> Client Name :</span>
                    <div style="display: inline-block;" id="ClientName">{{ $request->name }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="item-info">
                    <span> Client Phone :</span>
                    <div style="display: inline-block;" id="ClientPhone">{{ $request->phone }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="item-info">
                    <span> Client Email :</span>
                    <div style="display: inline-block;" id="ClientEmail">{{ $request->email }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="item-info">
                    <span> Client Address :</span>
                    <div style="display: inline-block;" id="ClientAddress">{{ $request->address }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="item-info">
                    <span> Start date :</span>
                    <div style="display: inline-block;" id="startDate">{{ $request->from_date }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="item-info">
                    <span> End date :</span>
                    <div style="display: inline-block;" id="EndDate">{{ $request->to_date }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="item-info">
                    <span> Service Type :</span>
                    <div style="display: inline-block;" id="JobName">{{ $request->job }}</div>
                </div>
            </div>
        </div>
        <div class="quot-cont">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Items</td>
                            <td>Sub - Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->english()->name }}</td>
                                <td>{{ number_format($project->price) }} L.E</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>total</td>
                            <td>{{ number_format($total) }} L.E</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="quot-footer">
            <div class="head-title">
                Terms &amp; Conditions
            </div>
            <ul class="dot-lists">
                @foreach (explode("\n", $settings->terms_en) as $term)
                    <li>
                        {{ $term }}
                    </li>
                @endforeach

            </ul>
            <div class="head-title"> Payment Terms</div>
            <ul class="dot-lists">
                @foreach (explode("\n", $settings->payment_en) as $payment)
                    <li>
                        {{ $payment }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
