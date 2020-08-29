<div class="col-sm-12 mb-2">
    <div class="profiles-details">
        <table class="table table-condensed table-bordered table-hover">
            <thead>
            <tr class="bg-indigo">
                <th><i class="glyphicon glyphicon-flag"></i> Parking Lots</th>
                <th class="hidden-xs">Total</th>
                <th class="hidden-xs">Booking</th>
                <th>Available</th>
                <th><i class="material-icons">Action</i></th>
            </tr>
            </thead>
            <tbody>
            @foreach($parkingzone as $parking_data)
                <tr>
                    <th data-geolocation="{{$parking_data->parking_zone_id}},{{$parking_data->latitude}},{{$parking_data->longitude}}"
                        data-title="{{$parking_data->parking_name}}" class="showMapByGeoLocation"
                        style="cursor: pointer; word-wrap: break-word;">{{$parking_data->parking_name}}</th>
                    <td class="hidden-xs"><strong class="label label-info">{{$parking_data->parking_limit}}</strong>
                    </td>
                    <td class="hidden-xs"><strong
                            class="label label-warning">@php print_r($parking_data->ParkingSpace->where('booking_status',0)->count()) @endphp</strong>
                    </td>
                    <td><strong
                            class="label label-success"> @php print_r($parking_data->ParkingSpace->where('booking_status',1)->count()) @endphp   </strong>
                    </td>

                    <td>
                        <button class="btn btn-xs btn-primary" data-id="{{$parking_data->parking_zone_id}}"
                                data-title="{{$parking_data->parking_name}}" data-toggle="modal"
                                data-target="#priceModal"><i class="fas fa-dollar-sign"></i></button>
                        <button class="btn btn-xs btn-info hidden-xs showMapByGeoLocation"
                                data-geolocation="{{$parking_data->parking_zone_id}},{{$parking_data->latitude}},{{$parking_data->longitude}}">
                            <i class="fas fa-map-marker-alt"></i></button>
                        @guest
                            <button class="btn btn-sm btn-success" disabled>Booking Now</button>
                        @endguest
                        @auth
                            <a href="{{route('booking.show',$parking_data->parking_zone_id)}}"
                               class="btn btn-sm btn-success">Booking Now</a>
                        @endauth
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
