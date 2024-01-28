<style>
    table.greyGridTable {
        border: 2px solid #333333;
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }
    table.greyGridTable td, table.greyGridTable th {
        border: 1px solid #333333;
        padding: 3px 4px;
    }
    table.greyGridTable tbody td {
        font-size: 13px;
    }
    table.greyGridTable td:nth-child(even) {
        background: #EBEBEB;
    }

    .card-header {
        text-align: center;
    }
    .card-header h3,
    .card-header p,
    .card-header h4 {
        margin: 0.5rem;
    }
</style>

<div class="card-header" style="margin-bottom: 10px">
    <h3>{{$obj['category']['name']}}</h3>
    <p>{{date('F d, Y', strtotime($obj['created_at']))}}</p>
    <h4>{{$obj['customer']['first_name'].' '.$obj['customer']['last_name']}}</h4>
    <a href="{{'mailto:'.$obj['customer']['email']}}">{{$obj['customer']['email']}}</a>
</div>


<table class="greyGridTable">
    <tbody>
    @if(isset($obj['pv_system_size']))
        <tr><td>PV System Size</td><td>{{$obj['pv_system_size']}}</td></tr>
    @endif
    @if(isset($obj['inverter_combination']))
        <tr><td>Inverter Combination</td><td>{{$obj['inverter_combination']}}</td></tr>
    @endif
    @if(isset($obj['is_indoor']))
        <tr><td>Indoor / Outdoor</td><td>{{($obj['is_indoor']) ? 'Indoor' : 'Outdoor'}}</td></tr>
    @endif
    @if(isset($obj['color']))
        <tr><td>Color</td><td>{{$obj['color']}}</td></tr>
    @endif
    @if(isset($obj['maximum_space_available']))
        <tr><td>Maximum Space Available</td><td>{{$obj['maximum_space_available']}}</td></tr>
    @endif
    @if(isset($obj['dnsp']))
        <tr><td>DNSP</td><td>{{$obj['dnsp']}}</td></tr>
    @endif
    @if(isset($obj['sld_file']))
        <tr>
            <td>SLD File</td>
            <td>
                <a href="{{url('inquiries/sld/'.$obj['sld_file'])}}" target="_blank" class="btn">Download</a>
            </td>
        </tr>
    @endif
    @if(count($obj['other_document']) > 0)
        <tr>
            <td>Other Documents</td>
            <td>
                @foreach($obj['other_document'] as $doc)
                    <a href="{{url('inquiries/other/'.$doc)}}" target="_blank" class="btn" style="margin-right: 1rem">Download</a>
                @endforeach
            </td>
        </tr>
    @endif
    @if(isset($obj['is_in_house']))
        <tr><td>In-House / On-Site</td><td>{{($obj['is_in_house']) ? 'In-House' : 'On-Site'}}</td></tr>
    @endif
    @if(isset($obj['test_date']))
        <tr><td>Test Date</td><td>{{date('F d, Y', strtotime($obj['test_date']))}}</td></tr>
    @endif
    @if(isset($obj['site_contact']))
        <tr><td>Site Contact</td><td>{{$obj['site_contact']}}</td></tr>
    @endif
    @if(isset($obj['site_address']))
        <tr><td>Site Address</td><td>{{$obj['site_address']}}</td></tr>
    @endif
    @if(isset($obj['message']))
        <tr><td>Message</td><td>{{$obj['message']}}</td></tr>
    @endif
    </tbody>
</table>
