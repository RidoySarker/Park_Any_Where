<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100 dataTable">
    <thead>
        <tr>
            <th class="text-center">SL</th>
            <th class="text-center">Role Name</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody id="loaddata">
            @foreach($role_data as $key => $value)
        <tr>
            <td class="text-center">{{$key+1}}</td>
            <td class="text-center">{{$value->name}}</td>
            <td class="text-center">
                <button type="button" class="edit btn btn-rounded btn-outline-info mb-2 mr-2" data="{{ $value->id }}" data-toggle="modal" data-target="#edit">Edit</button>
                <button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2 delete" data="{{ $value->id }}">Delete</button>

            </td>
            @endforeach
        </tr>
    </tbody>

</table>
{{$role_data->links()}}
