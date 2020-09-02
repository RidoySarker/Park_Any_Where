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
        @foreach ($paymentmethods as $paymentmethod)
        <tr>
            <td class="text-center">{{$sl++}}</td>
            <td class="text-center">{{$paymentmethod->payment_method_name}}</td>
            <td class="text-center">{{$paymentmethod->payment_method_description}}</td>
            <td class="text-center">
                @if ($paymentmethod->payment_method_status == 1)
                <span class="badge badge-success">{{'Active'}}</span>
                @elseif($paymentmethod->payment_method_status == 0)
                <span class="badge badge-danger">{{'Deactive'}}</span>
                @else
                <span class="badge badge-warning">{{'Not Defined'}}</span>
                @endif
            </td>
            <td class="text-center">
                @can('PaymentStatus')
                    @if ($paymentmethod->payment_method_status == 1)
                        <button class="btn btn-rounded btn-outline-success mb-2 mr-2" id="payment_method_status" data="{{$paymentmethod->payment_method_id}}"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    @else
                        <button class="btn btn-rounded btn-outline-primary mb-2 mr-2" id="payment_method_status" data="{{$paymentmethod->payment_method_id}}"> <i class="fa fa-refresh" aria-hidden="true"></i></button>
                    @endif
                @endcan
                @can('PaymentStatus')
                    <button type="button" class="edit btn btn-rounded btn-outline-info mb-2 mr-2" data="{{ $paymentmethod->payment_method_id }}" data-toggle="modal" data-target="#edit">Edit</button>
                @endcan
                @can('PaymentStatus')
                    <button type="button" class="btn btn-rounded btn-outline-danger mb-2 mr-2 delete" data="{{ $paymentmethod->payment_method_id }}">Delete</button>
                @endcan

            </td>
            @endforeach
        </tr>
    </tbody>
</table>
{{$paymentmethods->links()}}
