@extends('layouts.app')

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
			@if ($tables)
				<table id="standards" class="table table-stripped table-bordered display nowrap w-100 border-gray" style="width:100%">
					<thead class="bg-black text-white">
						<tr>
							<th class="text-center">#</th>
							<th class="text-center uppercase text-sm">Table</th>
							<th class="text-center uppercase text-sm">Size (In KB)</th>
							<th class="text-center uppercase text-sm">Result</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($tables as $key => $table)
						<tr>
							<td class="text-center text-light-white">{{ $key+1 }}</td>
							<td class="text-center text-light-white text-sm">{{ $table['name'] }}</td>
							<td class="text-center text-light-white text-sm">{{ $table['size'] ?? '0.00' }}</td>
							@if ($table['status'] == 1)
								<td class="text-center text-light-white text-sm">
									<img src="{{asset('images/web/check.svg')}}" alt="key" class="m-auto" />
								</td>
							@else
								<td class="text-center text-light-white text-sm">
									<img src="{{asset('images/web/close.svg')}}" alt="key" class="m-auto" />
								</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			@else
				<a href="{{ route('backend.db_connect.index') }}">
					<label class="text-center col-md-12">{{ __('Connect a DB or Upload SQL Schema') }}</label>
				</a>
			@endif
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
						<td class="text-center text-light-white text-sm">ID</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/green-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/gray-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/check.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/close.svg')}}" alt="key" class="m-auto" />
						</td>
					</tr>
					<tr>
						<td class="text-center text-light-white text-sm">Name</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/gray-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/gray-key.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/check.svg')}}" alt="key" class="m-auto" />
						</td>
						<td class="text-center text-light-white text-sm">
							<img src="{{asset('images/web/close.svg')}}" alt="key" class="m-auto" />
						</td>
					</tr>
					<tr>
						<td class="text-center text-light-white text-sm">E-mail</td>
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
							<img src="{{asset('images/web/check.svg')}}" alt="key" class="m-auto" />
						</td>
					</tr>
					<tr>
						<td class="text-center text-light-white text-sm">Contact</td>
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
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('after-scripts')
<script src="{{ asset('js/home.js') }}"></script>
{{-- <script src="{{ asset('js/standards.js') }}"></script> --}}
@endsection