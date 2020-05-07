$(document).ready(function () {
	let url = $("#url").val();
	// Event Detail Kelas
	$(".DetailKelas").on("show.bs.modal", function (e) { 
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "Home/DetailKelas/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				const result = JSON.parse(response);
				
				let html = ``;
				result.map((data) => {
					html += `
							<div class="col-sm-3">
								<div class="form-check">
								<a href="${url}Home/Absen/${data.kelas_id}/${id}" class="text-decoration-none">${data.kelas}</a>
								</div>
							</div>`;
				});

				$("h5.detail").html(`<b>${result.id}</b>`);
				$("div.detailKelas").html(html);
			},
		});
	});
	
	// Event Detail Absen
	$(".DetailAbsen").on("show.bs.modal", function (e) { 
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "Home/DetailKelas/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				const result = JSON.parse(response);
				
				let html = ``;
				result.map((data) => {
					html += `
							<div class="col-sm-3">
								<div class="form-check">
								<a href="${url}Home/Absensi/${data.kelas_id}/${id}" class="text-decoration-none">${data.kelas}</a>
								</div>
							</div>`;
				});

				$("h5.detail").html(`<b>${result.id}</b>`);
				$("div.detailAbsen").html(html);
			},
		});
	});



	// $("button.absen").prop('disabled', true)
	$("input.hadirsemua").on("change", () => {
		$("input.absen-hadir").prop("checked", true);
		$("button.absen").prop('disabled', false)
	});
	
	$("input.tidakhadirsemua").on("change", () => {
		$("input.absen-hadir").prop("checked", false);
		$("button.absen").prop('disabled', true)
	});
	
	$("input.absen-hadir").on("change", () => {
		$("button.absen").prop('disabled', false)
	});

	$("button.absen").on('click', (e) => {
		e.preventDefault
		console.log('aakak')
	})

	const flashdataGagal = $("div.flashdata-gagal").data("alert2");
	if (flashdataGagal) {
		Swal.fire({
			icon: "error",
			title: "Login Gagal",
			text: flashdataGagal,
			showConfirmButton: true,
		});
	}

	const flashdatasukses = $("div.flashdata-sukses").data("alert");
	if (flashdatasukses) {
		Swal.fire({
			icon: "success",
			title: "Login Sukses",
			text: flashdatasukses,
			showConfirmButton: true,
		});
	}
});
