$(document).ready(function () {
	let url = $("#url").val();

	// Event Edit Orangtua
	$(".EditOrangtua").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "Orangtua/detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$("#id-ortu").val(result.id);
				$("#nama-ortu").val(result.nama);
				$("#nik-ortu").val(result.nik);
				$("#password-ortu").val(result.password);
				$("div.jk-ortu select").val(result.jk);
				$("div.agama-ortu select").val(result.agama);
				$("div.goldarah-ortu select").val(result.gol_darah);
				$("#pekerjaan-ortu").val(result.pekerjaan);
				$("#pendidikan-ortu").val(result.pendidikan);
				$("#tempat-lahir-ortu").val(result.tempat_lahir);
				$("#tanggal-lahir-ortu").val(result.tanggal_lahir);
				$("#alamat-ortu").val(result.alamat);
				$("#telpon-ortu").val(result.telpon);
				$("#kewarganegaraan-ortu").val(result.kewarganegaraan);
			},
		});
	});

	// Delete Orangtua
	$(".DeleteOrangtua").on("show.bs.modal", (e) => {
		$(".DeleteOrangtua").modal("show");
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		console.log(id);
		$(".hapusOrangtua").on("click", (e) => {
			$(".DeleteOrangtua").modal("hide");
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
					document.location.href = url + "Orangtua/Delete/" + id;
				}
			});
		});
	});

	// Event Detail Orangtua
	$(".DetailOrangtua").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let nik = button.data("id");

		$.ajax({
			url: url + "Orangtua/DetailOrangtua/" + nik,
			data: {
				nik: nik,
			},
			method: "post",
			success: function (response) {
				const result = JSON.parse(response);
				const nikOrtu = result.nik
				$.ajax({
					url: url + "Siswa/GetSiswaByNikOrtu/" + nikOrtu,
					data: {
						nikOrtu: nikOrtu,
					},
					method: "post",
					success: function (response) {
						const hasil = JSON.parse(response)
						const siswa = []
						const data = hasil.forEach(element => {
							siswa.push(element.nama)
						});
						$("h5.detail").html(`<b>${result.nama}</b>`);
						$("div.detail").html(`
							<p>Nama : ${result.nama}</p>
							<p>NIK : ${result.nik}</p>
							<p>Password : ${result.password}</p>
							<p>Jenis Kelamin : ${result.jk}</p>
							<p>Nama Siswa : ${siswa.map((item =>item))}</p>
							<p>Agama : ${result.agama}</p>
							<p>Pekerjaan : ${result.pekerjaan}</p>
							<p>Gol Darah : ${result.gol_darah}</p>
							<p>Pendidikan Terakhir : ${result.pendidikan}</p>
							<p>Tempat, tanggal lahir : ${result.tempat_lahir}, ${result.tanggal_lahir}</p>
							<p>Alamat : ${result.alamat}</p>
							<p>Telpon : ${result.telpon}</p>
							<p>Kewarganegaraan : ${result.kewarganegaraan}</p>
						`);
						
					},
				});




				
			},
		});
	});
});
