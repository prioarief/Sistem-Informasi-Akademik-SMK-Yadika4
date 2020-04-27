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

	// Event Edit Jurusan
	$(".EditJurusan").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "Jurusan/detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$("input#inputJurusan").val(result.jurusan);
				$("input#idJurusan").val(result.id);
			},
		});
	});

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
	
	// Event Edit Siswa
	$(".EditSiswa").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "Siswa/detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$("#id-siswa").val(result.id);
				$("#nama-siswa").val(result.nama);
				$("#nis-siswa").val(result.nis);
				$("#password-siswa").val(result.password);
				$("div.jk-siswa select").val(result.jk);
				$("div.kelas-siswa select").val(result.kelas_id);
				$("div.agama-siswa select").val(result.agama);
				$("div.goldarah-siswa select").val(result.gol_darah);
				$("#nik-ortu").val(result.nik_orangtua);
				$("#pendidikan-siswa").val(result.pendidikan);
				$("#tempat-lahir-siswa").val(result.tempat_lahir);
				$("#tanggal-lahir-siswa").val(result.tanggal_lahir);
				$("#alamat-siswa").val(result.alamat);
				$("#telpon-siswa").val(result.telpon);
				$("#kewarganegaraan-siswa").val(result.kewarganegaraan);
			},
		});
	});
	
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
	
	// Delete Jurusan
	$(".DeleteJurusan").on("show.bs.modal", (e) => {
		$(".DeleteJurusan").modal('show');
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		// console.log(id)
		$(".hapusJurusan").on("click", (e) => {
			$(".DeleteJurusan").modal('hide');
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
					document.location.href = url + 'Jurusan/Delete/' + id;
				}
			});
		});
	});
	
	// Delete Orangtua
	$(".DeleteOrangtua").on("show.bs.modal", (e) => {
		$(".DeleteOrangtua").modal('show');
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		console.log(id)
		$(".hapusOrangtua").on("click", (e) => {
			$(".DeleteOrangtua").modal('hide');
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
					document.location.href = url + 'Orangtua/Delete/' + id;
				}
			});
		});
	});
	
	// Delete Siswa
	$(".DeleteSiswa").on("show.bs.modal", (e) => {
		$(".DeleteSiswa").modal('show');
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		console.log(id)
		$(".hapusSiswa").on("click", (e) => {
			$(".DeleteSiswa").modal('hide');
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
					document.location.href = url + 'Siswa/Delete/' + id;
				}
			});
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
					document.location.href = url + 'Guru/Delete/' + id;
				}
			});
		});
	});

	const flashdataSukses = $("div.flashdata").data("alert");
	if (flashdataSukses) {
		Swal.fire({
			icon: "success",
			title: "Data",
			text: flashdataSukses,
			showConfirmButton: true,
		});
	}
	const flashdataGagal = $("div.flashdata2").data("alert2");
	if (flashdataGagal) {
		Swal.fire({
			icon: "error",
			title: "Data",
			text: flashdataGagal,
			showConfirmButton: true,
		});
	}



	
});
