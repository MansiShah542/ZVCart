@extends('admin.adminDashboard')
@section('content-page')
<div class="container">
    <h3 align="center"><u>Vendors List</u></h3>
    <table class="table table-bordered table-striped">
        <thead>
            <th>ID</th>
            <th>Status</th>
            <th>Company Name</th>
            <th>GST No</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Approval</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <tr>
                @foreach ($sellers as $seller)
                    <td>{{ $seller->id }} </td>
                    <td style="color: {{ $seller->approved ? 'green' : 'red' }}">{{ $seller->approved ? 'Approved' : 'Pending' }}</td>
                    <td>{{ $seller->company_name }}</td>
                    <td>{{ $seller->gst_no }}</td>
                    <td>{{ $seller->phone }}</td>
                    <td>{{ $seller->email }}</td>
                    <td>{{ $seller->address }}</td>
                    <td>
                        @if (!$seller->approved)
                            <form action="{{ route('admin.approve', $seller->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                            </form>
                        @else
                            <form action="{{ route('admin.disapprove', $seller->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Disapprove</button>
                            </form>
                        @endif
                    </td>
                    <td><a href="{{ route('admin.seller.edit', $seller->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    <td><a href="{{ route('admin.seller.delete', $seller->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5 d-flex justify-content-center">{{ $sellers->links() }}</div>
</div>
@endsection