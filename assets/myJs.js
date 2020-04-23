$(document).ready(function () {
	$(".EditKelas").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		// console.log(id)

		$.ajax({
			url: "http://localhost/projek/Kelas/detail/" + id,
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

		// $('button#btnEdit').on('submit', function(){
		// 	let id = $('input.inputKelas').val();
		// 	console.log(id)
		// });
	});

	$(".TambahKelas").on("show.bs.modal", function (e) {
		$("#BtnTambahKelas").prop("disabled", true);

		let kelas = $("input#Kelas").bind("keyup change", () => {
			console.log(kelas.val());
			// if (kelas.val() === "") {
			// 	$("#BtnTambahKelas").prop("disabled", true);
			// } else if (kelas.val() != " ") {
			// 	$("#BtnTambahKelas").prop("disabled", false);
			// }
			let jurusan = $("div#jurusanKelasAdd select").on("change", () => {
				console.log(jurusan.val());
				if (kelas.val() === "" && jurusan.val() != jurusan.val()) {
					$("#BtnTambahKelas").prop("disabled", true);
				} else if (kelas.val() != " " && jurusan.val() === jurusan.val()) {
					$("#BtnTambahKelas").prop("disabled", false);
				}
			});
		});
	});

	$(".hapusKelass").on("click", (e) => {
		e.preventDefault();
		const href = $(this).find('.hapusKelass').attr("href");

		console.log(href);

		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
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

	// const flashdataSuccess = $("div.flashdata-Gagal").data("alert");
	// if (flashdataSuccess) {
	// 	swal({
	// 		title: "Data",
	// 		text: flashdataSuccess,
	// 		icon: "success",
	// 	});
	// }
});
