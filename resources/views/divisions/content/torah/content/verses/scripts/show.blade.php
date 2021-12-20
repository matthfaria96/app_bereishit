<script>
    let verses = {};
    let rowVerseId = 0;

    let pages = 0;
    let actualPage = 1;
    let datatable = {
        "start": 0,
        "length": 20
    }

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
                verse_pt:  inputVersePt.val(),
                verse_he:  inputVerseHe.val(),
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
            appAjax('post', `/web/torah/${bookId}/chapters/${chapterId}/verses`, getInputModalValues(), function () {
                resetForm();
                populateTable();
                $('.btn-save').attr('disabled', false)
            })        
        }

        function update(id) {
            appAjax('put', `/web/torah/${bookId}/chapters/${chapterId}/verses/${id}`, getInputModalValues(), function () {
                resetForm()
                
                populateTable();
                $('#modal-verse').modal('hide');

                $('.btn-save').attr('disabled', false)
            })        
        }

        function deleteVerse(id) {
            appAjax('delete', `/web/torah/${bookId}/chapters/${chapterId}/verses/${id}`, getInputModalValues(), function () {
                resetForm()
                
                populateTable();
                $('#modal-verse').modal('hide');

                $('.btn-save').attr('disabled', false)
            })        
        }

        function getPages(data) {
            let flag = 0;
            let totalRecord = data.recordsFiltered
            let pagination = $('.pagination');
            let html = `
                <li class="page-item"><a class="page-link page-before" href="#">Anterior</a></li>
            `

            
            while(flag <= totalRecord) {
                flag+= 20;
                
                pages++
            }
            
            for (let i = 0; i < pages; i++) {
                let active = i === 0 ? 'active' : '';

                html+= `
                <li class="page-item ${active}"><a class="page-link page-number" data-page="${i+1}" href="#">${i+1}</a></li>
                `
            }
            
            html+= `
            <li class="page-item"><a class="page-link page-next" href="#">Próxima</a></li>
            `
            pagination.append(html)

            $('.page-before').click(function (e) {
                e.preventDefault();
            })

            $('.page-number').click(function (e) {
                $(this).data('page')


                e.preventDefault();
            })

            $('.page-next').click(function (e) {
                e.preventDefault();
            })
        }

        function nextPage() {

        }

        function backPage() {
            
        }

        function unescapeHtml(escapedString) {
            return escapedString
                .replace(/&amp;/g, "&")
                .replace(/&lt;/g, "<")
                .replace(/&gt;/g, ">")
                .replace(/&quot;/g, "\"")
                .replace(/&#039;/g, "'");
        }
        
        function populateTable() {
            appAjax('get', `/api/torah/${bookId}/chapters/${chapterId}/verses`, {}, function (data) {
                verses = data;

                let books = data.data.map(function (item, index) {
                    return `
                        <tr>
                            <td scope="col">${index + 1}</th>
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
                                <a href="#">${item.comments ? unescapeHtml(item.comments) : ''}</a>
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

                    
                    inputComments.val(unescapeHtml(data.comments))

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