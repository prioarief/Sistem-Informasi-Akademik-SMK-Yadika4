$(document).ready(function () {
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
