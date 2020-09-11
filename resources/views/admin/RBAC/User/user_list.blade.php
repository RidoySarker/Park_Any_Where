<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th class="text-center">Name</th>
            <th class="text-center">User Type</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Email</th>
            <th class="text-center">Gender</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody id="loaddata">
        @foreach ($user as $user_data)
        <tr>
            <td class="text-center">{{$sl++}}</td>
            <td class="text-center">{{$user_data->name}}</td>
            <td class="text-center">
                @if ($user_data->user_type == 1)
                <span class="badge badge-success">Admin User</span>
                @elseif($user_data->user_type == 2)
                <span class="badge badge-success">RentUser</span>
                @else($user_data->user_type == 3)
                <span class="badge badge-success">Customer User</span>
                @endif
            </td>
            <td class="text-center">{{$user_data->number}}</td>
            <td class="text-center">{{$user_data->email}}</td>
            <td class="text-center">
                @if ($user_data->gender == 1)
                <span class="badge badge-success">Male</span>
                @else($user_data->gender == 2)
                <span class="badge badge-success">Female</span>
                @endif
            </td>
            <td class="text-center">
                @if ($user_data->status == 1)
                <span class="badge badge-success">{{'Active'}}</span>
                @else($user_data->status == 0)
                <span class="badge badge-danger">{{'Inactive'}}</span>
                @endif
            </td>
            <td class="text-center">

                @can('PaymentStatus')
                    @if ($user_data->status == 1)
                        <button class="btn btn-rounded btn-outline-success mb-2 mr-2" id="user_status" data="{{$user_data->id}}"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    @else
                        <button class="btn btn-rounded btn-outline-danger mb-2 mr-2" id="user_status" data="{{$user_data->id}}"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                    @endif
                @endcan

                @can('PaymentStatus')
                    <button type="button" class="edit btn btn-rounded btn-outline-info mb-2 mr-2" data="{{ $user_data->id }}" data-toggle="modal" data-target="#edit">Edit</button>
                @endcan

                @can('PaymentStatus')
                    <button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2 delete" data="{{ $user_data->id }}">Delete</button>
                @endcan

            </td>
            @endforeach
        </tr>
    </tbody>
</table>
{{$user->links()}}
