$(document).ready(function () {
	let url = $("#url").val();

	// Event Edit Kelas
	$(".EditKelas").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		// console.log(id)

		$.ajax({
			url: url + "Kelas/detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$("input#inputKelas").val(result.kelas);
				$("input#id").val(result.id);
				$("div.jurusanEdit select").val(result.jurusan_id);
			},
		});
	});

	// Delete Kelas
	$(".DeleteKelas").on("show.bs.modal", (e) => {
		$(".DeleteKelas").modal('show');
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		// console.log(id)
		$(".hapusKelass").on("click", (e) => {
			$(".DeleteKelas").modal('hide');
			e.preventDefault();
			// let href = $(this).data("id");

			// console.log(href);

			Swal.fire({
				title: "Data yang sudah dihapus tidak dapat kembali lagi!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Hapus!",
			}).then((result) => {
				if (result.value) {
					document.location.href = url + 'Kelas/Delete/' + id;
				}
			});
		});
	});


	// Event Detail Kelas
	$(".DetailKelas").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "Kelas/DetailKelas/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				const result = JSON.parse(response);
				$('h5.detail').html(`<b>${result.kelas}</b>`)
				$('div.modal-body').html(`
					<p>Kelas : ${result.kelas}</p>
					<p>Jurusan : ${result.jurusan}</p>
				`)
			},
		});
	});

	// Event Export Kelas
	$(".ExportExcelKelas").on("show.bs.modal", function (e) {
		$.ajax({
			url: url + "Jurusan/get",
			// data: {
			// 	nis: nis,
			// },
			method: "post",
			success: function (response) {
				const result = JSON.parse(response);

				let html = `<div class="row">`;
				result.map((data) => {
					html += `
							<div class="col-sm-12">
								<div class="form-check">
								<a href="${url}Kelas/ExportExcel/${data.id}" class="text-decoration-none">${data.jurusan}</a>
								</div>
								</div>`;
				});

				html += `<a href="${url}Kelas/ExportExcel" target="blank" class="text-decoration-none mt-3 ml-3">Export Semua Data</a>`;
				html += `</div>`;

				// $("h5.detail").html(`<b>${result.id}</b>`);
				$("div.ExportExcel").html(html);
			},
		});
	});
	
	// Event Export Kelas
	$(".ExportPdfKelas").on("show.bs.modal", function (e) {
		$.ajax({
			url: url + "Jurusan/get",
			// data: {
			// 	nis: nis,
			// },
			method: "post",
			success: function (response) {
				const result = JSON.parse(response);

				let html = `<div class="row">`;
				result.map((data) => {
					html += `
							<div class="col-sm-12">
								<div class="form-check">
								<a href="${url}Kelas/Export/${data.id}" target="blank" class="text-decoration-none">${data.jurusan}</a>
								</div>
								</div>`;
				});

				html += `<a href="${url}Kelas/Export" target="blank" class="text-decoration-none mt-3 ml-3">Export Semua Data</a>`;
				html += `</div>`;

				// $("h5.detail").html(`<b>${result.id}</b>`);
				$("div.ExportExcel").html(html);
			},
		});
	});


});
