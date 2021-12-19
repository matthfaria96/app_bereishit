<script>
    let verses = {};
    let rowVerseId = 0;

    $(document).ready(function() {
        const inputNumberPt    = $('#inputNumberPt');
        const inputNumberHe    = $('#inputNumberHe');
        const inputVersePt     = $('#inputVersePt');
        const inputVerseHe     = $('#inputVerseHe');
        const inputComments     = $('#inputComments');
        const bookId           = "{{ $book_id }}";
        const chapterId        = "{{ $chapter_id }}";
        const tableBodyBooks   = $('table tbody');
    
        function getInputModalValues() {
            return {
                number_pt: inputNumberPt.val(),
                number_he: inputNumberHe.val(),
                verse_pt: inputVersePt.val(),
                verse_he: inputVerseHe.val(),
                comments:  inputComments.val(),
                book_id: bookId,
                chapter_id: chapterId,
            }
        }

        function resetForm() {
            inputNumberPt.val('');
            inputNumberHe.val('');
            inputVersePt.val('');
            inputVerseHe.val('');
            inputComments.val('');
        }
    
        function save() {
            appAjax('post', `/web/neviim/${bookId}/chapters/${chapterId}/verses`, getInputModalValues(), function () {
                resetForm();
                populateTable();
                $('.btn-save').attr('disabled', false)
            })        
        }

        function update(id) {
            appAjax('put', `/web/neviim/${bookId}/chapters/${chapterId}/verses/${id}`, getInputModalValues(), function () {
                resetForm()
                
                populateTable();
                $('#modal-verse').modal('hide');

                $('.btn-save').attr('disabled', false)
            })        
        }

        function deleteVerse(id) {
            appAjax('delete', `/web/neviim/${bookId}/chapters/${chapterId}/verses/${id}`, getInputModalValues(), function () {
                resetForm()
                
                populateTable();
                $('#modal-verse').modal('hide');

                $('.btn-save').attr('disabled', false)
            })        
        }

        function populateTable() {
            appAjax('get', `/api/neviim/${bookId}/chapters/${chapterId}/verses`, {}, function (data) {
                verses = data;

                let books = data.data.map(function (item, index) {
                    return `
                        <tr>
                            <th scope="col">${index + 1}</th>
                            <td  scope="col">
                                <a href="#">${item.number_pt} | ${item.number_he}</a>
                            </td>
                            <td  scope="col">
                                <a href="#">${item.verse_pt}</a>
                            </td>
                            <td  scope="col">
                                <a href="#">${item.verse_he}</a>
                            </td>
                            <td  scope="col">
                                <a href="#">${item.comments}</a>
                            </td>
                            <td  scope="col">
                                <i class="fas fa-cog pointer modal-verse-open" data-bs-toggle="modal" data-row-index='${index}' data-row-id="${item.id}" data-bs-target="#modal-verse"></i>
                            </td>
                        </tr>
                    `
                })

                $('table tbody tr').remove();
                tableBodyBooks.append(books)

                $('.modal-verse-open').click(function(e) {
                    let rowId = parseInt($(this).data('row-id'));
                    rowVerseId = rowId;

                    let data = verses.data.find(function (item) {
                        return  rowId === item.id
                    })

                    $('.btn-delete').attr('data-row-id', rowId)
                    $('.btn-delete').show();

                    $('#modal-verse .modal-content .modal-body .form-floating #inputId').val(data.id)
                    inputNumberPt.val(data.number_pt)
                    inputNumberHe.val(data.number_he)
                    inputVersePt.val(data.verse_pt)
                    inputVerseHe.val(data.verse_he)
                    inputComments.val(data.comments)

                    e.preventDefault();
                })
    
            })
        }

        $('.btn-delete').click(function () {
            deleteVerse(rowVerseId)
        });
    
        $('.create-verse-buttom').click(function () {
            resetForm();

            $('.btn-delete').hide();
            $('#modal-verse .modal-content .modal-body .form-floating #inputId').val('')
        })

        $('.btn-save').click(function (e) {
            e.preventDefault();

            $(this).attr('disabled', true)

            const inputId = $('#modal-verse .modal-content .modal-body .form-floating #inputId').val();

            if(inputId) {
                update(inputId)
            }else {
                save();                
            }
        })

    
        populateTable();
    })
    </script>