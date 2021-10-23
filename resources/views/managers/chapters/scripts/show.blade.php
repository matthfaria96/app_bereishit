<script>
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
    
        function save() {
            appAjax('post', 'http://127.0.0.1:8000/api/torah', getInputModalValues())        
        }
        
        function populateTable() {
            appAjax('get', 'http://127.0.0.1:8000/api/torah', {}, function (data) {
                let books = data.data.map(function (item) {
                    return `
                        <tr>
                            <th scope="row">${item.id}</th>
                            <td  colspan="0">
                                <a href="/web/manager/chapters" class="mr-5">${item.name_pt} | ${item.name_he}</a>
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