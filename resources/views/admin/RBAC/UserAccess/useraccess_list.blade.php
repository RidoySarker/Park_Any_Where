<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th class="text-center">User Email</th>
            <th class="text-center">Role</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody id="loaddata">
            @foreach($users as $key =>$user)
        <tr>
            <td class="text-center">{{$key+1}}</td>
            <td class="text-center">{{$user['email']}}</td>
            <td class="text-center">
            @if ($user['roles'] != null)
                @foreach($user['roles'] as $role)
                    {{$role['name']}}
                @endforeach
            @else
                Not Assigned
            @endif
            </td>
            <td class="text-center">
                <button type="button" class="edit btn btn-rounded btn-outline-info mb-2 mr-2" data="{{$user['id']}}" data-toggle="modal" data-target="#edit">Edit</button>
            </td>
            @endforeach
        </tr>
    </tbody>

</table>
{{-- {{$role_data->links()}} --}}
