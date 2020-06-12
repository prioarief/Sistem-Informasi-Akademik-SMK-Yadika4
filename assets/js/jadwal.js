$(document).ready(function () {
	let url = $("#url").val();

	// Event Edit Jadwal
	$(".EditJadwal").on("show.bs.modal", function (e) {
		let button = $(e.relatedTarget);
		let id = button.data("id");

		$.ajax({
			url: url + "Jadwal/Details/" + id,
			data: {
				id: id,
			},
			method: "post",
			success: function (response) {
				const result = JSON.parse(response);
				$('#id-edit').val(result.jadwal_id)
				$('#mulai-edit').val(result.jam_mulai)
				$('#selesai-edit').val(result.jam_selesai)
				$('#ruang-edit').val(result.ruang)
				$('#detailJadwal select').val(result.mapel_id)
			},
		});
	});

	// Delete Jadwal
	$(".DeleteJadwal").on("show.bs.modal", (e) => {
		$(".DeleteJadwal").modal('show');
		let trigger = $(e.relatedTarget);
		let id = trigger.data("id");
		$(".hapusJadwal").on("click", (e) => {
			$(".DeleteJadwal").modal('hide');
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
					document.location.href = url + 'Jadwal/Delete/' + id;
				}
			});
		});
	});
});
