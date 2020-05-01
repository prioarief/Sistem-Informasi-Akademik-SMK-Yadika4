$(document).ready(function () {
	let url = $("#url").val();

	// Event Edit Mapel
	$(".EditMapel").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");
		$(`input.kelas`).prop('checked', false)

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

				$.ajax({
					url: url + "Mapel/DetailKelas/" + mapel,
					data: {
						mapel: mapel,
					},
					method: "post",
					success: function (response) {
						const data = JSON.parse(response);
						$('input#mapel').val(result.mapel)
						$("div.guruEdit select").val(result.guru_id);
						data.map(kelas => {
							$(`input#kelas${kelas.kelas_id}`).prop('checked', true)
						})
		
		
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

	// Event Detail Siswa
	// $(".DetailSiswa").on("show.bs.modal", function (e) {
	// 	let button = $(e.relatedTarget);
	// 	let nis = button.data("id");

	// 	$.ajax({
	// 		url: url + "Siswa/detailSiswa/" + nis,
	// 		data: {
	// 			nis: nis,
	// 		},
	// 		method: "post",
	// 		success: function (response) {
	// 			const result = JSON.parse(response);
	// 			$("h5.detail").html(`<b>${result.nama}</b>`);
	// 			$("div.detail").html(`
	// 				<p>Nama : ${result.nama}</p>
	// 				<p>NIS : ${result.nis}</p>
	// 				<p>Kelas : ${result.kelas}</p>
	// 				<p>Password : ${result.password}</p>
	// 				<p>Jenis Kelamin : ${result.jk}</p>
	// 				<p>Nama Orangtua : ${result.orangtua}</p>
	// 				<p>Agama : ${result.agama}</p>
	// 				<p>Gol Darah : ${result.gol_darah}</p>
	// 				<p>Pendidikan Terakhir : ${result.pendidikan}</p>
	// 				<p>Tempat, tanggal lahir : ${result.tempat_lahir}, ${result.tanggal_lahir}</p>
	// 				<p>Alamat : ${result.alamat}</p>
	// 				<p>Telpon : ${result.telpon}</p>
	// 				<p>Kewarganegaraan : ${result.kewarganegaraan}</p>
	// 			`);
	// 		},
	// 	});
	// });

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
				
				let html = `<ol type='1'>`;
					result.forEach((data) => {
						html += `<li>${data.kelas}</li>`;;
					});

					html += `</ol>`
				
				$("h5.detail").html(`<b>${result.id}</b>`);
				$("div.detailKelas").html(html);
			},
			error: (err) => {
				$("h5.detail").html(`<b>${err}</b>`);
			},
		});
	});
});
