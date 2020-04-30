$(document).ready(function () {
	let url = $("#url").val();

	// Event Edit guru
	$(".EditGuru").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "Guru/detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$("#id-guru").val(result.id);
				$("#nama-guru").val(result.nama);
				$("#email-guru").val(result.email);
				$("#password-guru").val(result.password);
				$("div.jk-guru select").val(result.jk);
				$("div.status-guru select").val(result.status);
				$("div.agama-guru select").val(result.agama);
				$("div.goldarah-guru select").val(result.gol_darah);
				$("#pendidikan-guru").val(result.pendidikan);
				$("#tempat-lahir-guru").val(result.tempat_lahir);
				$("#tanggal-lahir-guru").val(result.tanggal_lahir);
				$("#alamat-guru").val(result.alamat);
				$("#telpon-guru").val(result.telpon);
				$("#kewarganegaraan-guru").val(result.kewarganegaraan);
			},
		});
	});


	// Delete Guru
	$(".DeleteGuru").on("show.bs.modal", (e) => {
		$(".DeleteGuru").modal('show');
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		console.log(id)
		$(".hapusGuru").on("click", (e) => {
			$(".DeleteGuru").modal('hide');
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
					document.location.href = url + 'Guru/Delete/' + id;
				}
			});
		});
	});


	// Event Detail guru
	$(".DetailGuru").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "Guru/detail/" + id,
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
