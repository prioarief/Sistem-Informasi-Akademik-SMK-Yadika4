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
});
