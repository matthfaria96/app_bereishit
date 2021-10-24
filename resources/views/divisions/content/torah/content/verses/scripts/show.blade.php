<script>
    $(document).ready(function() {
        const inputNumberPt    = $('#inputNumberPt');
        const inputNumberHe    = $('#inputNumberHe');
        const bookId           = {{ $book_id }};
        const chapterId           = {{ $chapter_id }};
        const tableBodyBooks   = $('table tbody');
    
        function getInputModalValues() {
            return {
                number_pt: inputNumberPt.val(),
                number_he: inputNumberHe.val(),
                book_id: bookId,
                chapter_id: chapterId,
            }
        }
    
        function save() {
            appAjax('post', `/api/torah/${bookId}/chapters/${chapterId}/verses`, getInputModalValues())        
        }
        
        function populateTable() {
            appAjax('get', `/api/torah/${bookId}/chapters/${chapterId}/verses`, {}, function (data) {
                let books = data.data.map(function (item) {
                    return `
                        <tr>
                            <th scope="row">1</th>
                            <td  colspan="0">
                            <a href="#">número pt | número hebreu</a>
                            <i class="fas fa-cog pointer"  data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                            </td>
                            <td  colspan="1">
                            <a href="#">Texto pt</a>
                            <i class="fas fa-cog pointer"  data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                            </td>
                            <td  colspan="2">
                            <a href="#">Texto hebreu</a>
                            <i class="fas fa-cog pointer"  data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
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