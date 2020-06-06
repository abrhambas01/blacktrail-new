<template>
	<div class="flex-1 overflow-auto" style="background-color: #DAD3CC">
		<div class="py-2 px-3">
			<div class="flex justify-center mb-2">
				<div class="rounded py-2 px-4" style="background-color: #DDECF2">
					<p class="text-sm uppercase">
						February 2, 2020 
					</p>
				</div>
			</div>

			<div class="flex justify-center mb-4">
				<div class="rounded py-2 px-4" style="background-color: #FCF4CB">
					<p class="text-xs">
						Messages to this chat and calls are now secured with end-to-end encryption. Tap for more info.
					</p>
				</div>
			</div>

			<!-- <message-history></message-history>	 -->

			<div class="flex mb-2">
				<div class="rounded py-2 px-3" style="background-color: #F2F2F2">
					<p class="text-sm text-teal">
						Sylverter Stallone
					</p>
					<p class="text-sm mt-1">
						Hi everyone! Glad you could join! I am making a new movie.
					</p>
					<p class="text-right text-xs text-grey-dark mt-1">
						12:45 pm
					</p>
				</div>
			</div>

			<div class="flex justify-end mb-2">
				<div class="rounded py-2 px-3" style="background-color: #E2F7CB">
					<p class="text-sm mt-1">
						Hi guys.
					</p>
					<p class="text-right text-xs text-grey-dark mt-1">
						12:45 pm
					</p>
				</div>
			</div>

			<div class="flex justify-end mb-2">
				<div class="rounded py-2 px-3" style="background-color: #E2F7CB">
					<p class="text-sm mt-1">
						Count me in
					</p>
					<p class="text-right text-xs text-grey-dark mt-1">
						12:45 pm
					</p>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
export default { 
	data(){
		return { }
	},
	sockets : { 
		connect(){
			console.log("");
		},
		message(val){}
	}
};
</script>