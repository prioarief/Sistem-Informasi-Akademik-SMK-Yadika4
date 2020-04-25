$(document).ready(function () {
	// Event Edit Kelas
	$(".EditKelas").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		// console.log(id)

		$.ajax({
			url: "http://localhost/SIA/Kelas/detail/" + id,
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
			url: "http://localhost/SIA/Jurusan/detail/" + id,
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

		console.log(id)

		$.ajax({
			url: "http://localhost/SIA/Orangtua/detail/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				// console.log(response)
				const result = JSON.parse(response);

				$('#id-ortu').val(result.id)
				$('#nama-ortu').val(result.nama)
				$('#nik-ortu').val(result.nik)
				$('#password-ortu').val(result.password)
				$("div.jk-ortu select").val(result.jk);
				$("div.agama-ortu select").val(result.agama);
				$("div.goldarah-ortu select").val(result.gol_darah);
				$('#pekerjaan-ortu').val(result.pekerjaan)
				$('#pendidikan-ortu').val(result.pendidikan)
				$('#tempat-lahir-ortu').val(result.tempat_lahir)
				$('#tanggal-lahir-ortu').val(result.tanggal_lahir)
				$('#alamat-ortu').val(result.alamat)
				$('#telpon-ortu').val(result.telpon)
			},
		});
	});


	// $(".TambahKelas").on("show.bs.modal", function (e) {
	// 	$("#BtnTambahKelas").prop("disabled", true);

	// 	let kelas = $("input#Kelas").bind("keyup change", () => {
	// 		console.log(kelas.val());
	// 		let jurusan = $("div#jurusanKelasAdd select").on("change", () => {
	// 			console.log(jurusan.val());
	// 			if (kelas.val() === "" && jurusan.val() != jurusan.val()) {
	// 				$("#BtnTambahKelas").prop("disabled", true);
	// 			} else if (kelas.val() != " " && jurusan.val() === jurusan.val()) {
	// 				$("#BtnTambahKelas").prop("disabled", false);
	// 			}
	// 		});
	// 	});
	// });

	$(".hapusKelass").on("click", (e) => {
		e.preventDefault();
		let href = $('.hapusKelass').data("id");

		console.log(href);

		Swal.fire({
			title: 'Apakah Anda Yakin Untuk Menghapus?',
			text: "Data yang sudah dihapus tidak dapat kembali lagi!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus!'
		  }).then((result) => {
			if (result.value) {
			  document.location.href = href
			}
		  })
	});

	const flashdataSukses = $("div.flashdata").data("alert");
	if (flashdataSukses) {
		Swal.fire({
			icon: 'success',
			title: 'Data',
			text: flashdataSukses,
			showConfirmButton: true,
		  })
	}
	const flashdataGagal = $("div.flashdata2").data("alert2");
	if (flashdataGagal) {
		Swal.fire({
			icon: 'error',
			title: 'Data',
			text: flashdataGagal,
			showConfirmButton: true,
		  })
	}
	
});
