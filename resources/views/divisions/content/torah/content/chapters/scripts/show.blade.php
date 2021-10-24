<script>
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
    
        function save() {
            appAjax('post', `/api/torah/${bookId}/chapters`, getInputModalValues())        
        }
        
        function populateTable() {
            appAjax('get', '/api/torah/chapters', {}, function (data) {
                let books = data.data.map(function (item) {
                    return `
                        <tr>
                            <th scope="row">${item.id}</th>
                            <td  colspan="0">
                                <a href="/web/manager/torah/books/${bookId}/chapters/${item.id}/verses" class="mr-5">${item.number_pt} | ${item.number_he}</a>
                            </td>
                            <td  colspan="1">
                                <i class="fas fa-cog pointer"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${item.id}"></i>
                            </td>
                        </tr>
                    `
                })
    
                tableBodyBooks.append(books)
    
            })
    
        }
    
        $('.btn-save').click(function (e) {
            e.preventDefault();
    
            save();
        })
    
        populateTable();
    })
    </script>