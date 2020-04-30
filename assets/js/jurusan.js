$(document).ready(function () {
	let url = $("#url").val();

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

	// Delete Jurusan
	$(".DeleteJurusan").on("show.bs.modal", (e) => {
		$(".DeleteJurusan").modal("show");
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		// console.log(id)
		$(".hapusJurusan").on("click", (e) => {
			$(".DeleteJurusan").modal("hide");
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
					document.location.href = url + "Jurusan/Delete/" + id;
				}
			});
		});
	});




});
