const loadFile = (event) => {
    const image = document.querySelector('#output')
    image.src = URL.createObjectURL(event.target.files[0])
    document.querySelector('#uploadLabel').innerHTML = event.target.files[0].name
};