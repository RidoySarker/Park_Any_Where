<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th class="text-center">Package Name</th>
            <th class="text-center">Vehicle Type</th>
            <th class="text-center">Time</th>
            <th class="text-center">Period</th>
            <th class="text-center">Charge</th>
            <th class="text-center">Note</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody id="dataloader">
        @foreach($package_data as $value)
        <tr>
            <td class="text-center">{{$sl++}}</td>
            <td class="text-center">{{$value->package_name}}</td>
            <td class="text-center">{{$value->vehicleType->vehicle_type}}</td>
            <td class="text-center">{{$value->package_time}}</td>
            <td class="text-center">{{$value->package_period}}</td>
            <td class="text-center">{{$value->package_charge}}</td>
            <td class="text-center">{{$value->package_note}}</td>
            <td class="text-center">{{$value->package_status}}</td>
            <td class="text-center">
                @if($value->package_status==1)
                <span class="text-success">Active</span>
                @else
                <span class="text-danger">Inactive</span>
                @endif
            <td class="text-center">
                @if ($value->package_status == 1)
                <button class="btn btn-rounded btn-outline-success mb-2 mr-2" id="package_status" data="{{$value->package_id}}"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                @else
                <button class="btn btn-rounded btn-outline-primary mb-2 mr-2" id="package_status" data="{{$value->package_id}}"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                @endif
                <button type="button" class="edit btn btn-rounded btn-outline-info mb-2 mr-2" data="{{ $value->package_id }}" data-toggle="modal" data-target="#edit">Edit</button>
                <button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2 delete" data="{{ $value->package_id }}">Delete</button>

            </td>
            @endforeach
        </tr>
    </tbody>

</table>
{{$package_data->links()}}