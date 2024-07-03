$.ajaxSetup({
    headers : {
        'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
    }
});