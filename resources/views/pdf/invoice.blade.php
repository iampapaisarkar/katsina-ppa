
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>INVOICE {{$invoice->order_id}}</title>
    <link rel="stylesheet" href="style.css" media="all" />

    <style>
        .clearfix:after {
        content: "";
        display: table;
        clear: both;
        }

        a {
        color: #5D6975;
        text-decoration: underline;
        }

        body {
        position: relative;
        margin: 0 auto; 
        color: #001028;
        background: #FFFFFF; 
        font-family: Arial, sans-serif; 
        font-size: 12px; 
        font-family: Arial;
        }

        header {
        padding: 10px 0;
        margin-bottom: 30px;
        }

        #logo {
        text-align: center;
        margin-bottom: 10px;
        }

        #logo img {
        width: 90px;
        }

        h1 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 2.4em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
        }

        #project {
        float: left;
        }

        #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
        }

        #company {
        float: right;
        text-align: right;
        }

        #project div,
        #company div {
        white-space: nowrap;        
        }

        table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
        background: #F5F5F5;
        }

        table th,
        table td {
        text-align: center;
        }

        table th {
        padding: 5px 20px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;        
        font-weight: normal;
        }

        table .service,
        table .desc {
        text-align: left;
        }

        table td {
        padding: 20px;
        text-align: right;
        }

        table td.service,
        table td.desc {
        vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
        font-size: 1.2em;
        }

        table td.grand {
        border-top: 1px solid #5D6975;;
        }

        #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
        }

        footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
        }
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{$logo}}">
      </div>
      <h1>#{{$invoice->order_id}}</h1>
      <div id="company" class="clearfix">
        <div style="font-size: 20px;">{{$invoice->created_at->format('d M Y')}}</div>
        <div style="font-size: 14px;"><strong>Invoice To:</strong></div>
        <div style="font-size: 20px;">{{$invoice->user->first_name}} {{$invoice->user->sur_name}}</div>
        <div style="font-size: 20px;">{{$invoice->vendor_registration->company_details->company_name}}</div>
        <div style="font-size: 20px;">{{$invoice->user->phone_number}}</div>
        <div style="font-size: 20px;">{{$invoice->user->email}}</div>
      </div>
      <div id="project">
        <div style="font-size: 20px;"><strong>Katsina State Government</strong></div>
        <div style="font-size: 20px;">Bureau of Public Procurement</div>
        <div style="font-size: 20px;">Government House</div>
        <div style="font-size: 20px;">I.B.B Way, Dandagoro</div>
        <div style="font-size: 20px;">Katsina State, Nigeria</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="desc"><div style="font-size: 20px;">DESCRIPTION</div></th>
            <th><div style="font-size: 20px;">TOTAL</div></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="desc">
                <div style="font-size: 17px;">
                @if($invoice->service_type == 'vendor_registration')
                    <p class="card-text fw-bold mb-25">Vendor Registration Fee</p>
                    <p class="card-text text-nowrap">
                        {{number_format($invoice->service->registration_fee)}}
                    </p>
                    <p class="card-text text-nowrap">
                        {{$invoice->extra_service->title}}
                    </p>
                @endif
                </div>
            </td>
            <td class="unit"><div style="font-size: 17px;">N{{number_format($invoice->amount)}}</div></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td class="desc" style="text-align: right;"> 
                <div style="font-size: 20px;">
                <strong>TOTAL</strong>
                </div>
            </td>
            <td class="unit"><div style="font-size: 20px;"><strong>N{{number_format($invoice->amount)}}</strong></div></td>
          </tr>
        </tfoot>
      </table>
    </main>
    <footer style="background-color: #fff;">
    <div style="font-size: 20px;">Note: When you make payment at the bank, please indicate the invoice number on the teller.</div>
    </footer>
  </body>
</html>