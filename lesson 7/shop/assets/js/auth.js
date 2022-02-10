const message = document.querySelector('.message')

const btnLogin = document.querySelector('.btn-login')
if(btnLogin) {
    btnLogin.addEventListener('click', async event => {
        event.preventDefault()

        const login = document.querySelector('input[name="login"]').value
        const password = document.querySelector('input[name="password"]').value

        let formData = new FormData();
        formData.append('login', login)
        formData.append('password', password)

        const res = await fetch('./vendor/sign/signin.php', {
            method: 'POST',
            body: formData
        });

        const reply = await res.json()
        if (reply.status === true) {
            document.location.href = './index.php'
        } else {
            // TODO Сделать обработчик ошибок
            message.textContent = JSON.stringify(reply.data)
        }
    })
}

const btnRegister = document.querySelector('.btn-register')
if(btnRegister) {
    btnRegister.addEventListener('click', async event => {
        event.preventDefault()

        const name = document.querySelector('input[name="name"]').value
        const login = document.querySelector('input[name="login"]').value
        const email = document.querySelector('input[name="email"]').value
        const password = document.querySelector('input[name="password"]').value
        const password_confirm = document.querySelector('input[name="password_confirm"]').value

        let formData = new FormData();
        formData.append('name', name)
        formData.append('login', login)
        formData.append('email', email)
        formData.append('password', password)
        formData.append('password_confirm', password_confirm)

        const res = await fetch('./vendor/sign/signup.php', {
            method: 'POST',
            body: formData
        });

        const reply = await res.json()
        if (reply.status === true) {
            message.textContent = 'Вы зарегистрированы, теперь можно авторизоватся'
            document.location.href = './auth.php'
        } else {
            // TODO Сделать обработчик ошибок
            message.textContent = JSON.stringify(reply.data)
        }
    })
}
