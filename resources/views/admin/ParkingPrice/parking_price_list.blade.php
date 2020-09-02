<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th class="text-center">Parking Zone</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody id="loaddata">
            @foreach($parking_data as $value)
        <tr>
            <td class="text-center">{{$sl++}}</td>
            <td class="text-center">{{$value->parkingzone->parking_name}}</td>

            <td class="text-center">
                @if($value->price_status==1)
                    <span class="text-success">Active</span>
                    @else
                    <span class="text-danger">Inactive</span>
                @endif
            </td>
            <td class="text-center">

                @can('ParkingPriceStatus')
                    @if ($value->price_status == 1)
                        <button class="btn btn-rounded btn-outline-success mb-2 mr-2" id="price_status" data="{{$value->parking_price_id}}"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    @else
                        <button class="btn btn-rounded btn-outline-primary mb-2 mr-2" id="price_status" data="{{$value->parking_price_id}}"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                    @endif
                @endcan

                @can('ParkingPriceEdit')
                    <a  href="{{route('parkingprice.edit',$value->parking_price_id)}}" class="btn btn-rounded btn-outline-info mb-2 mr-2">Edit</a>
                @endcan

                @can('ParkingPriceDelete')
                    <button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2 delete" data="{{ $value->parking_price_id }}">Delete</button>
                @endcan
            </td>
            @endforeach
        </tr>
    </tbody>

</table>
{{$parking_data->links()}}
