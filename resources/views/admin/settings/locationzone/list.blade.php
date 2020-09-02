<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th class="text-center">Name</th>
            <th class="text-center">Description</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody id="loaddata">
        @foreach ($location_zones as $locationzone)
        <tr>
            <td class="text-center">{{$sl++}}</td>
            <td class="text-center">{{$locationzone->location_zone_name}}</td>
            <td class="text-center">{{$locationzone->location_zone_description}}</td>
            <td class="text-center">
                @if ($locationzone->location_zone_status == 1)
                <span class="badge badge-success">{{'Active'}}</span>
                @elseif($locationzone->location_zone_status == 0)
                <span class="badge badge-danger">{{'Deactive'}}</span>
                @else
                <span class="badge badge-warning">{{'Not Defined'}}</span>
                @endif
            </td>
            <td class="text-center">
                @can('ZoneStatus')
                    @if ($locationzone->location_zone_status == 1)
                        <button class="btn btn-rounded btn-outline-success mb-2 mr-2" id="location_zone_status" data="{{$locationzone->location_zone_id}}"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    @else
                        <button class="btn btn-rounded btn-outline-primary mb-2 mr-2" id="location_zone_status" data="{{$locationzone->location_zone_id}}"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                    @endif
                @endcan
                @can('ZoneEdit')
                    <button type="button" class="edit btn btn-rounded btn-outline-info mb-2 mr-2" data="{{ $locationzone->location_zone_id }}" data-toggle="modal" data-target="#edit">Edit</button>
                @endcan
                @can('ZoneDelete')
                    <button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2 delete" data="{{ $locationzone->location_zone_id }}">Delete</button>
                @endcan
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
{{$location_zones->links()}}
