@extends('layouts.app')

@push('after-styles')

<style>
	.label {
		padding: 10px;
		font-size: 18px;
		color: #111;
	}

	.copy-text,
	.token-text {
		position: relative;
		padding: 6px;
		background: #fff;
		border: 1px solid #ddd;
		border-radius: 10px;
		/* display: flex; */
	}

	.copy-text input.text,
	.token-text input.text {
		padding: 10px;
		font-size: 18px;
		color: #555;
		border: none;
		outline: none;
		/* width: 90%; */
	}

	.copy-text button,
	.token-text button {
		padding: 10px;
		background: #5784f5;
		color: #fff;
		font-size: 18px;
		border: none;
		outline: none;
		border-radius: 10px;
		cursor: pointer;
		float: right;
	}

	.copy-text button:active {
		background: #809ce2;
	}

	.copy-text button:before {
		content: "Copied";
		position: absolute;
		top: -45px;
		right: 0px;
		background: #5c81dc;
		padding: 8px 10px;
		border-radius: 20px;
		font-size: 15px;
		display: none;
	}

	.copy-text button:after {
		content: "";
		position: absolute;
		top: -20px;
		right: 25px;
		width: 10px;
		height: 10px;
		background: #5c81dc;
		transform: rotate(45deg);
		display: none;
	}

	.copy-text.active button:before,
	.copy-text.active button:after {
		display: block;
	}

	.hide-btn {
		margin-right: 3px;
	}

	.delete-btn {
		/* padding: 10px; */
		background: #f83838;
		color: #fff;
		/* font-size: 18px; */
		border: none;
		outline: none;
		border-radius: 10px;
		cursor: pointer;
		float: right;
	}
</style>
@endpush
@section('content')
<div class="query-optimization">
	<div class="tabs flex items-center">
		<button data-tab-value="#tab_standard" class="active uppercase d-flex items-center me-3 text-[13px] pb-2 relative custom-action">
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="15" height="15" viewBox="0 0 24 24" class="me-2">
				<defs>
					<clipPath id="clip-path">
						<rect id="Rectangle_12463" data-name="Rectangle 12463" width="24" height="24" />
					</clipPath>
				</defs>
				<g id="noun-grid-608343" transform="translate(-70.004 2)">
					<g id="Mask_Group_26" data-name="Mask Group 26" transform="translate(70.004 -2)" clip-path="url(#clip-path)">
						<g id="Group_5253" data-name="Group 5253" transform="translate(2.4 2.4)">
							<path id="Path_94449" data-name="Path 94449" d="M78.731.873A.872.872,0,0,0,77.859,0H70.877A.872.872,0,0,0,70,.873V7.855a.872.872,0,0,0,.873.873h6.982a.872.872,0,0,0,.873-.873Z" transform="translate(-70.004)" />
							<path id="Path_94450" data-name="Path 94450" d="M376.33,8.731h6.982a.872.872,0,0,0,.873-.873V.877A.872.872,0,0,0,383.312,0H376.33a.872.872,0,0,0-.873.873V7.859a.872.872,0,0,0,.873.873Z" transform="translate(-364.984 -0.004)" />
							<path id="Path_94451" data-name="Path 94451" d="M78.731,313.308v-6.982a.872.872,0,0,0-.873-.873H70.877a.872.872,0,0,0-.873.873v6.982a.872.872,0,0,0,.873.873h6.982a.872.872,0,0,0,.873-.873Z" transform="translate(-70.004 -294.98)" />
							<path id="Path_94452" data-name="Path 94452" d="M375.45,313.312a.872.872,0,0,0,.873.873H383.3a.872.872,0,0,0,.873-.873V306.33a.872.872,0,0,0-.873-.873h-6.982a.872.872,0,0,0-.873.873Z" transform="translate(-364.977 -294.984)" />
						</g>
					</g>
				</g>
			</svg>

			Standards
		</button>
		<button data-tab-value="#tab_constraint" class="uppercase d-flex items-center me-3 text-[13px] pb-2 relative custom-action">
			<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20" class="me-2">
				<g id="noun-chain-1655550" transform="translate(-70.937 -14.141)">
					<path id="Path_94447" data-name="Path 94447" d="M96.886,211.746a4.451,4.451,0,0,0,.358-1.727,4.373,4.373,0,0,0-.147-1.159,5.475,5.475,0,0,0-.274-.758,4.179,4.179,0,0,0-.842-1.18,5.037,5.037,0,0,0-1.179-.842l-.632.632a1.467,1.467,0,0,0-.379,1.348,2.219,2.219,0,0,1,1.074,1.074,2.484,2.484,0,0,1,.189.779,2.155,2.155,0,0,1-.632,1.685l-4.505,4.423a2.174,2.174,0,0,1-3.074-3.075l3.474-3.475a5.065,5.065,0,0,1-.168-2.907c-.147.105-.274.232-.421.358l-4.442,4.444A4.367,4.367,0,0,0,84,214.484a4.319,4.319,0,0,0,1.284,3.1,4.408,4.408,0,0,0,6.211,0l4.463-4.465a3.447,3.447,0,0,0,.358-.421,4.349,4.349,0,0,0,.568-.948Z" transform="translate(-13.065 -184.72)" />
					<path id="Path_94448" data-name="Path 94448" d="M277,18.517a4.319,4.319,0,0,0-1.284-3.1,4.408,4.408,0,0,0-6.211,0l-4.463,4.466a3.446,3.446,0,0,0-.358.421,4.359,4.359,0,0,0-.568.948,4.451,4.451,0,0,0-.358,1.727,4.373,4.373,0,0,0,.147,1.159,5.468,5.468,0,0,0,.274.758,4.179,4.179,0,0,0,.842,1.18,4.493,4.493,0,0,0,1.179.842l.632-.632a1.467,1.467,0,0,0,.379-1.348,2.219,2.219,0,0,1-1.074-1.074,2.484,2.484,0,0,1-.189-.779,2.154,2.154,0,0,1,.632-1.685l4.505-4.423a2.174,2.174,0,0,1,3.074,3.075l-3.495,3.5a5.065,5.065,0,0,1,.168,2.907c.147-.105.274-.232.421-.358l4.463-4.466A4.367,4.367,0,0,0,277,18.517Z" transform="translate(-186.065 0)" />
				</g>
			</svg>

			Constraints
		</button>
	</div>

	<div class="tab-content bg-no-repeat bg-cover mt-3 p-3 bg-gray-bg">
		<div class="tabs__tab active" id="tab_standard" data-tab-info>
			<table id="standards" class="table table-stripped table-bordered display nowrap w-100 border-gray" style="width:100%">
				<thead class="bg-black text-white">
					<tr>
						<th></th>
						<th class="text-center uppercase text-sm">Table</th>
						<th class="text-center uppercase text-sm">Table Column</th>
						<th class="text-center uppercase text-sm">Size</th>
						<th class="text-center uppercase text-sm">Result</th>
					</tr>
				</thead>
			</table>
		</div>
		<div class="tabs__tab" id="tab_constraint" data-tab-info>
			<div class="dropdown mb-3">
				<button class="btn dropdown-toggle bg-light-black border-0 rounded-2xl text-light-white w-64 text-start relative text-sm hover:bg-light-black focus:bg-light-black active:bg-light-black" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					Users
				</button>
				<ul class="dropdown-menu w-64 bg-black">
					<li class="text-light-white p-2">Action</li>
					<li class="text-light-white p-2">Another action</li>
					<li class="text-light-white p-2">Something else here</li>
				</ul>
			</div>
			<table id="constraints" class="table table-stripped table-bordered display nowrap w-100 border-gray" style="width:100%">
				<thead class="bg-black text-white">
					<tr>
						<th class="text-center uppercase text-sm">Columns</th>
						<th class="text-center uppercase text-sm">Primary key</th>
						<th class="text-center uppercase text-sm">Foreign key</th>
						<th class="text-center uppercase text-sm">Indexing</th>
						<th class="text-center uppercase text-sm">Unique key</th>
					</tr>
				</thead>
				<tbody class="bg-light-black">
					<tr>
						<td class="text-center text-light-white text-sm">Comments</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/gray-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/gray-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/close.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/close.svg')}}" alt="key" class="m-auto" />
						</td>
					</tr>
					<tr>
						<td class="text-center text-light-white text-sm">Users</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/green-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/green-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/check.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/check.svg')}}" alt="key" class="m-auto" />
						</td>
					</tr>
					<tr>
						<td class="text-center text-light-white text-sm">Posts</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/green-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/green-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/check.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/check.svg')}}" alt="key" class="m-auto" />
						</td>
					</tr>
					<tr>
						<td class="text-center text-light-white text-sm">Interface</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/green-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/green-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/close.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/close.svg')}}" alt="key" class="m-auto" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="copy-text col-md-12">
	<input type="text" class="text col-md-10" value="{{ $token ?? '-' }}" />
	<button class="copy-btn"><i class="bi bi-files"></i></button>
	<button class="hide-btn"><i class="bi bi-eye-slash"></i></button>
</div>
<!-- <div class="card">
	<div class="card-header text-xl/[20px]">{{ __('Dashboard') }}</div>
	<div class="card-body">
		{{-- @if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
	</div>
	@endif --}}

	{{ __('You are logged in!') }}
	<div class="mt-4">
		{{ __('Token: ') }}
		{{-- <button class="delete-btn"><i class="bi bi-trash"></i></button> --}}
		<div class="token-text col-md-12">
			<input type="text" class="text col-md-10" value="{{ hideUserToken($token) ?? '-' }}" />
			<button class="show-btn"><i class="bi bi-eye"></i></button>
		</div>
		<div class="copy-text col-md-12">
			<input type="text" class="text col-md-10" value="{{ $token ?? '-' }}" />
			<button class="copy-btn"><i class="bi bi-files"></i></button>
			<button class="hide-btn"><i class="bi bi-eye-slash"></i></button>
		</div>
	</div>
</div>
</div> -->
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

	$(document).ready(function() {
		var table = $('#standards').DataTable({
			scrollX: true,
			scrollCollapse: true,
			filter: false,
			dom: 'rt<"bottom"lip><"clear">',
			ordering: false,
			ajax: "{{asset('ajax/data.js')}}",
			columns: [{
					className: 'dt-control',
					orderable: false,
					data: null,
					defaultContent: '',
				},
				{
					data: 'table'
				},
				{
					data: 'column'
				},
				{
					data: 'size'
				},
				{
					data: 'result'
				},
			],
		});

		// Add event listener for opening and closing details
		$('#standards tbody').addClass('bg-light-black text-light-white text-center text-sm')
		$('#standards tbody').on('click', 'td.dt-control', function() {
			var tr = $(this).closest('tr');
			var row = table.row(tr);

			if (row.child.isShown()) {
				// This row is already open - close it
				row.child.hide();
				tr.removeClass('shown');
			} else {
				// Open this row
				row.child(format(row.data())).show();
				tr.addClass('shown');
			}
		});
	});

	function format(d) {
		return (
			'<p class="text-left mb-2">Media state</p>' +
			'<table class="table table-stripped table-bordered display nowrap w-100 border-gray" cellpadding="5" cellspacing="0" border="0">' +
			'<thead class="bg-black">' +
			'<tr>' +
			'<th class="text-light-white text-center text-sm uppercase">Name</th>' +
			'</th>' +
			'<th class="text-light-white text-center text-sm uppercase">Naming conversation</th>' +
			'</th>' +
			'<th class="text-light-white text-center text-sm uppercase">Name standards</th>' +
			'</th>' +
			'<th class="text-light-white text-center text-sm uppercase">Data type</th>' +
			'</th>' +
			'</thead>' +
			'<tbody class="bg-light-black" >' +
			'<tr>' +
			'<td class="text-light-white text-center text-sm">' +
			d.name +
			'</td>' +
			'<td class="text-light-white text-center text-sm">' +
			d.conversation +
			'</td>' +
			'<td class="text-light-white text-center text-sm">' +
			d.standards +
			'</td>' +
			'<td class="text-light-white text-center text-sm">' +
			d.type +
			'</td>' +
			'</tr>' +
			'</tbody>' +
			'</table>'
		);
	}

	$(document).on('click','.custom-action',function(){
		$('#constraints').DataTable().draw();
		$('#standards').DataTable().draw();
	});

	//Copy user token
	$(".copy-text").hide();

	$(".show-btn").click(function() {
		$(".copy-text").show();
		$(".token-text").hide();
	});
	$(".hide-btn").click(function() {
		$(".copy-text").hide();
		$(".token-text").show();
	});

	let copyText = document.querySelector(".copy-text");
	copyText.querySelector("button").addEventListener("click", function() {
		let input = copyText.querySelector("input.text");
		input.select();
		document.execCommand("copy");
		copyText.classList.add("active");
		window.getSelection().removeAllRanges();

		setTimeout(function() {
			copyText.classList.remove("active");
		}, 2500);
	});
</script>
@endsection