const buttonAddBasket = document.querySelector('.btn-add-basket')
if(buttonAddBasket) {
    buttonAddBasket.addEventListener('click', event => {
        event.preventDefault()
        addBasket()
    })
    async function addBasket() {
        const id = buttonAddBasket.dataset.id

        let formData = new FormData();
        formData.append('action', 'add')
        formData.append('id', id)

        const res = await fetch('./vendor/func_basket.php', {
            method: 'POST',
            body: formData
        });

        const data = await res.json();

        if (data.status === true) {
            alert('Товар добавлен в корзину')
        } else {
            alert('Ошибка отправки комментария')
        }
    }
}

const buttonsDeleteBasket = document.querySelectorAll('.btn-delete-basket')
if(buttonsDeleteBasket) {
    buttonsDeleteBasket.forEach(button => {
        button.addEventListener('click', event => {
            const id = event.currentTarget.dataset.id
            deleteBasket(id)
        })
    })
    async function deleteBasket(id) {

        let formData = new FormData();
        formData.append('action', 'delete')
        formData.append('id', id)

        const res = await fetch('./vendor/func_basket.php', {
            method: 'POST',
            body: formData
        });

        const data = await res.json();

        if (data.status === true) {
            alert('Товар удален из корзины')
        } else {
            alert('Ошибка удаления')
        }
    }
}