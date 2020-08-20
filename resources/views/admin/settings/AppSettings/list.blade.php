<table class="table table-striped dt-responsive nowrap w-100 dataTable">
    <thead>
        <tr>
            <th class="text-center">Sl</th>
            <th class="text-center">Application Name</th>
            <th class="text-center">Application Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Address</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody id="loaddata">
        @foreach($appsettings_data as $value)
        <tr>
            <td class="text-center">{{$sl++}}</td>
            <td class="text-center">{{$value->application_name}}</td>
            <td class="text-center">{{$value->application_email}}</td>
            <td class="text-center">{{$value->application_phone}}</td>
            <td class="text-center">{{$value->application_address}}</td>
            <td class="text-center">
                <button type="button" class="edit btn btn-rounded btn-outline-info mb-2 mr-2" data="{{ $value->appsettings_id }}" data-toggle="modal" data-target="#edit">Edit</button>
                <button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2 delete" data="{{ $value->appsettings_id }}">Delete</button>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
{{$appsettings_data->links()}}