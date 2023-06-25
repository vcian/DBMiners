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

{{-- <div class="card bg-dark">
	<div class="card-header text-xl/[20px]">{{ __('Access Token') }}
	</div>
	<div class="card-body bg-dark">
		<div class="mt-4 bg-dark">
			{{ __('Token: ') }}
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
</div> --}}
@endsection

@section('after-scripts')
<script src="{{ asset('js/home.js') }}"></script>
<script>
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