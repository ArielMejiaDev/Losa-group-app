function loading() {
    const login = document.querySelector('#login')
    const loader = document.querySelector('#loader')
    login.classList.add('d-none');
    loader.classList.remove('d-none');
    loader.classList.add('d-flex');
}