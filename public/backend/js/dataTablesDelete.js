
    $(function () {
    //ajax setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //delete action
    $(document).on("click", "#delete", function (e) {
    e.preventDefault();
    let link = $(this).attr("href");
    let table = $(this).data('table');
    Swal.fire({
        title: 'Jesteś pewny?',
        text: "Nie będziesz w stanie tego cofnąć!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Tak, usuń!',
        cancelButtonText: 'Anuluj'
    }).then((result) => {
    if (result.value) {
    $.ajax({
    url: link,
    type: 'DELETE',
    data: {
    _method: "DELETE"
},
    success: function (data) {
    console.log(data);
    setTimeout(function () {
    $(this).parents("tr").remove();
    $('#' + table).DataTable().ajax.reload();
    return false;
}, 500);
}
})
}
})
});
})
