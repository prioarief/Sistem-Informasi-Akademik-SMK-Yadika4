$(document).ready(function () {
	let url = $("#url").val();
	// Event Detail Kelas
	$(".DetailKelas").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");
		let href = button.data("url");

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
								<a href="${url + href + data.kelas_id}/${id}" class="text-decoration-none">${
						data.kelas
					}</a>
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
								<a href="${url}Home/DataAbsensi/${data.kelas_id}/${id}" class="text-decoration-none">${data.kelas}</a>
								</div>
							</div>`;
				});

				$("h5.detail").html(`<b>${result.id}</b>`);
				$("div.detailAbsen").html(html);
			},
		});
	});

	// Event Detail Nilai
	$(".DetailNilai").on("show.bs.modal", function (e) {
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
								<a href="${url}Home/DataNilai/${data.kelas_id}/${id}" class="text-decoration-none">${data.kelas}</a>
								</div>
							</div>`;
				});

				$("h5.detail").html(`<b>${result.id}</b>`);
				$("div.detailNilai").html(html);
			},
		});
	});

	// Event Pilih Mapel
	$(".PilihMapel").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");
		let siswa = button.data("siswa");

		$.ajax({
			url: url + "Home/PilihMapel/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				const result = JSON.parse(response);
				let html = ``;
				result.map((data) => {
					html += `<div class="col-sm-3">
								<div class="form-check">
									<a href="${url}Home/AbsenSaya/${siswa}/${data.mapel_id}" class="text-decoration-none">${data.mapel}</a>
								</div>
							</div>`;
				});

				$("div.mapell").html(html);
				// $("h5.detail").html(`<b>${result.id}</b>`);
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
				let html = ``;
				if (result < 1) {
					html += "Data Tidak Ada";
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
						html += `<div class="bg-success" style="width: 30px; height:30px" title="Hadir"></div>`;
					} else if (status.keterangan == "alpa") {
						html += `<div class="bg-danger" style="width: 30px; height:30px" title="Alpa"></div>`;
					} else if (status.keterangan == "sakit") {
						html += `<div class="bg-warning" style="width: 30px; height:30px" title="Sakit"></div>`;
					} else if (status.keterangan == "ijin") {
						html += `<div class="bg-primary" style="width: 30px; height:30px" title="Ijin"></div>`;
					}
					html += `</td>`;
				});
				html += `</tr>`;

				$("#konten").html(html);
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

	// Nilai
	let produktif = $("input#mapel").data("produktif");
	$("input#keterampilan").on("keyup", () => {
		let predikat = "";
		let nilai_pengetahuan = $("input#pengetahuan").val();
		let nilai_keterampilan = $("input#keterampilan").val();

		akhir = (nilai_pengetahuan * 30 + nilai_keterampilan * 70) / 100;

		nilai_akhir = Math.round(akhir);

		$("input#akhir").val(nilai_akhir);
		if (produktif == 1) {
			if (nilai_akhir >= 95) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">A+</p>'
				);
			} else if (nilai_akhir >= 90 && nilai_akhir <= 94) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">A</p>'
				);
			} else if (nilai_akhir >= 85 && nilai_akhir <= 89) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">A-</p>'
				);
			} else if (nilai_akhir >= 80 && nilai_akhir <= 84) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">B+</p>'
				);
			} else if (nilai_akhir >= 75 && nilai_akhir <= 79) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">B</p>'
				);
			} else if (nilai_akhir >= 70 && nilai_akhir <= 74) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">B-</p>'
				);
			} else if (nilai_akhir >= 65 && nilai_akhir <= 69) {
				$("#predikat").html(
					'Predikat : <p class="text-warning d-inline">C</p>'
				);
			} else if (nilai_akhir < 65) {
				$("#predikat").html('Predikat : <p class="text-danger d-inline">D</p>');
			}
		} else {
			if (nilai_akhir >= 95) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">A+</p>'
				);
			} else if (nilai_akhir >= 90 && nilai_akhir <= 94) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">A</p>'
				);
			} else if (nilai_akhir >= 85 && nilai_akhir <= 89) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">A-</p>'
				);
			} else if (nilai_akhir >= 80 && nilai_akhir <= 84) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">B+</p>'
				);
			} else if (nilai_akhir >= 75 && nilai_akhir <= 79) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">B</p>'
				);
			} else if (nilai_akhir >= 70 && nilai_akhir <= 74) {
				$("#predikat").html(
					'Predikat : <p class="text-success d-inline">B-</p>'
				);
			} else if (nilai_akhir >= 60 && nilai_akhir <= 69) {
				$("#predikat").html(
					'Predikat : <p class="text-warning d-inline">C</p>'
				);
			} else if (nilai_akhir < 60) {
				$("#predikat").html('Predikat : <p class="text-danger d-inline">D</p>');
			}
		}
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
