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
				$("input#mapelEdit").val(result.mapel);
				$("div.guruEdit select").val(guru);
				$("div.Status select").val(result.produktif);

				$.ajax({
					url: url + "Mapel/DetailKelas/" + mapel,
					data: {
						mapel: mapel,
					},
					method: "post",
					success: function (response) {
						const data = JSON.parse(response);

						data.map((kelas) => {
							$(`input#editkelas${kelas.kelas_id}`).prop("checked", true);
						});
					},
					error: (err) => {
						console.log(err);
					},
				});
			},
		});
	});

	// Delete Mapel
	$(".DeleteMapel").on("show.bs.modal", (e) => {
		$(".DeleteMapel").modal("show");
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		console.log(id);
		$(".hapusMapel").on("click", (e) => {
			$(".DeleteMapel").modal("hide");
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
					document.location.href = url + "Mapel/DeleteMapel/" + id;
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

				let html = `<input type="hidden" name="idmapel" value="${id}">`;
				result.map((data) => {
					html += `
							<div class="col-sm-3">
								<div class="form-check">
									<input class="form-check-input kelas" type="checkbox" name="kelas[]" value="${data.id}" id="${data.kelas_id}" data-status="">
									<label class="form-check-label" for="${data.kelas_id}">
										${data.kelas}
									</label>
								</div>
							</div>`;
				});

				$("h5.detail").html(`<b>${result.id}</b>`);
				$("div.detailKelas").html(html);
			},
			error: (err) => {
				$("h5.detail").html(`<b>${err}</b>`);
			},
		});
	});

});
