

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <p>Hello {{$data->reserveForm->name}},</p>
        <p>Your car reservation has been confirmed for {{Carbon\Carbon::parse($data->bookingReserveStartDate)->toFormattedDateString()}} to {{Carbon\Carbon::parse($data->bookingReserveEndDate)->toDayDateTimeString()}}</p>
        <p>The reservation code for your booking is {{$booking_id}}</p>
        <p>If you have chosen Free VIP Pickup, we may contact you a day or two before your arrival to confirm.</p>
        <p>Thank You,</p>
        <p>
            Epic Car Rental<br>
            <strong>24/7 Phone &amp; WhatsApp: +1 (876) 424-8913</strong>
        </p>
        <table style="border-collapse:collapse;border-spacing:0;width:100%;border:solid 1px #aaa">
            <tbody>
                <tr>
                    <td style="padding:1.2em">
                        <div style="background:#fff;margin-bottom:1em;font:11pt 'Helvetica Neue',Helvetica,Arial,sans-serif">

                            <div style="clear:both">
                                <table style="border-collapse:collapse;border-spacing:0;width:100%;font-size:12pt">
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align:top;text-align:left;padding:0;border:0">
                                                <h1 style="font-size:14pt;color:#333;font-weight:bold;margin:0 0 5px 0">
                                                    Your Booking Invoice
                                                </h1>
                                                <span style="display:inline-block;padding:.5em 1em .5em 1em;margin-top:1em;min-width:8em;border-radius:5px;color:#fff;font-size:13pt;font-weight:bold;text-align:center;text-transform:uppercase;background-color:#1a8aca">Reserved</span>
                                            </td>
                                            <td style="vertical-align:top;border:0;text-align:right;padding:0.5em">
                                                
                                                <h2 style="font-size:12pt;padding:0;margin:0;color:#333">Epic Car Rental</h2>
                                                <address style="font-size:9pt;color:#777">Sunset Blvd<br>
                                                    Montego Bay, Jamaica</address>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:top;text-align:left;padding:0;border:0;padding-top:1em;font-size:10pt">
                                                <div>
                                                    <strong>{{$data->reserveForm->name}}</strong><br>{{$data->reserveForm->country}}<br><i></i> <a href="mailto:{{$data->reserveForm->email}}" target="_blank">{{$data->reserveForm->email}}</a><br>{{$data->reserveForm->phone}}
                                                </div>
                                            </td>
                                            <td style="vertical-align:top;padding:0;border:0;text-align:right;padding-top:1em">

                                                <table style="border-collapse:collapse;border-spacing:0;max-width:300px;float:right;border:solid 1px #aaa;font-size:9pt;text-align:right;background:#fff">

                                                    <tbody>
                                                        <tr>
                                                            <th style="vertical-align:top;text-align:left;border:0;background:#e1e1e1;padding:5px"> Booking ID:</th>
                                                            <td style="vertical-align:top;border:0;text-align:right;padding:5px"><strong>{{$booking_id}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:top;text-align:left;border:0;background:#e1e1e1;padding:5px"> Created:</th>
                                                            <td style="vertical-align:top;border:0;text-align:right;padding:5px;white-space:nowrap">{{Carbon\Carbon::parse($booking->created_at)->toDayDateTimeString()}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:top;text-align:left;border:0;background:#e1e1e1;padding:5px;white-space:nowrap"> Booking Date:</th>
                                                            <td style="vertical-align:top;border:0;text-align:right;padding:5px;white-space:nowrap">{{Carbon\Carbon::parse($data->bookingReserveStartDate)->toDayDateTimeString()}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="vertical-align:top;text-align:left;border:0;background:#e1e1e1;padding:5px"> Total&nbsp;(USD):</th>
                                                            <td style="vertical-align:top;border:0;text-align:right;padding:5px;white-space:nowrap">{{$data->booking_total}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table style="border-collapse:collapse;border-spacing:0;background:white;border:solid 1px #aaa;text-align:left;width:100%;margin:0;font-size:9pt">
                                    <thead>
                                        <tr style="page-break-inside:avoid;background:#e1e1e1">
                                            <th style="vertical-align:top;padding:5px;text-align:left;border-bottom:solid 1px #aaa">Item</th>
                                            <th colspan="2" style="vertical-align:top;padding:5px;text-align:left;border-bottom:solid 1px #aaa">Rate</th>
                                            <th style="vertical-align:top;padding:5px;border-bottom:solid 1px #aaa;text-align:right;width:1%">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr style="page-break-inside:avoid">
                                            <td style="vertical-align:top;text-align:left;padding:5px">

                                                <strong>{{$data->selectedVehicleData->name}}</strong><br>
                                                {{Carbon\Carbon::parse($data->bookingReserveStartDate)->toDayDateTimeString()}} - {{Carbon\Carbon::parse($data->bookingReserveEndDate)->toDayDateTimeString()}}
                                                <br><i></i>
                                            </td>
                                            <td style="vertical-align:top;padding:5px;text-align:left" colspan="2">{{$data->booking_days}} Day @ ${{$data->selectedVehicleData->cost}}</td>
                                            <td style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap">
                                                <div>${{intval($data->selectedVehicleData->cost) * intval($data->booking_days)}}</div>

                                            </td>
                                        </tr>
                                        <tr style="page-break-inside:avoid;border-top:solid 1px #000">
                                            <td rowspan="6" colspan="2" style="vertical-align:top;padding:5px;text-align:left;border-right:solid 1px #000;color:#444"></td>
                                            <td colspan="2" style="vertical-align:top;text-align:left;display:table-cell;height:100%;padding:0"></td>
                                        </tr>


                                        <tr style="page-break-inside:avoid;border-top:solid 1px #111">
                                            <th style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap">Sub-Total: </th>
                                            <td style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap">${{$data->booking_subTotal}}</td>
                                        </tr>
                                        <tr style="page-break-inside:avoid">
                                            <td style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap">General Consumption Tax (GCT) (15%):</td>
                                            <td style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap">${{$data->booking_after_tax}}</td>
                                        </tr>



                                        <tr style="page-break-inside:avoid;border-top:solid 1px #111">
                                            <th style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap">Total: </th>
                                            <td style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap">${{$data->booking_total}}</td>
                                        </tr>

                                        <tr style="page-break-inside:avoid">
                                            <th style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap">Amount Paid: </th>
                                            <td style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap">$0.00</td>
                                        </tr>




                                        <tr id="m_-7651102549841573883m_5105865311798917023CF_due" style="page-break-inside:avoid;border-top:double 3px #111;background:#fff6ad">
                                            <th style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap">Balance Due: </th>
                                            <td style="vertical-align:top;padding:5px;text-align:right;white-space:nowrap"><strong>${{$data->booking_total}}</strong></td>
                                        </tr>


                                        <tr style="page-break-inside:avoid">
                                            <td colspan="4" style="vertical-align:top;border-top:solid 1px #aaa;background-color:#e1e1e1;text-align:right;padding:5px 0 5px 5px">
                                                <div style="font-weight:bold;padding:5px 0;color:#999;font-size:8pt;text-align:right">
                                                    <a href="https://carrental.checkfront.com/reserve/booking/PRDL-260422?token=5cbbba8e04960e4c700cd047b40810286515b3fa7229129f5869a828e9d1a0ac&amp;view=pdf" style="background-color:#fff;color:#777;font-weight:bold;text-decoration:none;padding:3px 10px;border:solid 1px #ccc;margin-right:5px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://carrental.checkfront.com/reserve/booking/PRDL-260422?token%3D5cbbba8e04960e4c700cd047b40810286515b3fa7229129f5869a828e9d1a0ac%26view%3Dpdf&amp;source=gmail&amp;ust=1652560385662000&amp;usg=AOvVaw3NRcFSssScngfQRdZ5CNuR">PDF (Print)</a> </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>



                                <div style="margin-top:1em">
                                    <strong style="float:left;padding-right:1em;font-size:1.3em;margin-top:0.25em;white-space:nowrap">
                                        <i></i> Booking Documents
                                    </strong>

                                    <a href="https://carrental.checkfront.com/reserve/documents/?id=PRDL-260422&amp;CFX=5cbbba8e04960e4c700cd047b40810286515b3fa7229129f5869a828e9d1a0ac&amp;" style="float:right;display:inline-block;padding:6px 12px;margin-bottom:0;font-size:14px;font-weight:normal;line-height:1.42857143;text-align:center;white-space:nowrap;vertical-align:middle;background-image:none;border:1px solid transparent;border-radius:4px;background:#487fe8;border-color:#4b86f4;color:white" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://carrental.checkfront.com/reserve/documents/?id%3DPRDL-260422%26CFX%3D5cbbba8e04960e4c700cd047b40810286515b3fa7229129f5869a828e9d1a0ac%26&amp;source=gmail&amp;ust=1652560385662000&amp;usg=AOvVaw32gXNzLkan7lm_LSZ59UCc">
                                        View Required Documents
                                    </a>

                                    <div style="float:left;margin-top:0.5em">

                                    </div>
                                    <div style="clear:both"></div>
                                </div>
                                {{-- <img src="https://ci6.googleusercontent.com/proxy/N0l1OtYlDcTI9pj0eWNv6OXsj4WCaiDFaDNHVdU79s8IwcFcp1416J4sK_9cKLFy_oDjRgJo1mDMiUyGle8UyabPHfxF0bNOEdvHWsY=s0-d-e1-ft#https://carrental.checkfront.com/images/qr/?id=PRDL-260422" alt="Bar Code" width="84" height="84" style="margin-top:5px;background:#fff;padding:10px 0 10px 15px;float:right" class="CToWUd"> --}}
                                <div id="m_-7651102549841573883m_5105865311798917023checkfront-policy" style="padding:1.25em 0 0 0;color:#555;margin:2em 0 0 0;font-size:9pt;border-top:solid 1px #eee">
                                    <h4>
                                        Terms and Conditions</h4>
                                    <p>
                                        Vehicles are rented to persons<strong> 25 - 75 years </strong>old who have held a valid Driver's License for <strong>at least 2 years</strong>. This limitation also applies to additional drivers.
                                    </p>
                                    <p>No insurance is required when payment is made using <strong></strong>a credit card that “covers” rentals <strong> in Jamaica.</strong> The credit card <strong>must match</strong> the license of the main driver.
                                        <br></p>
                                    <p>The driver is required to sign a <strong>Loss/Damage Waiver</strong> form before collecting the key(s).<br></p>
                                </div>
                            </div>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <img src="https://ci3.googleusercontent.com/proxy/2mb0KhO_eRvgF-3C0w1vdxIjPite_GaB-q_P8xMZjNBs7btSxJFYJY3ecvXLnI3PR9b6gXmS6Pyr96tIiTi7R91gl3w7xnep6iuuUuv45Ut7-sM617cdxFUcjCVZ24w2qLu_LCcoXwEi-vNe61e3_zrygjgRU_5lqKZ6nDsqJZQ5um_QXkIhsEXlU-uLjG78VY0pthpFb7yyeXvGo_WLlLyPoskaCMXV6xPlvf2eUtWpB0j2j0O38mY0e_ETmnQ8U12D3VW6P_29QvVcoBeVGRucbsKWVQCbQ9908lYxPFA_VEYL13T1YgZ6IXzP-aYqbWZ8zS6cr_cDMdHf9gISSy5ZUxOYgNtfQ7GLbxCCb4N4OJrYjwD2EcRV32QcubYkMyoRqqgjYaTblTbuomHToxS4UTN3Qi1tUW8C6kHiS9LKHofyymKAHBFeLEO3RZi60_8B7Qc8XombSTH6RXUeoaLZPkd1ETa35UW7EWKQb9nv62fflBGUpek7CT4opfdQyiGGUN2mhdYKHVDmaYoKRTSJ57Q8wCXUdYHSdfkyS3tBKkqNHQmELKDAUvl_H4adChgHRAvmfDjsyH_6-hVNIeRiICMCZUQ98hyGs9gwOKdQGA-JRb4gE3EUwEa421ZzwstiZainvBw5ZSkACoDTKmXKBw5iNJasleeJEQcdp1KYwXnb035L=s0-d-e1-ft#https://ea.pstmrk.it/open/v3_jH08atwu1V2V6xA7LMgMNJbHuz0oVNOR8vVG2isgbWsv98e42vAink7aqUr2jVjfAsS1J57u48lMDibsCyHpQ6iWrjl8EuxToi7hTbbC-Okrfr0BQM3Fxn68x7kwRj_ks8eiCEj397x1-cvGuGCRQQqIDWLMW0Etb9i7iEzNPWpRBfUFek3_Txa3JiQwAXSwZpy7TuFs-Y-C-NAcp5lg3_eIwTf7lCnguvlnqAwDGUu3wfu0Pjei3org7v5BGPS-KuTe2mef8D3pFG3-QAD22caNoInONBdzMiVlrcvFae9zgVJtDA7GCqyhscshldGFWXbC8469fFd468VpdoOzXi6BkGRQafpSWQhxWxfxbmrXzNgq6Eiu6kOqcAyhEdnyAyZnkQpzv4Bu828o5sPhpxOEpSh_mgQL6QZ58ZBcdTa_wOjun4CKQRluaoyjWPNQQrbXeE8ACRws5Q2XLqzZag" width="1" height="1" border="0" alt="" class="CToWUd" jslog="138226; u014N:xr6bB; 53:W2ZhbHNlXQ.."><div class="yj6qo"></div><div class="adL">
    </div></div>
</body>
</html>