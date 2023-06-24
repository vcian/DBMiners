@extends('layouts.app')

@section('content')
<table id="constraints" class="table table-stripped table-bordered display nowrap w-100 border-gray" style="width:100%">
    <thead class="bg-black text-white">
        <tr>
            <th class="text-center uppercase text-sm">Query</th>
            <th class="text-center uppercase text-sm">Method</th>
            <th class="text-center uppercase text-sm">Duration</th>
            <th class="text-center uppercase text-sm">Happened</th>
            <th class="text-center uppercase text-sm">Actions</th>
        </tr>
    </thead>
    <tbody class="bg-light-black">
        <tr>
            <td class="text-center text-gray-dark text-sm">Show full tables where table_type = 'BASE TABLE'</td>
            <td class="text-center text-gray-dark text-sm">
                Post
            </td>
            <td class="text-center text-gray-dark text-sm">
                7.96ms
            </td>
            <td class="text-center text-gray-dark text-sm">
                2h ago
            </td>
            <td class="text-center text-gray-dark text-sm">
                <img src="{{asset('images/web/copy.svg')}}" alt="copy" class="m-auto" />
            </td>
        </tr>
        <tr>
            <td class="text-center text-gray-dark text-sm">select*from ' user' where 'id' = 6 limit 1</td>
            <td class="text-center text-gray-dark text-sm">
                Get
            </td>
            <td class="text-center text-gray-dark text-sm">
                6.96ms
            </td>
            <td class="text-center text-gray-dark text-sm">
                3h ago
            </td>
            <td class="text-center text-gray-dark text-sm">
                <img src="{{asset('images/web/copy.svg')}}" alt="copy" class="m-auto" />
            </td>
        </tr>
        <tr>
            <td class="text-center text-gray-dark text-sm">select*from ' user' where 'id' = 6 limit 1</td>
            <td class="text-center text-gray-dark text-sm">
                Get
            </td>
            <td class="text-center text-gray-dark text-sm">
                6.96ms
            </td>
            <td class="text-center text-gray-dark text-sm">
                3h ago
            </td>
            <td class="text-center text-gray-dark text-sm">
                <img src="{{asset('images/web/copy.svg')}}" alt="copy" class="m-auto" />
            </td>
        </tr>
        <tr>
            <td class="text-center text-gray-dark text-sm">select*from ' user' where 'id' = 6 limit 1</td>
            <td class="text-center text-gray-dark text-sm">
                Get
            </td>
            <td class="text-center text-gray-dark text-sm">
                6.96ms
            </td>
            <td class="text-center text-gray-dark text-sm">
                3h ago
            </td>
            <td class="text-center text-gray-dark text-sm">
                <img src="{{asset('images/web/copy.svg')}}" alt="copy" class="m-auto" />
            </td>
        </tr>
    </tbody>
</table>
@endsection

@section('after-scripts')
<script src="{{ asset('js/home.js') }}"></script>
<script>
    // datatable 	
    $('#constraints').DataTable({
        scrollX: true,
        scrollCollapse: true,
        filter: false,
        dom: 'rt<"bottom"lip><"clear">',
        ordering: false
    });
</script>

@endsection