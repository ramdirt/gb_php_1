const url = './vendor/comments.php'

const formAddComment = document.querySelector('#formAddComment')
if(formAddComment) {
    formAddComment.addEventListener('submit', event => {
        event.preventDefault()
        addCommentDB()
    })
    async function addCommentDB() {
        const id = formAddComment.dataset.id
        const name = document.querySelector('#nameComment').value
        const text = document.querySelector('#textComment').value

        let formData = new FormData();
        formData.append('action', 'add')
        formData.append('id', id)
        formData.append('name', name);
        formData.append('text', text);

        const res = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const data = await res.json();

        if (data.status === true) {
            addCommentLayout(name, text)
        } else {
            alert('Ошибка отправки комментария')
        }
    }
    function addCommentLayout(name, text) {
        const comments = document.querySelector('#comments')

        const year = new Date().getFullYear()
        const mouth = ("0" + ((new Date()).getMonth() + 1)).slice(-2)
        const day = ("0" + ((new Date()).getDate())).slice(-2)

        const layout = `
                 <div class="card p-3 mb-2">
                    <div>
                        <h6 class="mb-0">${name}</h6>
                        <p class="mb-0 opacity-75">${text}</p>
                    </div>
                    <small class="opacity-50 text-nowrap">${year}-${mouth}-${day}</small>
                </div>
    `
        comments.insertAdjacentHTML("afterbegin", layout)
    }
}

const formUpdateComment = document.querySelector('#formUpdateComment')
if (formUpdateComment) {
    formUpdateComment.addEventListener('submit', event => {
        event.preventDefault()
        updateCommentDB()
    })
    async function updateCommentDB() {
        const id = formUpdateComment.dataset.id
        const name = document.querySelector('#nameComment').value
        const text = document.querySelector('#textComment').value

        let formData = new FormData();
        formData.append('action', 'update')
        formData.append('id', id)
        formData.append('name', name);
        formData.append('text', text);

        const res = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const data = await res.json();

        if (data.status === true) {
            alert('Комментарий обновлен')
        } else {
            alert('Ошибка отправки комментария')
        }
    }
}

const commentsContainer = document.querySelector('#comments')
if (commentsContainer) {
    async function getComments() {
        function getID() {
            let p = window.location.search;
            p = p.match(new RegExp('id' + '=([^&=]+)'));
            return p ? p[1] : false;
        }

        const res = await fetch(`${url}?id=${getID()}`);
        const {data} = await res.json();

        let markupToCommentsDiv = ""
        data.forEach(comment => {
            markupToCommentsDiv += commentLayout(comment)
        })
        commentsContainer.insertAdjacentHTML("afterbegin", markupToCommentsDiv)
        deleteComment();
    }
    function commentLayout (comment) {
        return `
    <div id="comment" data-id="${comment.id}" class="card p-3 mb-2">
        <div class="d-flex flex-row bd-highlight mb-3 justify-content-between">
            <div class="bd-highlight">
                <h6 class="mb-0">${comment.name}</h6>
                <p class="mb-0 opacity-75">${comment.text}</p>
            </div>
            <div class="bd-highlight">
                <small class="opacity-50 text-nowrap">${comment.date}</small>

            </div>
        </div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button id="deleteComment" type="button" class="btn btn-sm btn-outline-secondary">Удалить</button>
            <a id="updateComment" href="./update_comment.php?id=${comment.id}" type="button" class="btn btn-sm btn-outline-secondary">Изминить</a>
        </div>
    </div>
`
    }
    getComments();
}

function deleteComment() {
    const buttonsDeleteComment = document.querySelectorAll('#deleteComment')
    buttonsDeleteComment.forEach(button => {
        button.addEventListener('click', event => {
            const id = event.path[2].dataset.id
            console.log(event)
            deleteCommentDB(id)
            deleteCommentLayout(id)
        })
    })
    async function deleteCommentDB(id) {

        let formData = new FormData();
        formData.append('action', 'delete')
        formData.append('id', id)

        const res = await fetch(url, {
            method: 'POST',
            body: formData
        });

        const data = await res.json();

        if (data.status === true) {
            alert('Ваш комментарий удален')
        } else {
            alert('Ошибка отправки комментария')
        }
    }
    function deleteCommentLayout(id) {
        const comments = document.querySelectorAll('#comment')
        comments.forEach(comment => {
            if (comment.dataset.id == id) {
                comment.remove()
            }
        })
    }
}