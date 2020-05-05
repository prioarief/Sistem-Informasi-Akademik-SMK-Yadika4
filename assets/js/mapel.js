$(document).ready(function () {
	let url = $("#url").val();

	// Event Edit Mapel
	$(".EditMapel").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");
		$(`input.kelas`).prop("checked", false);

		$.ajax({
			url: url + "Mapel/Detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);
				const guru = result.guru_id;
				const mapel = result.id;

				$("input#id").val(result.id);
				$("input#mapel").val(result.mapel);
				$("div.guruEdit select").val(guru);

				$.ajax({
					url: url + "Mapel/DetailKelas/" + mapel,
					data: {
						mapel: mapel,
					},
					method: "post",
					success: function (response) {
						const data = JSON.parse(response);

						data.map((kelas) => {
							$(`input#kelas${kelas.kelas_id}`).prop("checked", true);
						});
					},
					error: (err) => {
						console.log(err);
					},
				});
			},
		});
	});

	// Delete Siswa
	$(".DeleteSiswa").on("show.bs.modal", (e) => {
		$(".DeleteSiswa").modal("show");
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		console.log(id);
		$(".hapusSiswa").on("click", (e) => {
			$(".DeleteSiswa").modal("hide");
			e.preventDefault();

			Swal.fire({
				title: "Data yang sudah dihapus tidak dapat kembali lagi!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Hapus!",
			}).then((result) => {
				if (result.value) {
					document.location.href = url + "Siswa/Delete/" + id;
				}
			});
		});
	});

	// Event Detail Kelas
	$(".DetailKelas").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "Mapel/DetailKelas/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				const result = JSON.parse(response);
				console.log(result)

				let html = `<form method="post" action="${url}Mapel/Edit">
							<div class="form-group kelasEdit" id="">
							<p>Kelas Yang Diajar <span class="text-danger">*</span></p>
							<div class="row">`;
				result.forEach((data) => {
					html += `
							<div class="col-sm-3">
								<div class="form-check">
									<input class="form-check-input kelas" type="checkbox" name="kelas[]" value="${data.kelas_id}" id="kelas${data.kelas_id}" data-status="">
									<label class="form-check-label" for="kelas${data.kelas_id}">
										${data.kelas}
									</label>
								</div>
							</div>`;
				});

				html += `</div><small class="text-danger d-block mt-3">Pilih untuk menghapus!</small><a href="" class="badge badge-info mt-1">Hapus!</a></form>`;

				$("h5.detail").html(`<b>${result.id}</b>`);
				$("div.detailKelas").html(html);
			},
			error: (err) => {
				$("h5.detail").html(`<b>${err}</b>`);
			},
		});
	});

	// Event checked kelas
	$("input.kelas").on("change", (e) => {
		if ($(this).prop("checked", true)) {
			$("input.kelas").data("status", 1);
		} else {
			$("input.kelas").data("status", 0);
		}
	});
});
