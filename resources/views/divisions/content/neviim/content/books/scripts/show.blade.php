<script>
    let books = {};
    let rowChapterId = 0;

    let pages = 0;
    let actualPage = 1;
    let datatable = {
        "start": 0,
        "length": 20
    }

$(document).ready(function() {
    const inputNamePt    = $('#inputNamePt');
    const inputNameHe    = $('#inputNameHe');
    const tableBodyBooks = $('table tbody');

    function getInputModalValues() {
        return {
            name_pt: inputNamePt.val(),
            name_he: inputNameHe.val(),
        }
    }

    function resetForm() {
        inputNamePt.val('');
        inputNameHe.val('');
    }

    function update(bookId) {
        appAjax('put', `/web/neviim/${bookId}`, getInputModalValues(), function () {
            resetForm()
            
            populateTable();
            $('#modal-book').modal('hide');

            $('.btn-save').attr('disabled', false)
        })        
    }

    function deleteBook(bookId) {
        appAjax('delete', `/web/neviim/${bookId}`, getInputModalValues(), function () {
            resetForm()
            
            populateTable();
            $('#modal-book').modal('hide');

            $('.btn-save').attr('disabled', false)
        })        
    }

    function save() {
        appAjax('post', '/web/neviim', getInputModalValues(), function () {

            resetForm();
            $('.btn-save').attr('disabled', false)

            populateTable();
        })        
    }
    
    function populateTable() {
        appAjax('get', '/api/neviim', {}, function (data, index) {
            books = data;

            let booksHtml = data.data.map(function (item) {
                return `
                    <tr>
                        <th scope="row">${item.id}</th>
                        <td  colspan="0">
                            <a href="/web/manager/neviim/books/${item.id}/chapters" class="mr-5">${item.name_pt} | ${item.name_he}</a>
                        </td>
                        <td  colspan="1">
                            <i class="fas fa-cog pointer modal-book-open" data-bs-toggle="modal" data-row-index='${index}' data-row-id="${item.id}" data-bs-target="#modal-book"></i>
                        </td>
                    </tr>
                `
            })

            $('table tbody tr').remove();
            tableBodyBooks.append(booksHtml)

            $('.modal-book-open').click(function(e) {
                let rowId = parseInt($(this).data('row-id'));
                rowChapterId = rowId;

                let data = books.data.find(function (item) {
                    return  rowId === item.id
                })

                $('.btn-delete').attr('data-row-id', rowId)
                $('.btn-delete').show();

                $('#modal-book .modal-content .modal-body .form-floating #inputId').val(data.id)

                inputNamePt.val(data.name_pt)
                inputNameHe.val(data.name_he)

                e.preventDefault();
            })
        })
    }

    $('.btn-delete').click(function () {
        deleteBook(rowChapterId)
    });

    $('.create-book-buttom').click(function () {
        resetForm();

        $('.btn-delete').hide();
        $('#modal-book .modal-content .modal-body .form-floating #inputId').val('')
    });


    $('.btn-save').click(function (e) {
        e.preventDefault();

        $(this).attr('disabled', true)

        const inputId = $('#modal-book .modal-content .modal-body .form-floating #inputId').val();

        if(inputId) {
            update(inputId)
        }else {
            save();                
        }
    })

    populateTable();
})
</script>