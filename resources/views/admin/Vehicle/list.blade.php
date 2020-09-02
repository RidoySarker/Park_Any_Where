<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th class="text-center">Vehicle Type</th>
            <th class="text-center">Charge</th>
            <th class="text-center">Time</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody id="loaddata">
            @foreach($vehicle_data as $value)
        <tr>
            <td class="text-center">{{$sl++}}</td>
            <td class="text-center">{{$value->vehicle_type}}</td>
            <td class="text-center">{{$value->vehicle_charge}} ৳ </td>
            <td class="text-center">{{$value->vehicle_time}} {{$value->vehicle_period}}</td>

            <td class="text-center">
                @if($value->vehicle_status==1)
                    <span class="text-success">Active</span>
                    @else
                    <span class="text-danger">Inactive</span>
                @endif
            </td>

            <td class="text-center">
                @can('StatusVehicle')
                @if ($value->vehicle_status == 1)
                    <button class="btn btn-rounded btn-outline-success mb-2 mr-2" id="vehicle_status" data="{{$value->vehicle_id}}"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                @else
                    <button class="btn btn-rounded btn-outline-primary mb-2 mr-2" id="vehicle_status" data="{{$value->vehicle_id}}"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                @endif
                @endcan
                @can('EditVehicle')
                <button type="button" class="edit btn btn-rounded btn-outline-info mb-2 mr-2" data="{{ $value->vehicle_id }}" data-toggle="modal" data-target="#edit">Edit</button>
                @endcan
                @can('DeleteVehicle')
                <button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2 delete" data="{{ $value->vehicle_id }}">Delete</button>
                @endcan
            </td>
            @endforeach
        </tr>
    </tbody>

</table>
{{$vehicle_data->links()}}
