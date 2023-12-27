const theme = document.querySelector('#check-theme')
const html = document.querySelector('html')
theme.addEventListener('click', function () {
    if (theme.checked) {
        html.classList.add('dark')
    } else {
        html.classList.remove('dark')
    }
})