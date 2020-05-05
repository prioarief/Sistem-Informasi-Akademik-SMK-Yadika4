$(document).ready(function () {
	let url = $("#url").val();

	// Event Edit TU
	$(".EditTU").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "TU/detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$("#id-TU").val(result.id);
				$("#nama-TU").val(result.nama);
				$("#email-TU").val(result.email);
				$("#password-TU").val(result.password);
				$("div.jk-TU select").val(result.jk);
				$("div.status-TU select").val(result.status);
				$("div.agama-TU select").val(result.agama);
				$("div.goldarah-TU select").val(result.gol_darah);
				$("#pendidikan-TU").val(result.pendidikan);
				$("#tempat-lahir-TU").val(result.tempat_lahir);
				$("#tanggal-lahir-TU").val(result.tanggal_lahir);
				$("#alamat-TU").val(result.alamat);
				$("#telpon-TU").val(result.telpon);
				$("#kewarganegaraan-TU").val(result.kewarganegaraan);
			},
		});
	});


	// Delete TU
	$(".DeleteTU").on("show.bs.modal", (e) => {
		$(".DeleteTU").modal('show');
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		console.log(id)
		$(".hapusTU").on("click", (e) => {
			$(".DeleteTU").modal('hide');
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
					document.location.href = url + 'TU/Delete/' + id;
				}
			});
		});
	});


	// Event Detail TU
	$(".DetailTU").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "TU/detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$('h5.detail').html(`<b>${result.nama}</b>`)
				$('div.detail').html(`
					<p>Nama : ${result.nama}</p>
					<p>Email : ${result.email}</p>
					<p>Password : ${result.password}</p>
					<p>Jenis Kelamin : ${result.jk}</p>
					<p>Status Pernikahan : ${result.status}</p>
					<p>Agama : ${result.agama}</p>
					<p>Gol Darah : ${result.gol_darah}</p>
					<p>Pendidikan Terakhir : ${result.pendidikan}</p>
					<p>Tempat, tanggal lahir : ${result.tempat_lahir}, ${result.tanggal_lahir}</p>
					<p>Alamat : ${result.alamat}</p>
					<p>Telpon : ${result.telpon}</p>
					<p>Kewarganegaraan : ${result.kewarganegaraan}</p>
				`)
			},
		});
	});
});
