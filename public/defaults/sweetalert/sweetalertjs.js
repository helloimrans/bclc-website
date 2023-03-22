//sweetalert delete
$(document).on("click", "#delete", function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        text: "Delete this data!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            $("#delForm").submit();
            Swal.fire("Deleted!", "Data has been deleted.", "success");
        }
    });
});

//Delete Delete
$(document).on("click", "#link_delete", function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
        title: "Are you sure?",
        text: "Delete this data!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            window.location.href = link;
            Swal.fire("Deleted!", "Data has been deleted.", "success");
        }
    });
});

//sweetalert restore
$(document).on("click", "#restore", function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
        title: "Are you sure?",
        text: "Restore this data!",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, restore it!",
    }).then((result) => {
        if (result.value) {
            window.location.href = link;
            Swal.fire("Restored!", "Data has been restored.", "success");
        }
    });
});

////////////////////////For ecommerce

//sweetalert payment status
$(document).on("click", "#confirm_first", function (e) {
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
        title: `Are You Sure?`,
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: `Yes`,
        denyButtonText: `No`,
    }).then((result) => {
        if (result.value) {
            window.location.href = link;
        }
    });
});
