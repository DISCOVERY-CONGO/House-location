function sendMarkRequest(id = null){
    return $.ajax("notification/" + id, {
        method: 'post',
        data: {
            token: document.head.querySelector('meta[name="csrf-token"]'),
            id: id
        }
    })
}

$(function () {
    $('.mark-as-read').on('click', () => {
        let request = $(this).data('id')
        request.done(() => {
            $(this).parents('div.alert').remove()
        })
    })

    $('#mark-all').click(() => {
        let request = sendMarkRequest()
        request.done(() => {
            $('div.alert').remove()
        })
    })

})
