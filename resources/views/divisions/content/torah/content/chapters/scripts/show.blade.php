<script>
    let chapters = {};
    let rowChapterId = 0;

    let pages = 0;
    let actualPage = 1;
    let datatable = {
        "start": 0,
        "length": 20
    }

    $(document).ready(function() {
        const inputNumberPt    = $('#inputNumberPt');
        const inputNumberHe    = $('#inputNumberHe');
        const bookId           = {{ $book_id }};
        const tableBodyBooks   = $('table tbody');
    
        function getInputModalValues() {
            return {
                number_pt: inputNumberPt.val(),
                number_he: inputNumberHe.val(),
                book_id: bookId,
            }
        }

        function resetForm() {
            inputNumberPt.val('');
            inputNumberHe.val('');
        }

        function update(chapterId) {
            appAjax('put', `/web/torah/${bookId}/chapters/${chapterId}`, getInputModalValues(), function () {
                resetForm()
                
                populateTable();
                $('#modal-chapter').modal('hide');

                $('.btn-save').attr('disabled', false)
            })        
        }

        function deleteChapter(chapterId) {
            appAjax('delete', `/web/torah/${bookId}/chapters/${chapterId}`, getInputModalValues(), function () {
                resetForm()
                
                populateTable();
                $('#modal-chapter').modal('hide');

                $('.btn-save').attr('disabled', false)
            })        
        }
    
        function save() {
            appAjax('post', `/web/torah/${bookId}/chapters`, getInputModalValues(), function () {
                inputNumberPt.val('');
                inputNumberHe.val('');

                resetForm();
                $('.btn-save').attr('disabled', false)

                populateTable();
            })
        }
        
        function populateTable() {
            appAjax('get', `/api/torah/${bookId}/chapters`, {}, function (data) {
                chapters = data;

                let books = data.data.map(function (item, index) {
                    return `
                        <tr>
                            <th scope="row">${item.id}</th>
                            <td  colspan="0">
                                <a href="/web/manager/torah/books/${bookId}/chapters/${item.id}/verses" class="mr-5">${item.number_pt} | ${item.number_he}</a>
                            </td>
                            <td  colspan="1">
                                <i class="fas fa-cog pointer modal-chapter-open" data-bs-toggle="modal" data-row-index='${index}' data-row-id="${item.id}" data-bs-target="#modal-chapter"></i>
                            </td>
                        </tr>
                    `
                })
    
                $('table tbody tr').remove();
                tableBodyBooks.append(books)

                $('.modal-chapter-open').click(function(e) {
                    let rowId = parseInt($(this).data('row-id'));
                    rowChapterId = rowId;

                    let data = chapters.data.find(function (item) {
                        return  rowId === item.id
                    })

                    $('.btn-delete').attr('data-row-id', rowId)
                    $('.btn-delete').show();

                    $('#modal-chapter .modal-content .modal-body .form-floating #inputId').val(data.id)

                    inputNumberPt.val(data.number_pt)
                    inputNumberHe.val(data.number_he)

                    e.preventDefault();
                })
            })
    
        }

        $('.btn-delete').click(function () {
            deleteChapter(rowChapterId)
        });

        $('.create-chapter-buttom').click(function () {
            resetForm();

            $('.btn-delete').hide();
            $('#modal-chapter .modal-content .modal-body .form-floating #inputId').val('')
        })
    
        $('.btn-save').click(function (e) {
            e.preventDefault();
    
            $(this).attr('disabled', true)

            const inputId = $('#modal-chapter .modal-content .modal-body .form-floating #inputId').val();

            if(inputId) {
                update(inputId)
            }else {
                save();                
            }
        })
    
        populateTable();
    })
    </script>