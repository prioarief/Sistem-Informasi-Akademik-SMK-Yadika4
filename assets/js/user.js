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

	// delete absen
	$("a.deleteAbsen").on("click", function (e) {
		e.preventDefault();
		const href = $(this).attr("href");
		const text = $(this).data("text");

		Swal.fire({
			title: "Data yang sudah dihapus tidak dapat kembali lagi!",
			text: `${text} akan di hapus!!`,
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Hapus!",
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		});
	});

	// order absen
	$("#order").on("change", function () {
		let bulan = $(this).val();
		let siswa = $(".orderr").data("siswa");
		let mapel = $(".orderr").data("mapel");

		$.ajax({
			url: `${url}/Home/getAbsenPerBulan/${siswa}/${mapel}/${bulan}`,
			data: {
				siswa: siswa,
				mapel: mapel,
				bulan: bulan,
			},
			method: "get",
			success: function (response) {
				let result = JSON.parse(response);
				let html = ``
				if (result < 1) {
					html += 'Data Tidak Ada'
				}
				html += `<table class="table table-responsive-md">
				<thead><tr>`;
				result.forEach((data) => {
					html += `
					<th scope="col">${data.tanggal}</th>`;
				});

				html += `</tr>
						</thead>
						<tbody>
						<tr>`;

				result.forEach((status) => {
					html += `<td>`;
					if (status.keterangan == "hadir") {
						html += `<div class="bg-success" style="width: 30px; height:30px" title="Hadir"></div>`
					} else if (status.keterangan == "alpa") {
						html += `<div class="bg-danger" style="width: 30px; height:30px" title="Alpa"></div>`
					} else if (status.keterangan == "sakit") {
						html += `<div class="bg-warning" style="width: 30px; height:30px" title="Sakit"></div>`
					} else if (status.keterangan == "ijin") {
						html += `<div class="bg-primary" style="width: 30px; height:30px" title="Ijin"></div>`
					}
					html += `</td>`
				});
				html += `</tr>`;

				$('#konten').html(html)

				
			},
			// error: function (err) {
			// 	$('#konten').html(`<h1 class="text-center">${err}</h1>`)
			// },
		});
	});

	// $("button.absen").prop('disabled', true)
	$("input.hadirsemua").on("change", () => {
		$("input.absen-hadir").prop("checked", true);
		$("button.absen").prop("disabled", false);
	});

	$("input.tidakhadirsemua").on("change", () => {
		$("input.absen-hadir").prop("checked", false);
		$("button.absen").prop("disabled", true);
	});

	$("input.absen-hadir").on("change", () => {
		$("button.absen").prop("disabled", false);
	});

	$("button.absen").on("click", (e) => {
		e.preventDefault;
		console.log("aakak");
	});

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
