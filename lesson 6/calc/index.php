<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <form id="form">
                <div class="col-4">
                    <label class="form-label">Введите 1 число</label>
                    <input class="form-control" type="text" id="firstNumber" value="3">
                </div>
                <div class="col-4">
                    <label class="form-label">Выбирите операцию</label>
                    <select id="operation" class="form-select" aria-label="Default select example">
                        <option value="addition">Сложить</option>
                        <option value="subtraction">Вычесть</option>
                        <option value="multiplication">Умножить</option>
                        <option value="division">Разделить</option>
                    </select>
                </div>
                <div class="col-4">
                    <label class="form-label">Введите 2 число</label>
                    <input class="form-control" type="text" id="secondNumber" value="4">
                </div>
                <div class="col-4">
                    <button class="btn btn-primary w-100 mt-3"> Вычислить </button>
                </div>
            </form>
            <h2 class="h2 mt-4">Ответ: <span id="result">5</span></h2>
        </div>
    </div>

<script>
const form = document.querySelector('#form')
const result = document.querySelector('#result')

let operation = 'addition'
const select = document.querySelector('#operation')
select.addEventListener('change', function () {
    operation = this.value
})


form.addEventListener('submit', event => {
    event.preventDefault()

    const firstNumber = document.querySelector('#firstNumber').value
    const secondNumber = document.querySelector('#secondNumber').value

    getResult(firstNumber, secondNumber, operation)
})

async function getResult(firstNumber, secondNumber, operation) {

    let formData = new FormData();
    formData.append('firstNumber', firstNumber)
    formData.append('secondNumber', secondNumber)
    formData.append('operation', operation)

    const res = await fetch('./operations.php', {
        method: 'POST',
        body: formData
    });

    const data = await res.json();

    if (data.status === true) {
        console.log(data)
        result.textContent = data.result
    }
}

</script>
</body>
</html>
