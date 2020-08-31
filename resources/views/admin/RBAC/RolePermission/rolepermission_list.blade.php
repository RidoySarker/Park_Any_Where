<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th class="text-center">Role Name</th>
            <th class="text-center">Permission Name</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody id="loaddata">
            @foreach($role_data as $key => $value)
        <tr>
            <td class="text-center">{{$key+1}}</td>
            <td class="text-center">{{$value->name}}</td>
            <td >
            @php $roles_permissions=array_column((collect($value)->toArray())['permissions'],'id');
            @endphp
            
                @foreach($permission as $data)

                    @php $status=in_array($data['id'],$roles_permissions); @endphp
                    <input type="checkbox" disabled {{$status?'checked':''}}>
                    {{$data['name']}}<br>
                @endforeach

            </td>
            <td class="text-center">
                <button type="button" class="edit btn btn-rounded btn-outline-info mb-2 mr-2" data="{{ $value->id }}" data-toggle="modal" data-target="#edit">Edit</button>

            </td>
            
        </tr>
        @endforeach
    </tbody>

</table>
{{$role_data->links()}}
